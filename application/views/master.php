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
<body style="background-color: #ccc;">
	<div class="col-md-4 col-md-offset-4 skin-login">
		<span class="fa fa-user-circle"></span>
		<h1>LOGIN</h1>
		<?php echo form_open('master/aksi_login'); ?>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div>
			<input type="text" placeholder="username" class="form-control" name="username">
			</div>	
		</div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
			<input type="password" placeholder="password" class="form-control" name="password">
			</div>	
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary form-control" name="login" value="Login">
		</div>
		<?php echo form_close(); ?>
	</div>
</body>
</html>