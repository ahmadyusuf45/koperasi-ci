<h2>Data Kategori Pinjaman <button class="btn btn-primary btn-sm btn-kanan" onclick="modal('<?php echo site_url('pinjaman/page/f_kategori_pinjaman'); ?>','open')">Tambah Data +</button></h2>
<div class="table-reponsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori Pinjaman</th>
				<th>Jangka Waktu Pinjaman</th>
				<th>Besar Bunga Pinjaman</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no=0;
				foreach ($tmp_kategori_pinjaman as $data) {$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data->nama_kategori_pinjaman ?></td>
				<td><?php echo $data->jangka_waktu; ?> Bulan</td>
				<td><?php echo $data->besar_bunga; ?></td>
				<td>
					<button class="btn btn-warning btn-sm" onclick="modal('<?php echo site_url('pinjaman/page/f_kategori_pinjaman') ?>/<?php echo $data->id_kategori_pinjaman ?>','open')">Edit</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_kategori_pinjaman('<?php echo $data->id_kategori_pinjaman; ?>')">Hapus</button>
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
	function hapus_kategori_pinjaman(id){
		$.ajax({
			url:"<?php echo site_url('pinjaman/hapus_kategori_pinjaman') ?>",
			type:"GET",
			data:{
				id_kategori_pinjaman:id
			},
			success:function(data) {
				document.location='http://localhost/koperasi/index.php/pinjaman/page/kategori_pinjaman';
			}
		})
	}
</script>