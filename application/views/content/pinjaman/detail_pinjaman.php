<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/index.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/DataTables/media/css/dataTables.bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/sweetalert2-master/dist/sweetalert2.min.css') ?>">
	<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>dist/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>dist/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>dist/sweetalert2-master/dist/sweetalert2.min.js"></script>
<h2>Detail Daftar Pinjaman</h2>
<div class="table-responsive">
	<table class="table table-bordered" id="tabel">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori Pinjaman</th>
				<th>Nama Anggota</th>
				<th>Besar Pinjaman</th>
				<th>Besar Angsuran</th>
				<th>Biaya Administrasi</th>
				<th>Jaminan</th>
				<th>Tanggal Pangajuan</th>
				<th>Tanggal Acc</th>
				<th>Tanggal Pelunasan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$jml = 
			$no = 0;
			foreach ($tmp_detail as $data) {$no++;
			 ?>
			 <tr>
			 	<td><?php echo $no; ?></td>
			 	<td><?php echo $data->nama_kategori_pinjaman; ?></td>
			 	<td><?php echo $data->nama ?></td>
			 	<td><?php echo $data->besar_pinjaman ?></td>
			 	<td><?php echo $data->besar_angsuran ?></td>
			 	<td><?php echo $data->biaya_admin ?></td>
			 	<td><?php echo $data->jaminan ?></td>
			 	<td><?php echo $data->tgl_pengajuan ?></td>
			 	<td><?php echo $data->tgl_acc ?></td>
			 	<td><?php echo $data->tgl_pelunasan ?></td>
			 	<td><?php echo $data->status_pinjaman ?></td>
			 </tr>
			 <?php $jml = $jml+$data->besar_pinjaman-$data->biaya_admin;} ?>
			 <tr>
			 	<td colspan="9"></td>
			 	<td><strong>Total Pinjaman Yang Diperoleh</strong></td>
			 	<td><?php echo $jml; ?></td>
			 </tr>
		</tbody>
	</table>
</div>
<script type="text/javascript">
</script>