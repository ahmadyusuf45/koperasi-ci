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
	<h1 style="text-align: center;"><span><?php echo $this->uri->segment(3);?></span><span> S/D </span><span><?php echo $this->uri->segment(4);?></span></h1>
	<h1 style="text-align: center;"><i class="fa fa-university" aria-hidden="true"></i> KOPERASI SIMPAN PINJAM</h1>
	<div class="table-responsive col-md-12">
		<table class="table table-bordered">
			<thead>
			<tr>
				<th>No</th>
				<th>Nama Simpanan</th>
				<th>Nama Anggota</th>
				<th>Tanggal Simpanan</th>
				<th>Total Simpanan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$jml = "";
				$no = 0;
				foreach ($tmp_simpanan as $data) {$no++;
				 ?>
			<tr>
				
				 <td><?php echo $no; ?></td>
				 <td><?php echo $data->nama_kategori_simpanan ?></td>
				 <td><?php echo $data->nama ?></td>
				 <td><?php echo $data->tgl_simpanan; ?></td>
				 <td><?php echo $data->total_simpanan ?></td>
			</tr>
			<?php $jml = $jml+$data->total_simpanan; } ?>
			<tr>
				<td colspan="3"></td>
				<td><strong>Total Simpanan</strong></td>
				<td><?php echo $jml ?></td>
			</tr>
		</tbody>
		</table>
	</div>
	<div class="col-md-3 col-md-offset-9">
		<p><strong> TTD</strong></p>
	</div>