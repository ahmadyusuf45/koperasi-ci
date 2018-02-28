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
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$hsl = $item_angsuran->row_array();
 ?>
 <h1 style="text-align: center;"><i class="fa fa-university" aria-hidden="true"></i> KOPERASI SIMPAN PINJAM</h1>
 <div class="col-md-6">
 		<table>
 			<tr>
 				<td>Id Pinjaman</td>
 				<td>: <?php echo $hsl['id_pinjaman']; ?></td>
 			</tr>
 			<tr>
 				<td>Id Anggota</td>
 				<td>: <?php echo $hsl['id_anggota']; ?></td>
 			</tr>
 			<tr>
 				<td>Nama Anggota</td>
 				<td>: <?php echo $hsl['nama'] ?></td>
 			</tr>
 		</table>
 </div>
 <div class="col-md-3">
 	<table>
 		<tr>
 			<td>Tanggal Jatuh Tempo</td>
 			<td>: <?php echo $hsl['tgl_jatuh_tempo'] ?></td>
 		</tr>
 		<tr>
 			<td>Status Angsuran</td>
 			<td>: <?php echo $hsl['keterangan_angsuran'] ?></td>
 		</tr>
 	</table>
 </div>
<div class="col-md-12 table-responsive">
	<table class="table table-bordered" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Pembayaran</th>
				<th>Besar Pinjaman</th>
				<th>Besar Angsuran</th>
				<th>Angsuran Ke</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$jml = "";
				$no = 0;
				foreach ($tmp_angsuran as $data) {$no++;
			 ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data->tgl_pembayaran ?></td>
				<td><?php echo $data->besar_pinjaman ?></td>
				<td><?php echo $data->detail_besar_angsuran ?></td>
				<td><?php echo $data->angsuran_ke ?></td>
			</tr>
			<?php $jml = $jml+$data->detail_besar_angsuran; } ?>
			<tr>
				<td colspan="3"></td>
				<td><strong>Total Seluruh Angsuaran</strong></td>
				<td><?php echo $jml ?></td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function () {
		window.print();
	});
</script>