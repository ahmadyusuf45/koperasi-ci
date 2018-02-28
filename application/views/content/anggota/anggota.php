<h2>Data Anggota <button class="btn btn-primary btn-outline btn-sm btn-kanan" onclick="modal('<?php echo site_url('anggota/page/f_anggota') ?>','open')">Tambah Data +</button></h2>
<div class="table-responsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Anggota</th>
			<th>Alamat</th>
			<th>tanggal lahir</th>
			<th>Jenis Kelamin</th>
			<th>Status</th>
			<th>No Telepon</th>
			<th>Keterangan</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		 <?php 
		$no=0;
		foreach ($tmp_anggota as $data) {$no++;
		 ?>
		 <tr>
		 	<td><?php echo $no; ?></td>
		 	<td><?php echo $data->nama; ?></td>
		 	<td><?php echo $data->alamat; ?></td>
		 	<td><?php echo $data->tgl_lahir; ?></td>
		 	<td><?php echo $data->jenis_kelamin; ?></td>
		 	<td><?php echo $data->status; ?></td>
		 	<td><?php echo $data->no_tlp; ?></td>
		 	<td><?php echo $data->keterangan; ?></td>
		 	<td>
		 		<button class="btn btn-warning btn-sm" onclick="modal('<?php echo site_url('anggota/page/f_anggota') ?>/<?php echo $data->id_anggota ?>','open')">Edit</button>
		 		<button class="btn btn-danger btn-sm" onclick="hapus_anggota('<?php echo $data->id_anggota; ?>')">Hapus</button>
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
	function hapus_anggota(id){
		$.ajax({
			url:"<?php echo site_url('anggota/hapus_anggota') ?>",
			type:"GET",
			data:{
				id_anggota:id
			},
			success:function(data) {
				document.location='http://localhost/koperasi/index.php/anggota/page/anggota';
			}
		})
	}
</script>