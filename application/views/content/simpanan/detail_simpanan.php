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
		 <?php $jml=$jml+$data->besar_simpanan;} ?>
		 </tr>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function () {
		$('#table').DataTable();
	});
	document.getElementById('total_simpanan').value="<?php echo $jml; ?>";
</script>