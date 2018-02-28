<h2>Data Simpanan 
	<a onclick="f_page('<?php echo site_url('simpanan/page/f_simpanan') ?>')" class="btn btn-primary btn-kanan btn-sm">Tambah Data +</a>
</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Simpanan</th>
				<th>Nama Anggota</th>
				<th>Tanggal Simpanan</th>
				<th>Total Simpanan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				foreach ($tmp_simpanan as $data) {$no++;
				 ?>
			<tr>
				
				 <td><?php echo $no; ?></td>
				 <td><?php echo $data->nama_kategori_simpanan ?></td>
				 <td><?php echo $data->nama ?></td>
				 <td><?php echo $data->tgl_simpanan; ?></td>
				 <td><?php echo $data->total_simpanan ?></td>
				 <td>
		 			<button class="btn btn-warning btn-sm" onclick="f_page('<?php echo site_url('simpanan/page/f_simpanan') ?>/<?php echo $data->id_simpanan ?>')">Simpanan +</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_simpanan('<?php echo $data->id_simpanan; ?>')">Hapus</button>
		 		</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$("#table").DataTable();
	})
	function hapus_simpanan(id){
		$.ajax({
			url:"<?php echo site_url('simpanan/hapus_simpanan') ?>",
			type:"GET",
			data:{
				id_simpanan:id
			},
			success:function(data){
				document.location='http://localhost/koperasi/index.php/simpanan/page/simpanan';
			}
		})
	}
</script>