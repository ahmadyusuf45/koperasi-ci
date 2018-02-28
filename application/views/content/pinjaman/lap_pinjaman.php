<h2>Daftar Pinjaman </h2>
<div class="form-inline">
	<?php echo form_open('pinjaman/page/lap_pinjaman') ?>
	<div class="form-group">
		<input type="date" class="form-control input-sm" id="tgl_awal" value="<?php echo $this->input->post('awal'); ?>"  name="awal">
	</div>
	<div class="form-group">
		<input type="date" id="tgl_akhir" class="form-control input-sm" value="<?php echo $this->input->post('akhir'); ?>"  name="akhir">
	</div>
	<input name="cari" type="submit" value="Cari" class="btn btn-danger btn-sm">
	<input type="button" value="Cetak" class="btn btn-primary btn-sm" onclick="cetak_lap()">
	<?php echo form_close() ?>
</div><br>
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
			 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$("#table").DataTable();
	})
	function cetak_lap(){
		tgl_awal = $("#tgl_awal").val();
		tgl_akhir = $("#tgl_akhir").val();
		window.open("<?php echo site_url('pinjaman/cetak_lap'); ?>"+"/"+tgl_awal+"/"+tgl_akhir);
	}
</script>