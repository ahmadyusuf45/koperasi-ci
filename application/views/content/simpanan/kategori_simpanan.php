<h2>Data Kategori Simpanan <button class="btn btn-primary btn-outline btn-sm btn-kanan" onclick="modal('<?php echo site_url('simpanan/page/f_kategori_simpanan') ?>','open')">Tambah Data +</button></h2>
<div class="table-responsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori Simpanan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				foreach ($tmp_kategori_simpanan as $data) {$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data->nama_kategori_simpanan; ?></td>
				<td>
					<button class="btn btn-warning btn-sm" onclick="modal('<?php echo site_url('simpanan/page/f_kategori_simpanan') ?>/<?php echo $data->id_kategori_simpanan ?>','open')">Edit</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_kategori_simpanan('<?php echo $data->id_kategori_simpanan; ?>')">Hapus</button>		
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
	function hapus_kategori_simpanan(id){
		$.ajax({
			url:"<?php echo site_url('simpanan/hapus_kategori_simpanan') ?>",
			type:"GET",
			data:{
				id_kategori_simpanan:id
			},
			success:function(data) {
				document.location='http://localhost/koperasi/index.php/simpanan/page/kategori_simpanan';
			}
		})
	}
</script>