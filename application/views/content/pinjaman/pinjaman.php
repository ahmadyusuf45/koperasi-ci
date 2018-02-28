<h2>Daftar Pinjaman 
		<button class="btn btn-primary btn-kanan btn-sm" onclick="f_page('<?php echo site_url('pinjaman/page/f_pinjaman') ?>')">Tambah Data +</button>
</h2>
<div class="form-inline">
	<?php echo form_open('simpanan/page/simpanan') ?>
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
			 		<?php if($this->session->userdata('level')=="petugas"){ ?>
			 		<button class="btn btn-warning btn-sm" onclick="window.open('<?php echo site_url('pinjaman/page/detail_pinjaman') ?>/<?php echo $data->id_pinjaman ?>')">Detail</button>
		 			<button class="btn btn-danger btn-sm" onclick="hapus_pinjaman('<?php echo $data->id_pinjaman; ?>')">Hapus</button>
		 			<?php }elseif($this->session->userdata('level')=="manajer"){?>
		 			<button class="btn btn-primary btn-sm" onclick="modal('<?php echo site_url('pinjaman/page/f_konfirmasi_pinjaman') ?>/<?php echo $data->id_pinjaman ?>','open')">Acc +</button>
		 			<button class="btn btn-warning btn-sm" onclick="window.open('<?php echo site_url('pinjaman/page/detail_pinjaman') ?>/<?php echo $data->id_pinjaman ?>')">Detail</button>
		 			<?php }else{} ?>
			 	</td>
			 </tr>
			 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$("#tabel").DataTable();
	})
	function hapus_pinjaman(id){
		$.ajax({
			url:"<?php echo site_url('pinjaman/hapus_pinjaman') ?>",
			type:"GET",
			data:{
				id_pinjaman:id
			},
			success:function(data) {
				document.location='http://localhost/koperasi/index.php/pinjaman/page/pinjaman';
			}
		})
	}
</script>