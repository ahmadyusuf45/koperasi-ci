<?php 
	$val = $hsl->row_array();
?>
<div class="modal-dialog modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Konfirmasi Pinjaman</h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label>Tanggal Acc</label>
				<input type="text" id="id_kategori_pinjaman" hidden value="<?php echo $val['id_kategori_pinjaman'] ?>" name="">
				<input type="text" id="id_pinjaman" hidden value="<?php echo $val['id_pinjaman'] ?>" name="">
				<input type="date" id="tgl_acc" value="<?php echo $val['tgl_acc'] ?>" class="form-control" name="">
			</div>
			<div class="form-group">
				<label>Tanggal Pelunasan</label>
				<input type="date" id="tgl_pelunasan" value="<?php echo $val['tgl_pelunasan'] ?>" class="form-control" name="">
			</div>
			<div class="form-group">
				<button class="btn btn-info form-control" onclick="acc_pinjaman()">ACC +</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function acc_pinjaman() {
		$.ajax({
			url:"<?php echo site_url('pinjaman/acc_pinjaman') ?>",
			type:"POST",
			data:{
				id_pinjaman:$("#id_pinjaman").val(),
				id_kategori_pinjaman:$("#id_kategori_pinjaman").val(),
				tgl_acc:$("#tgl_acc").val(),
				tgl_pelunasan:$("#tgl_pelunasan").val()
			},
			success:function (hasil) {
				document.location="http://localhost/koperasi/index.php/pinjaman/page/pinjaman";
			}
		})
	}
</script>