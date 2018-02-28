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
	<h1 style="text-align: center;"><i class="fa fa-university" aria-hidden="true"></i> KOPERASI SIMPAN PINJAM</h1>
<table class="">
<?php $item= $tmp_simpanan->row_array(); ?>
	<tr>
		<td>Nama</td>
		<td>: <?php echo $item['nama'] ?></td>
	</tr>
	<tr>
		<td>Id Anggota</td>
		<td>: <?php echo $item['id_anggota'] ?></td>
	</tr>
	<tr>
		<td>Nama Petugas</td>
		<td>: <?php echo $item['nama_petugas'] ?></td>
	</tr>
</table>
<table class="table table-striped table-sm" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal Simpanan</th>
			<th>Besar Simpanan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$jml = 0;
		$no = 0;
		foreach ($tmp_detail as $data) {$no++;
		 ?>
		 <tr>
		 	<td><?php echo $no; ?></td>
		 	<td><?php echo $data->tgl_detail_simpanan; ?></td>
		 	<td><?php echo $data->besar_simpanan; ?></td>
		 </tr>
		 <?php } ?>
		 		<tr>
			<td colspan="1"></td>
			<td><strong>Total Simpanan</strong></td>
			<td><?php echo $item['total_simpanan']; ?></td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function () {
		window.print();
	});
</script>