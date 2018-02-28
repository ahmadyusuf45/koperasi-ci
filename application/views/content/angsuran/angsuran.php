<h2>Daftar Angsuran 
		<button class="btn btn-primary btn-kanan btn-sm" onclick="f_page('<?php echo site_url('angsuran/page/f_angsuran') ?>')">Tambah Data +</button>
</h2>
<div class="table-responsive">
	<table class="table table-striped" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Id Angsuran</th>
				<th>Nama Anggota</th>
				<th>Besar Pinjaman</th>
				<th>Tanggal Pembayaran Angsuran</th>
				<th>Keterangan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 0;
				foreach ($tmp_angsuran as $data) {$no++;
			 ?>
			 <tr>
			 	<td><?php echo $no; ?></td>
			 	<td><?php echo $data->id_angsuran ?></td>
			 	<td><?php echo $data->nama ?></td>
			 	<td><?php echo $data->besar_pinjaman ?></td>
			 	<td><?php echo $data->tgl_pembayaran ?></td>
			 	<td><?php echo $data->keterangan_angsuran ?></td>
			 	<td>
			 		<button class="btn btn-sm btn-warning" onclick="f_page('<?php echo site_url('angsuran/page/f_angsuran') ?>/<?php echo $data->id_angsuran ?>')">Angsuran +</button>
			 		<button class="btn btn-danger btn-sm" onclick="hapus_angsuran('<?php echo $data->id_angsuran; ?>')">Hapus</button>
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
	function hapus_angsuran(id){
		$.ajax({
			url:"<?php echo site_url('angsuran/hapus_angsuran') ?>",
			type:"GET",
			data:{
				id_angsuran:id
			},
			success:function(data) {
				document.location='http://localhost/koperasi/index.php/angsuran/page/angsuran';
			}
		})
	}
</script>