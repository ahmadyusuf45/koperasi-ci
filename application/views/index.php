<!DOCTYPE html>
<html>
<head>
	<title></title>
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
</head>
<body style="background-color: #efefef;">
<div class="menu_atas">
	
	<section>
		<a onclick="document.location='<?php echo site_url('master/logout') ?>'"><span class="fa fa-sign-out"></span> logout</a>
	</section>
</div>
<div class="menu_kiri">
	<div class="status">
		<h3 ><span class="fa fa-user-circle"></span> <?php echo $this->session->userdata('level'); ?></h3>
	</div>
	<section>
	<?php if($this->session->userdata('level')=="admin"){ ?>
		<a href="<?php echo site_url('beranda') ?>">Beranda</a>
		<a href="<?php echo site_url('anggota/page/anggota') ?>">anggota</a>
		<a href="<?php echo site_url('petugas/page/petugas') ?>">Petugas</a>
		<a data-toggle="collapse" data-target="#kategori">Kategori</a>
		<div class="collapse drop-menu-kiri" id="kategori">
			<a href="<?php echo site_url('simpanan/page/kategori_simpanan') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> kategori simpanan</a>
			<a href="<?php echo site_url('pinjaman/page/kategori_pinjaman') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> kategori pinjaman</a>
		</div>
	<?php }elseif($this->session->userdata('level')=="petugas"){ ?>
		<a href="<?php echo site_url('beranda') ?>">Beranda</a>
		<a data-toggle="collapse" data-target="#transaksi">Transaksi</a>
		<div class="collapse drop-menu-kiri" id="transaksi">
			<a href="<?php echo site_url('simpanan/page/simpanan') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> simpanan</a>
			<a href="<?php echo site_url('pinjaman/page/pinjaman') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> pinjaman</a>
			<a href="<?php echo site_url('angsuran/page/angsuran') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> angsuran</a>
		</div>
	<?php }else{ ?>
		<a href="<?php echo site_url('beranda') ?>">Beranda</a>
		<a href="<?php echo site_url('pinjaman/page/pinjaman') ?>">konfirmasi pinjaman</a>
		<a data-toggle="collapse" data-target="#Laporan">Laporan</a>
		<div class="collapse drop-menu-kiri" id="Laporan">
			<a href="<?php echo site_url('simpanan/page/lap_simpanan') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> simpanan</a>
			<a href="<?php echo site_url('pinjaman/page/lap_pinjaman') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> pinjaman</a>
			<a href="<?php echo site_url('angsuran/page/lap_angsuran') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> angsuran</a>
		</div>
	<?php } ?>
	</section>
</div>
<div class="content">
	<?php include "content/".$folder.$page.".php"; ?>
</div>
<div class="modal-skin">
</div>
</body>
</html>
<script type="text/javascript">
	function modal(url,method){
		if(method == 'open'){
			$(".modal-skin").load(url);
			$(".modal-skin").fadeIn(100);
		}else{
			$(".modal-skin").fadeOut(100);
		}
	}
	function f_page(url){
		$(".content").load(url);
	}
</script>