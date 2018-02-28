<?php  
	if($status =='edit'){
		$val = $hsl->row_array();
	}else{
		$val['id_anggota']="";
		$val['nama'] ="";
		$val['alamat'] ="";
		$val['tgl_lahir']="";
		$val['jenis_kelamin']="";
		$val['no_tlp']="";
		$val['keterangan']="";
		$val['status']="";
	}
?>
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" style="font-weight: normal;"><?php echo $judul; ?> Anggota</h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Nama Anggota</label>
				<input type="text" hidden="" id="id_anggota" value="<?php echo $val['id_anggota']; ?>" name="">
				<input type="text" class="form-control" id="nama" value="<?php echo $val['nama']; ?>" required name="">
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" class="form-control" id="tgl_lahir" required name="" value="<?php echo $val['tgl_lahir'] ?>">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<?php 
				$l = "";
				$p = "";
				if ($val['jenis_kelamin'] == "Laki-Laki") {
					$l = "checked";
				}elseif($val['jenis_kelamin']=="Permpuan"){
					$p = "checked";
				}
				?>
				<div class="radio">
					<label>
					<input type="radio" id="jenis_kelamin" value="Permpuan" name="jenis_kelamin" class=""<?php echo $p; ?>> Permpuan</label>
					<label>
					<input type="radio" id="jenis_kelamin" value="Laki-Laki" class="" name="jenis_kelamin" <?php echo $l; ?>> Laki-Laki</label>	
				</div>
				
			</div>
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" id="status">
					<option>--Pilih Status--</option>
					<?php 
					$isi_status = array('Belum Menikah' ,'Sudah Menikah' );
					$select_status ="";
					foreach ($isi_status as $status) {
						if($val['status'] == $status){
							$select_status = "selected";
						}else{
							$select_status ="";
						}
					 ?>
					 <option <?php echo $select_status ?> value="<?php echo $status ?>"><?php echo $status ?></option>
					 <?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Nomor Telepon</label>
				<input type="text" class="form-control" id="no_tlp" required name="" value="<?php echo $val['no_tlp'] ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<select class="form-control" id="keterangan">
					<option>--Pilih Status--</option>
					<?php 
					$isi_ket = array('Aktif','Tidak Aktif');
					$select_ket = "";
					foreach ($isi_ket as $ket) {
						if($val['keterangan'] == $ket){
							$select_ket = "selected";
						}else{
							$select_ket = "";
						}
					?>
					<option <?php echo $select_ket ?> value = "<?php echo $ket ?>"><?php echo $ket ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea id="alamat" class="form-control"><?php echo $val['alamat']; ?></textarea>
			</div>		
			<div class="form-group">
				<button class="btn btn-info form-control" onclick="<?php echo $onclick; ?>"><?php echo $value ?></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function simpan_anggota(){
		$.ajax({
			url:"<?php echo site_url('anggota/simpan_anggota'); ?>",
			type:"POST",
			data:{
				nama:$("#nama").val(),
				tgl_lahir:$("#tgl_lahir").val(),
				alamat:$("#alamat").val(),
				no_tlp:$("#no_tlp").val(),
				status:$("#status").val(),
				jenis_kelamin:$("#jenis_kelamin").val(),
				keterangan:$("#keterangan").val()
			},
			success:function(hasil){
				document.location="<?php echo site_url('anggota/page/anggota'); ?>"
			}
		})
	}
	function edit_anggota(){
		$.ajax({
			url:"<?php echo site_url('anggota/edit_anggota') ?>",
			type:"POST",
			data:{
				id_anggota:$("#id_anggota").val(),
				nama:$("#nama").val(),
				tgl_lahir:$("#tgl_lahir").val(),
				alamat:$("#alamat").val(),
				no_tlp:$("#no_tlp").val(),
				status:$("#status").val(),
				jenis_kelamin:$("#jenis_kelamin").val(),
				keterangan:$("#keterangan").val()
			},
			success:function(hasil){
				document.location='http://localhost/koperasi/index.php/anggota/page/anggota';
			}
		})	
	}
</script>