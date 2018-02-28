<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Daftar Pinjaman</h4>
		</div>
		<div class="modal-body">
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
				<th style="width: 12%;">Action</th>
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
			 	<td>
			 		<button class="btn btn-info btn-sm" onclick="ambil_id('<?php echo $data->id_pinjaman; ?>')">Tambah +</button>
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
	function cari_pinjaman(){
		$.ajax({
			url:"<?php echo site_url('angsuran/cari_pinjaman') ?>",
			type:"POST",
			dataType:"json",
			data:{
				id_pinjaman:$("#id_pinjaman").val()
			},
			success:function(hasil) {
				$("#id_anggota").val(hasil.id_anggota);
				$("#nama").val(hasil.nama);
				$("#besar_pinjaman").val(hasil.besar_pinjaman);
				$("#besar_angsuran").val(hasil.besar_angsuran);
				$("#tgl_pelunasan").val(hasil.tgl_pelunasan);
				$("#jangka_waktu").val(hasil.jangka_waktu);
				sisa_angsuran();
			}
		})
	}
	function sisa_angsuran(){
		besar_angsuran = $("#besar_angsuran").val();
		besar_pinjaman = $("#besar_pinjaman").val();
		a = parseInt(besar_pinjaman)-parseInt(besar_angsuran);
		$("#sisa_angsuran").val(a)
	}
	function ambil_id(id) {
	modal('','tutup');
	document.getElementById('id_pinjaman').value=id;
	cari_pinjaman();
}
</script>