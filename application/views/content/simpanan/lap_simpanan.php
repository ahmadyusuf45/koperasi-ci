<h2>Daftar Simpanan</h2>
<div class="form-inline">
	<?php echo form_open('simpanan/page/lap_simpanan') ?>
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
	<table class="table table-striped table-sm" id="table">
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
		window.open("<?php echo site_url('simpanan/cetak_lap'); ?>"+"/"+tgl_awal+"/"+tgl_akhir);
	}
</script>