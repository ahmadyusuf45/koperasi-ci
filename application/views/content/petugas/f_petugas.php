<?php 
	if($status == 'edit'){
		$val = $hsl->row_array();
	}else{
		$val['id_petugas'] ="";
		$val['username'] = "";
		$val['password'] = "";
		$val['level'] = "";
	}
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo $judul ?> Petugas</h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Username</label>
				<input type="text" id="username" class="form-control" value="<?php echo $val['username'] ?>" name="">
				<input type="text" id="id_petugas" hidden="" value="<?php echo $val['id_petugas'] ?>" name="">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" id="password" class="form-control" value="<?php echo $val['password'] ?>" name="">
			</div>
			<div class="form-group">
				<label>Level</label>
				<input type="text" class="form-control" name="" id="level" value="<?php echo $val['level'] ?>">
			</div>
			<div class="form-group">
				<button onclick="<?php echo $onclick ?>" class="btn btn-info form-control"><?php echo $value; ?></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function simpan_petugas() {
		$.ajax({
			url:"<?php echo site_url('petugas/simpan_petugas') ?>",
			type:"POST",
			data:{
				username:$("#username").val(),
				password:$("#password").val(),
				level:$("#level").val()
			},
			success:function (hasil) {
				document.location='http://localhost/koperasi/index.php/petugas/page/petugas';
			}
		})
	}
	function edit_petugas() {
		$.ajax({
			url:"<?php echo site_url('petugas/edit_petugas') ?>",
			type:"POST",
			data:{
				id_petugas:$("#id_petugas").val(),
				username:$("#username").val(),
				password:$("#password").val(),
				level:$("#level").val()
			},
			success:function (hasil) {
				document.location='http://localhost/koperasi/index.php/petugas/page/petugas';
			}
		})	
	}
</script>