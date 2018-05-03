<!DOCTYPE html>
<html>
<head>
	<title>Daftar Buku</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
	<!-- script -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
	<title>Daftar Buku - Karisma</title>
	<style>
	.card {
		margin-right: auto;
		margin-left: auto;
		margin-bottom: 20px;
		padding: 10px;
		border: 1px solid #ccc;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark elegant-color">
		<!-- logo -->
		<a class="navbar-brand" href="#">Karisma</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="basicExampleNav">
		<!-- navbar -->
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="#">Beranda
					<span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Buku</a>
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
</nav>
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
		if($_GET['pesan'] == "berhasilhapus"){
			echo "<div style='margin-bottom:20px' class='alert alert-success text-center' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>Data berhasil dihapus</div>";
		}
	}
	?>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "berhasilubah"){
			echo "<div style='margin-bottom:20px' class='alert alert-success text-center' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>Data berhasil disimpan</div>";
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
	<h1>Data Buku</h1>
	<a href="<?php echo base_url(); ?>crud/tambahbuku"><button class="btn btn-primary btn-sm" type="button">Tambah Data</button></a><br><br>
	<div class="card">
		<table class="table table-fixed">
			<!--judul table-->
			<tr>
				<th>ISBN</th>
				<th>ID Pengarang</th>
				<th>Kode Jenis Buku</th>
				<th>Judul Buku</th>
				<th>Kota Terbit</th>
				<th>Tahun Terbit</th>
				<th>Stok</th>
				<th>Harga</th>
				<th><i class="fa fa-pencil"></i> Ubah Data</th>
				<th><i class="fa fa-trash"></i> Hapus Data</th>
			</tr>
			<?php foreach ($buku->result_array() as $key): ?>
				<tr>
					<td><?php echo $key['isbn'] ?></td>
					<td><?php echo $key['idpgr'] ?></td>
					<td><?php echo $key['kodebk'] ?></td>
					<td><?php echo $key['judul'] ?></td>
					<td><?php echo $key['kota'] ?></td>
					<td><?php echo $key['tahun'] ?></td>
					<td><?php echo $key['stokbk'] ?></td>
					<td><?php echo $key['hargabk'] ?></td>
					<td><a href="<?php echo base_url() ?>crud/editbuku/<?php echo $key['isbn'] ?>"><button class='btn btn-primary btn-sm' type='button'><i class='fa fa-pencil'></i> Ubah</button></a></td>
					<td><a href="<?php echo base_url() ?>crud/hapusbuku/<?php echo $key['isbn'] ?>"><button class='btn btn-danger btn-md' type='button'><i class='fa fa-trash-o'></i></button></a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
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