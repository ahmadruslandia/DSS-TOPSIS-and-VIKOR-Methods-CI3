<?php
if (!$this->session->has_userdata('login'))
	redirect('user/login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?= base_url('favicon.ico') ?>" />

	<title>SPK</title>
	<link href="<?= base_url('assets/css/flatly-bootstrap.min.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/general.css') ?>" rel="stylesheet" />
	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= site_url() ?>">SPK</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?= site_url('home') ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li class="dropdown">
						<a href="<?= site_url('kriteria') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-pushpin"></span> Kriteria <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= site_url('kriteria') ?>">Kriteria</a></li>
							<li><a href="<?= site_url('crips') ?>">Nilai Crips</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="?m=alternatif" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-pencil"></span> Alternatif <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= site_url('alternatif') ?>">Alternatif</a></li>
							<li><a href="<?= site_url('relasi') ?>">Nilai Alternatif</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="?m=alternatif" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-stats"></span> Perhitungan <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= site_url('hitung/topsis') ?>">TOPSIS</a></li>
							<li><a href="<?= site_url('hitung/vikor') ?>">VIKOR</a></li>
						</ul>
					</li>
					<li><a href="<?= site_url('user/password') ?>"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
					<li><a href="<?= site_url('user/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
	</nav>

	<div class="container">
		<div class="page-header">
			<h1><?= $title ?></h1>
		</div>