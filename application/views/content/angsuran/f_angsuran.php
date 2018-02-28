<?php 
	if($status == "edit"){
		$val = $hsl->row_array();
		$display = "block";
		$java = "sisa_angsuran()";
		$readonly = "readonly";
		$xxx = $angsuran_ke->num_rows();
	}else{
		$val['id_angsuran'] = "$kode";
		$val['id_pinjaman'] = "";
		$val['id_anggota'] = "";
		$val['nama'] = "";
		$val['besar_pinjaman']="";
		$val['detail_besar_angsuran']="";
		$val['sisa_waktu']="";
		$val['angsuran_ke']="";
		$val['tgl_jatuh_tempo']="";
		$val['sisa_pinjaman']="";
		$display = "none";
		$java="";
		$readonly = "";
		$xxx="1";
	}
 ?>
<h2>Angsuran</h2>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>Tanggal Pembayaran Angsuran</label>
			<input type="date" class="form-control" name="" id="tgl_pembayaran" value="<?php echo date('Y-m-d'); ?>">	
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>Id Pembayran Angsuran</label>
			<input type="text" class="form-control" readonly="" name="" id="id_angsuran" value="<?php echo $val['id_angsuran']; ?>">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Id Pinjaman</label>
			<input type="text" class="form-control" name="" onclick="modal('<?php echo site_url('angsuran/detail_pinjaman') ?>','open');" id="id_pinjaman" value="<?php echo $val['id_pinjaman']; ?>">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Id Anggota</label>
			<input type="text" class="form-control" name="" id="id_anggota" readonly="" value="<?php echo $val['id_anggota'] ?>">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Nama Anggota</label>
			<input type="text" class="form-control" name="" id="nama" value="<?php echo $val['nama']; ?>" readonly="">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Besar Pinjaman</label>
			<input type="text" class="form-control" name="" value="<?php echo $val['besar_pinjaman'] ?>" id="besar_pinjaman" readonly="">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Besar Angsuran</label>
			<input type="text" class="form-control" name="" id="besar_angsuran" readonly="" value="<?php echo $val['detail_besar_angsuran'] ?>">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Jangka Waktu Angsuran</label>
			<input type="text" class="form-control" name="" value="<?php echo $val['sisa_waktu'] ?>"	 id="jangka_waktu" readonly="">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Angsuran Ke</label>
			<input type="text" class="form-control" name="" <?php echo $readonly ?> id="angsuran_ke" value="<?php echo $xxx ?>">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Tanggal Peluanasan</label>
			<input type="date" class="form-control" name="" value="<?php echo $val['tgl_jatuh_tempo'] ?>" id="tgl_pelunasan" readonly="">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			 <label>Sisa Angsuran</label>
			 <input type="text" class="form-control" name="" id="sisa_angsuran" readonly="">
		</div>
	</div>
	<div class="col-sm-12" style="display: <?php echo $display; ?>">
		<div class="form-group">
			<label>Sisa Pinjaman</label>
			<input type="text" class="form-control" value="<?php echo $val['sisa_pinjaman'] ?>" readonly="" id="sisa_pinjaman" name="">
		</div>
	</div>
	<div class="col-sm-12">
		<div class="form-group">
			<button class="btn btn-info form-control" onclick="<?php echo $onclick ?>">Angsuran</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		<?php echo $java ?>
	})
	function simpan_angsuran(){
		$.ajax({
			url:"<?php echo site_url('angsuran/simpan_angsuran') ?>",
			type:"POST",
			data:{
				id_angsuran:$("#id_angsuran").val(),
				id_anggota:$("#id_anggota").val(),
				id_pinjaman:$("#id_pinjaman").val(),
				tgl_pembayaran:$("#tgl_pembayaran").val(),
				besar_pinjaman:$("#besar_pinjaman").val(),
				tgl_jatuh_tempo:$("#tgl_pelunasan").val(),
				detail_besar_angsuran:$("#besar_angsuran").val(),
				sisa_pinjaman:$("#sisa_angsuran").val(),
				sisa_waktu:$("#jangka_waktu").val()
			},
			success:function (hasil) {
				document.location="http://localhost/koperasi/index.php/angsuran/page/angsuran";
				cetak_struk();
			}
		})
	}
	function sisa_angsuran(){
		besar_angsuran = $("#besar_angsuran").val();
		besar_pinjaman = $("#besar_pinjaman").val();
		a = parseInt(besar_pinjaman)-parseInt(besar_angsuran);
		$("#sisa_angsuran").val(a)
	}
	function add_angsuran(){
		$.ajax({
			url:"<?php echo site_url('angsuran/add_angsuran') ?>",
			type:"POST",
			data:{
				id_angsuran:$("#id_angsuran").val(),
				id_anggota:$("#id_anggota").val(),
				id_pinjaman:$("#id_pinjaman").val(),
				tgl_pembayaran:$("#tgl_pembayaran").val(),
				besar_pinjaman:$("#besar_pinjaman").val(),
				tgl_jatuh_tempo:$("#tgl_pelunasan").val(),
				detail_besar_angsuran:$("#besar_angsuran").val(),
				sisa_pinjaman:$("#sisa_angsuran").val(),
				sisa_waktu:$("#jangka_waktu").val(),
				angsuran_ke:$("#angsuran_ke").val()	
			},
			success:function (hasil) {
				document.location="http://localhost/koperasi/index.php/angsuran/page/angsuran";	
				cetak_struk();
			}
		})
	}
	function cetak_struk(y){
		y = $("#id_angsuran").val();
		window.open('<?php echo site_url('angsuran/cetak_struk') ?>'+"/"+y)
	}
</script>