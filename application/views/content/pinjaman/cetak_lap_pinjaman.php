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
	<table class="table table-striped table-sm" id="tabel">
		<thead>
			<tr>
				<th style="width: 5%;">No</th>
				<th>Id Pinjaman</th>
				<th>Nama Anggota</th>
				<th>Nama Kategori Pinjaman</th>
				<th>Besar Pinjaman</th>
				<th>Jaminan</th>
				<th>Besar Angsuran</th>
				<th>Biaya Admin</th>
				<th>Tanggal Pangajuan</th>
				<th>Tanggal Acc</th>
				<th>Tanggal Pelunasan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$jml_pinjaman="";
			$jml_angsuran="";
			$jml_admin=""; 
			$no = 0;
			foreach ($tmp_pinjaman as $data) {$no++;
			 ?>
			 <tr>
			 	<td><?php echo $no; ?></td>
			 	<td><?php echo $data->id_pinjaman ?></td>
			 	<td><?php echo $data->nama ?></td>
			 	<td><?php echo $data->nama_kategori_pinjaman; ?></td>
			 	<td><?php echo $data->besar_pinjaman ?></td>
			 	<td><?php echo $data->jaminan ?></td>
			 	<td><?php echo $data->besar_angsuran ?></td>
			 	<td><?php echo $data->biaya_admin ?></td>
			 	<td><?php echo $data->tgl_pengajuan ?></td>
			 	<td><?php echo $data->tgl_acc ?></td>
			 	<td><?php echo $data->tgl_pelunasan ?></td>
			 	<td><?php echo $data->status_pinjaman ?></td>
			 </tr>
			 <?php $jml_pinjaman=$jml_pinjaman+$data->besar_pinjaman; $jml_angsuran=$jml_angsuran+$data->besar_angsuran; $jml_admin=$jml_admin+$data->biaya_admin; } ?>
		</tbody>
		<tbody>
			<tr>
				<td colspan="6"></td>
				<td><strong> Jumlah Total Pinjaman</strong></td>
				<td><?php echo $jml_pinjaman; ?></td>
				<td><strong>Jumlah Total Angsuran</strong></td>
				<td><?php echo $jml_angsuran; ?></td>
				<td><strong>Jumlah Total Biaya Administrasi</strong></td>
				<td><?php echo $jml_admin; ?></td>
			</tr>
		</tbody>
	</table>
</div>
<div class="col-md-3 col-md-offset-9">
	<p><strong> TTD</strong></p>
</div>