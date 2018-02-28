<h2>Data Pinjaman</h2>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label>Tanggal Pengajuan</label>
			<input type="date" class="form-control" name="" value="<?php echo date('Y-m-d') ?>" id="tgl_pengajuan">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Id Anggota</label>
			<input type="text" class="form-control" name="" id="id_anggota" onchange="cari_nama_anggota()">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Nama Anggota</label>
			<input type="text" readonly="" class="form-control" id="nama" name="">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Kategori Pinjaman</label>
			<select class="form-control" onchange="cari_detail_kategori_pinjaman()" id="id_kategori_pinjaman">
				<option>--PILIH KATEGORI PINJAMAN--</option>
				<?php 
					foreach ($tmp_kategori_pinjaman as $item_kategori_pinjaman) {
				 ?>
				 <option value="<?php echo $item_kategori_pinjaman->id_kategori_pinjaman ?>"><?php echo $item_kategori_pinjaman->nama_kategori_pinjaman ?></option>
				 <?php } ?>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Jangka Waktu</label>
			<input type="text" class="form-control" readonly="" id="jangka_waktu" name="">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Besar Bunga</label>
			<input type="text" class="form-control" readonly="" id="besar_bunga" name="">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Pilih Jenis Jaminan</label>
			<select class="form-control" id="jenis_jaminan">
				<option>--PILIH JAMINAN--</option>
				<?php 
					$kategori_jaminan = array('BPKB MOTOR' => 'Motor','BPKB MOBIL' => 'Mobil','SURAT TANAH' => 'Tanah');
					foreach ($kategori_jaminan as $item_kategori_jaminan => $value) {
				 ?>
				 <option value="<?php echo $value; ?>"><?php echo $item_kategori_jaminan; ?></option>
				 <?php } ?>
			</select>
		</div>
	</div>
	<div  class="col-md-3">
		<div class="form-group">
			<label>Besar Pinjaman</label>
			<input type="text" id="besar_pinjaman" class="form-control" name="" onkeyup="jenis_jaminan()">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Biaya Adminitrasi</label>
			<input type="text" class="form-control" id="biaya_admin" readonly="" name="">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Besar Angsuran</label>
			<input type="text" id="besar_angsuran" name="" readonly="" class="form-control">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<button class="btn btn-info form-control" onclick="simpan_pinjaman()">Ajukan Pinjaman</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	function cari_nama_anggota() {
		$.ajax({
			url:"<?php echo site_url('pinjaman/cari_nama_anggota') ?>",
			type:"POST",
			dataType:"json",
			data:{
				id_anggota:$("#id_anggota").val()
			},
			success:function (hasil) {
				$("#nama").val(hasil.nama);
			}
		});
	}
	function cari_detail_kategori_pinjaman(){
		$.ajax({
			url:"<?php echo site_url('pinjaman/cari_detail_kategori_pinjaman') ?>",
			type:"POST",
			dataType:"json",
			data:{
				id_kategori_pinjaman:$("#id_kategori_pinjaman").val()
			},
			success:function (hasil) {
				$("#jangka_waktu").val(hasil.jangka_waktu);
				$("#besar_bunga").val(hasil.besar_bunga);
			}
		})
	}
	function  jenis_jaminan() {
		nama_jaminana = $("#jenis_jaminan").val();
		besar_pinjaman = $("#besar_pinjaman").val();
		besar_bunga = $("#besar_bunga").val();
		jangka_waktu = $("#jangka_waktu").val();
		hitung_angsuran();
		if(nama_jaminana === "Motor"){
			if(besar_pinjaman < 10000000){

			}else{
				swal('GAGAL','BESAR PINJAMAN HARUS KURANG DARI 10 JUTA','error');
			}
		}else if(nama_jaminana === "Mobil"){
			if(besar_pinjaman < 20000000){

			}else{
				swal('GAGAL','BESAR PINJAMAN HARUS KURANG DARI 20 JUTA','error');
			}
		}else if(nama_jaminana === "Tanah"){
			if(besar_pinjaman < 40000000){

			}else{
				swal('GAGAL','BESAR PINJAMAN HARUS LEBIH DARI 40 JUTA','error');
			}
		}else{
		
		}
	}
	function hitung_angsuran() {
		besar_pinjaman = $("#besar_pinjaman").val();
		besar_bunga = $("#besar_bunga").val();
		jangka_waktu = $("#jangka_waktu").val();
		a = parseInt(besar_bunga)/100;
		b = besar_pinjaman*a;
		c = parseInt(besar_pinjaman)+parseInt(b);
		d = parseInt(c)/parseInt(jangka_waktu);
		e = besar_pinjaman*0.1;
		$("#biaya_admin").val(e);
		$("#besar_angsuran").val(d);
	}
	function simpan_pinjaman() {
		$.ajax({
			url:"<?php echo site_url('pinjaman/simpan_pinjaman') ?>",
			type:"POST",
			data:{
				id_kategori_pinjaman:$("#id_kategori_pinjaman").val(),
				id_anggota:$("#id_anggota").val(),
				besar_pinjaman:$("#besar_pinjaman").val(),
				jaminan:$("#jenis_jaminan").val(),
				tgl_pengajuan:$("#tgl_pengajuan").val(),
				besar_angsuran:$("#besar_angsuran").val(),
				biaya_admin:$("#biaya_admin").val()
			},
			success:function (hasil) {
				document.location="http://localhost/koperasi/index.php/pinjaman/page/pinjaman";
			}
		})
	}
</script>