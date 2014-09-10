<!doctype html>
<html lang="en">
	<head>
		<title><?= $title ?></title>
		<meta name="description" content="<?=$des?>">
        <meta name="keywords" content="<?=$tag?>">
        <meta name='author' content='Fachrur Rois H'/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
       	<link rel="stylesheet" href="<?=base_url('/asset/bootstrap/css/bootstrap.css')?>" media="screen">
		<link rel="stylesheet" href="<?=base_url('/asset/css/style.css')?>">
		<style type="text/css">
			#wrapper{background: url('<?=base_url('assets/file/'.$back)?>') top center no-repeat;padding:53px 0;}
		</style>
	</head>
	<body>
		<header>
			<div class="container">
				<div class = "logo">
					<div class="clear"></div>
				</div>
				<div class="navbar navbar-fixed-top">
					<div class="navbar-inner">
						<div class="container">
							<a class="brand" style="text-transform: uppercase;" href="<?=site_url('index');?>">SIMOTKO</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="wrapper">
			<div class="container">
			    <div class="pull-left" id="menu-kiri">
					<div class="kotak-trans">
						<h1><?= $welcome ?></h1>
						<h4><i><?= $deskripsi ?></i></h4>
						<h5><?= $keterangan ?></h5>
					</div>
					<a href="<?= $link_site ?>" class="btn btn-primary btn-large"><?= $site ?></a> 
				</div>
				<div class="pull-right">
					<div class="kotak" id="menu-kanan">
						<h3 align="center">LOGIN SISTEM</h3>
						<?php if(isset($error)):?>
							<div class="alert alert-error">
						      <button type="button" class="close" data-dismiss="alert">&times;</button>
						      <strong>Ups...Sorry!</strong> Pastikan account anda sudah aktif
						    </div>
						<?php endif;?>
						<?=form_open('login','class="form form-horizontal" id="login-form"')?>   
							<p align="center"><i class="icon-user"></i> Username</p>
							<p align="center"><?=form_input('username','','style="width:85%;padding:8px;" placeholder="username" required')?></p>
							<p align="center"><i class="icon-lock"></i> Password</p>
							<p align="center"><?=form_password('password','','style="width:85%;padding:8px;" placeholder="password" required')?></p>
							<p align="center"><?=form_submit('submit','Login','class="btn btn-primary btn-large"')?></p>
						<?=form_close()?>	
					</div>
				</div>
				<div class="clear"></div>
			</div>		
		</div>
		<div class="bottom-footer">
			<div class="container">
				<address>
				  	<strong><?=$company?></strong><br>
					<?=$alamat?><br>
					<abbr title="Phone">Phone:</abbr> <?=$phone?>
				</address>
			</div>
		</div>	
	</body>
</html>