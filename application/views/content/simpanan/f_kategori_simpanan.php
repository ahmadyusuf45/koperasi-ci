<?php 
	if($status == 'edit'){
		$val = $hsl->row_array();
	}else{
		$val['id_kategori_simpanan'] = "";
		$val['nama_kategori_simpanan'] = "";
	}
 ?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo $judul ?> Kategori Simpanan</h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Nama Kategori Simpanan</label>
				<input type="text" id="id_kategori_simpanan" hidden="" value="<?php echo $val['id_kategori_simpanan'] ?>" name="">
				<input type="text" class="form-control" id="nama_kategori_simpanan" value="<?php echo $val['nama_kategori_simpanan'] ?>" name="">
			</div>
			<div class="form-group">
				<button onclick="<?php echo $onclick ?>" class="btn btn-info form-control"><?php echo $value; ?></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function simpan_kategori_simpanan(){
		$.ajax({
			url:"<?php echo site_url('simpanan/simpan_kategori_simpanan') ?>",
			type:"POST",
			data:{
				nama_kategori_simpanan:$("#nama_kategori_simpanan").val()
			},
			success:function (hasil) {
				document.location='http://localhost/koperasi/index.php/simpanan/page/kategori_simpanan';
			}
		})
	}
	function edit_kategori_simpanan(){
		$.ajax({
			url:"<?php echo site_url('simpanan/edit_kategori_simpanan') ?>",
		type:"POST",
		data:{
			id_kategori_simpanan:$("#id_kategori_simpanan").val(),
			nama_kategori_simpanan:$("#nama_kategori_simpanan").val()
		},
		success:function (hasil) {
			document.location='http://localhost/koperasi/index.php/simpanan/page/kategori_simpanan';
		}
	})
	}
</script>