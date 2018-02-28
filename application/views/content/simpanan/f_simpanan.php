<?php 
	if($status == 'edit'){
		$val = $hsl->row_array();
		$disabled = "disabled";
	}else{
		$val['id_simpanan'] = "$kode";
		$val['id_kategori_simpanan'] = "";
		$val['id_anggota'] = "";
		$val['nama'] = "";
		$disabled = "";
	}
 ?>
<h2><?php echo $judul ?> Simpanan</h2>
<div class="row">
<div class="col-sm-3">
	<div class="form-group">
		<label>Tanggal Simpanan</label>
		<input hidden type="text" id="id_simpanan" value="<?php echo $val['id_simpanan']; ?>" name="">
		<input type="date" value="<?php echo date('Y-m-d') ?>" id="tgl_detail_simpanan" class="form-control" name="">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label>Nama Anggota</label>
		<input type="text" hidden="" id="nama_petugas" value="<?php echo $this->session->userdata('level'); ?>" name="">
		<input type="text" class="form-control" id="nama" onclick="modal('<?php echo site_url('simpanan/detail_anggota') ?>','open')" value="<?php echo $val['nama'] ?>" name="">
		<input type="text" id="id_anggota" hidden="" value="<?php echo $val['id_anggota'] ?>" name="">
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label>Nama Simpanan</label>
		<select id="id_kategori_simpanan" <?php echo $disabled; ?> class="form-control">
			<option>--Pilih Nama Simpanan--</option>
			<?php 
			$qw = $this->db->query("SELECT * FROM kategori_simpanan")->result();
			foreach ($qw as $isi_kat) {
				if($val['id_kategori_simpanan'] == $isi_kat->id_kategori_simpanan){
					$selected = "selected";
				}else{
					$selected = "";
				}
			?>
			<option <?php echo $selected; ?> value="<?php echo $isi_kat->id_kategori_simpanan; ?>"><?php echo $isi_kat->nama_kategori_simpanan; ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label>Besar Simpanan</label>
		<input type="text" class="form-control" id="besar_simpanan" name="" onchange="simpan_detail()">
	</div>
</div>
<div class="col-sm-12">
	<div id="table_detail">
		
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">Rp</div>
			<input type="text" class="form-control" name="" placeholder="Total Simpanan" id="total_simpanan" readonly="">
		</div>
	</div>
</div>
<div class="col-md-6">
	<button class="btn btn-info form-control" onclick="<?php echo $onclick ?>">Selesai</button>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		tmp();
	})
		function cetak_struk(y){
			y = $("#id_simpanan").val();
			window.open('<?php echo site_url('simpanan/cetak_struk') ?>'+"/"+y);
		}
		function tmp(x){
			x=$("#id_simpanan").val();
			$('#table_detail').load('<?php echo site_url('simpanan/tmp_detail') ?>'+"/"+x);
		}
		function cari_id_anggota(){
		$.ajax({
			url:"<?php echo site_url('simpanan/cari_id_anggota') ?>",
			type:"POST",
			dataType:"json",
			data:{
				nama:$("#nama").val()
			},
			success:function(hasil){
				$("#id_anggota").val(hasil.id_anggota);
			}
		})
	}
		function simpan_detail(){
			$.ajax({
				url:"<?php echo site_url('simpanan/simpan_detail') ?>",
				type:"POST",
				data:{
					id_simpanan:$("#id_simpanan").val(),
					tgl_detail_simpanan:$("#tgl_detail_simpanan").val(),
					besar_simpanan:$("#besar_simpanan").val()
				},
				success:function(hasil){
					tmp();
				}
			})
		}
		function simpan_simpanan(){
			$.ajax({
				url:"<?php echo site_url('simpanan/simpan_simpanan') ?>",
				type:"POST",
				data:{
					id_simpanan:$("#id_simpanan").val(),
					id_kategori_simpanan:$("#id_kategori_simpanan").val(),
					id_anggota:$("#id_anggota").val(),
					nama_petugas:$("#nama_petugas").val(),
					tgl_simpanan:$("#tgl_detail_simpanan").val(),
					total_simpanan:$("#total_simpanan").val()
				},
				success:function(hasil){
					cetak_struk();
					document.location="http://localhost/koperasi/index.php/simpanan/page/simpanan";	
				}
			})
		}
		function edit_simpanan(){
			$.ajax({
				url:"<?php echo site_url('simpanan/edit_simpanan') ?>",
				type:"POST",
				data:{
					id_simpanan:$("#id_simpanan").val(),
					tgl_simpanan:$("#tgl_detail_simpanan").val(),
					total_simpanan:$("#total_simpanan").val()
				},
				success:function(hasil){
					cetak_struk();
					document.location="http://localhost/koperasi/index.php/simpanan/page/simpanan";	
				}
			})	
		}
</script>