<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
	<!-- script -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
	<title>Tambah Data Buku - Karisma</title>
	<style>
	.card {
		margin-right: auto;
		margin-left: auto;
		margin-bottom: 20px;
		width: 400px;
		padding: 10px;
		border: 1px solid #ccc;

	}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark elegant-color">
		<!-- logo -->
		<a class="navbar-brand" href="index">Karisma</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="basicExampleNav">
		<!-- navbar -->
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="index">Beranda
					<span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index">Buku</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Alat Tulis Kantor</a>
			</li>
			<!-- dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Daftar</a>
				<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">Buku</a>
					<a class="dropdown-item" href="#">Jenis Buku</a>
					<a class="dropdown-item" href="#">Alat Tulis Kantor</a>
					<a class="dropdown-item" href="#">Merk Alat Tulis Kantor</a>
					<a class="dropdown-item" href="#">Jenis Alat Tulis Kantor</a>
					<a class="dropdown-item" href="#">Pengarang</a>
					<a class="dropdown-item" href="#">Jabatan</a>
					<a class="dropdown-item" href="#">Karyawan</a>
				</div>
			</li>
		</ul>
	</div>
</nav><br>
<div class="card">
	<div class="container">
		<br>
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:20px' class='alert alert-danger text-center' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>Data yang diinput telah digunakan</div>";
			}
		}
		?>
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasiltambah"){
				echo "<div style='margin-bottom:20px' class='alert alert-success text-center' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>Data baru telah ditambahkan</div>";
			}
		}
		?>
		<div class="center">
			<form method="post" action="protambahbuku" enctype="multipart/form-data">
				<p class="h4 text-center md-5">Tambah Data Buku</p>
				<div class="md-form">
					<i class="fa fa-code prefix grey-text"></i>
					<input type="text" name="isbn" placeholder="ISBN" required>
				</div>
				<div class="md-form">
					<i class="fa fa-id-card-o prefix grey-text"></i>
					<input type="text" name="idpgr" placeholder="ID Pengarang (P-999)" value="P" required>
				</div>

				<div class="md-form">
					<i class="fa fa-list-ol prefix grey-text"></i>
					<input type="text" name="kodebk" placeholder="Kode Buku (JB-999)" value="JB" required>
				</div>
				<div class="md-form">
					<i class="fa fa-book prefix grey-text"></i>
					<input type="text" name="judul" placeholder="Judul Buku" required>
				</div>
				<div class="md-form">
					<i class="fa fa-globe prefix grey-text"></i>
					<input type="text" name="kota" placeholder="Kota" required>
				</div>
				<div class="md-form">
					<i class="fa fa-sort-numeric-asc prefix grey-text"></i>
					<input type="text" name="tahun" placeholder="Tahun" required>
				</div>
				<div class="md-form">
					<i class="fa fa-archive prefix grey-text"></i>
					<input type="text" name="stokbk" placeholder="Stok Buku" required>
				</div>
				<div class="md-form">
					<i class="fa fa-money prefix grey-text"></i>
					<input type="text" name="hargabk" placeholder="Harga Buku" required>
				</div>
				<br><br>
				<center class="mb-3"><input type="submit" class="btn btn-primary" value="Simpan">
					<input class="btn btn-danger" onclick="konfirmasi()" type="button" value="Batal"></center>
				</form>
			</div>
		</div>
	</div>
	<script type='text/javascript'>
		function konfirmasi() {
			var answer = confirm('Ingin meninggalkan form?')
			if (answer){
				window.location = 'index';
			}
		}
	</script>
	<script type='text/javascript'>
	function keluar() {
		var kel = confirm('Ingin keluar dari akun?')
		if (kel){
			window.location = '../index.php?pesan=keluar';
		}
	}
</script>
</body>
</html>