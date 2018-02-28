<h2>Daftar Angsuran </h2>
<div class="form-inline">
	<?php echo form_open('angsuran/page/lap_angsuran') ?>
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
		window.open("<?php echo site_url('angsuran/cetak_lap'); ?>"+"/"+tgl_awal+"/"+tgl_akhir);
	}
</script>