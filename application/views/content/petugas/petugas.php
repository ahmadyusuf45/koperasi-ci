<h2>Data Petugas <button class="btn btn-primary btn-kanan btn-sm" onclick="modal('<?php echo site_url('petugas/page/f_petugas') ?>','open')">Tambah Data +</button></h2>
<div class="table-responsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Password</th>
				<th>Level</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				foreach ($tmp_petugas as $data) {$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data->username; ?></td>
				<td><?php echo $data->password; ?></td>
				<td><?php echo $data->level; ?></td>
				<td>
					<button class="btn btn-warning btn-sm" onclick="modal('<?php echo site_url('petugas/page/f_petugas') ?>/<?php echo $data->id_petugas ?>','open')">Edit</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_petugas('<?php echo $data->id_petugas; ?>')">Hapus</button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		table;
	})
	var table =  $('#table').DataTable();
	function hapus_petugas(id){
		$.ajax({
			url:"<?php echo site_url('petugas/hapus_petugas') ?>",
			type:"GET",
			data:{
				id_petugas:id
			},
			success:function(data) {
				document.location='http://localhost/koperasi/index.php/petugas/page/petugas';
			}
		})
	}
</script>