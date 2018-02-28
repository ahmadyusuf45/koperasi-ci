<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Daftar Anggota</h4>
		</div>
		<div class="modal-body">
			<div class="table-responsive">
	<table class="table table-striped table-sm" id="table">
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Anggota</th>
			<th>Alamat</th>
			<th>tanggal lahir</th>
			<th>Jenis Kelamin</th>
			<th>Status</th>
			<th>No Telepon</th>
			<th>Keterangan</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		 <?php 
		$no=0;
		foreach ($tmp_anggota as $data) {$no++;
		 ?>
		 <tr>
		 	<td><?php echo $no; ?></td>
		 	<td><?php echo $data->nama; ?></td>
		 	<td><?php echo $data->alamat; ?></td>
		 	<td><?php echo $data->tgl_lahir; ?></td>
		 	<td><?php echo $data->jenis_kelamin; ?></td>
		 	<td><?php echo $data->status; ?></td>
		 	<td><?php echo $data->no_tlp; ?></td>
		 	<td><?php echo $data->keterangan; ?></td>
		 	<td>
		 		<button class="btn btn-info btn-sm" onclick="ambil_id('<?php echo $data->id_anggota; ?>')">Tambah +</button>
		 	</td>
		 </tr>
		 <?php } ?>
		</tbody>
	</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
	 $('#table').DataTable();
})
	function cari_nama_anggota(){
		$.ajax({
			url:"<?php echo site_url('simpanan/cari_nama_anggota') ?>",
			type:"POST",
			dataType:"json",
			data:{
				id_anggota:$("#id_anggota").val()
			},
			success:function(hasil){
				$("#nama").val(hasil.nama);
			}
		});
	}
function ambil_id(id) {
	modal('','tutup');
	document.getElementById('id_anggota').value=id;
	cari_nama_anggota();
}
</script>