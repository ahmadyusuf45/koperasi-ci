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
			 	<td><?php echo $data->id_angsuran ?></td>
			 	<td><?php echo $data->nama ?></td>
			 	<td><?php echo $data->besar_pinjaman ?></td>
			 	<td><?php echo $data->tgl_pembayaran ?></td>
			 	<td><?php echo $data->keterangan_angsuran ?></td>
			 </tr>
			 <?php $jml=$jml+$data->besar_pinjaman; } ?>
			 <tr>
			 	<td colspan="4"></td>
			 	<td><strong>Totol Pinjaman</strong></td>
			 	<td>Rp. <?php echo $jml ?></td>
			 </tr>
		</tbody>
	</table>
</div>
<div class="col-md-3 col-md-offset-9">
	<p><strong> TTD</strong></p>
</div>