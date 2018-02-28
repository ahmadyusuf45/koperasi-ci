<?php 
	if($status == 'edit'){
		$val = $hsl->row_array();
	}else{
		$val['id_kategori_pinjaman'] = "";
		$val['nama_kategori_pinjaman'] = "";
		$val['jangka_waktu'] = "";
		$val['besar_bunga'] ="";
	}
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo $judul ?> Kategori Pinjaman</h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Nama Kategori Pinjaman</label>
				<input type="text" class="form-control" id="nama_kategori_pinjaman" value="<?php echo $val['nama_kategori_pinjaman'] ?>" name="">
				<input type="text" hidden="" id="id_kategori_pinjaman" value="<?php echo $val['id_kategori_pinjaman'] ?>" name="">
			</div>
			<div class="form-group">
				<label>Jangka Waktu Pinjaman</label>
				<input type="text" class="form-control" id="jangka_waktu" value="<?php echo $val['jangka_waktu'] ?>" name="">
			</div>
			<div class="form-group">
				<label>Besar Bunga Pinjaman</label>
				<input type="text" class="form-control" name="" id="besar_bunga" value="<?php echo $val['besar_bunga'] ?>">
			</div>
			<div class="form-group">
				<button class="btn btn-info form-control" onclick="<?php echo $onclick ?>"><?php echo $value ?></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function simpan_kategori_pinjaman(){
		$.ajax({
			url:"<?php echo site_url('pinjaman/simpan_kategori_pinjaman') ?>",
			type:"POST",
			data:{
				nama_kategori_pinjaman:$("#nama_kategori_pinjaman").val(),
				jangka_waktu:$("#jangka_waktu").val(),
				besar_bunga:$("#besar_bunga").val()
			},
			success:function (hasil) {
				document.location='http://localhost/koperasi/index.php/pinjaman/page/kategori_pinjaman';
			}
		})
	}
	function edit_kategori_pinjaman(){
		$.ajax({
			url:"<?php echo site_url('pinjaman/edit_kategori_pinjaman') ?>",
			type:"POST",
			data:{
				id_kategori_pinjaman:$("#id_kategori_pinjaman").val(),
				nama_kategori_pinjaman:$("#nama_kategori_pinjaman").val(),
				jangka_waktu:$("#jangka_waktu").val(),
				besar_bunga:$("#besar_bunga").val()
			},
			success:function (hasil) {
				document.location='http://localhost/koperasi/index.php/pinjaman/page/kategori_pinjaman';
			}
		})	
	}
</script>