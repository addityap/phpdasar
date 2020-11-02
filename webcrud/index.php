<?php 
require 'functions.php';
$data = query("SELECT * FROM mahasiswa");

if (isset($_POST["cari"]) ) {
	$data = cari($_POST["keyword"]);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO FILE INDEX</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="padding-top: 70px">
		<h1 class="text-center" style="padding-bottom: 20px">DATA MAHASISWA</h1>
		<div style="padding-bottom: 20px; float: right;">
			<a href="tambah.php" role="button" class="btn btn-primary">Tambahkan Data Mahasiswa</a>
		</div>
		<div class="form-group mb-2">
			<form action="" method="post">
				<input type="text" name="keyword" size="40" autofocus placeholder="masukin keyword yang ingin dicari!" autocomplete="off">
				<button class="btn btn-info" name="cari">Cari!</button>
			</form>
		</div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>NO</th>
					<th>Gambar</th>
					<th>Nama</th>
					<th>NIM</th>
					<th>Email</th>
					<th>Jurusan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php $i=1; ?>
			<?php foreach ($data as $row): ?>
				<tr>
					<td><?= $i; ?></td>
					<td><img src="<?= $row["gambar"];?>"</td>
					<td><?= $row["nama"];?></td>
					<td><?= $row["nim"];?></td>
					<td><?= $row["email"];?></td>
					<td><?= $row["jurusan"];?></td>
					<td>
						<a href="ubah.php?id=<?=$row["id"];?>" class="btn btn-primary" role="button">Ubah</a>
						<a href="hapus.php?id=<?=$row["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger" role="button">Hapus</button>
						</td>
					</tr>
					<?php $i++ ?>
				<?php endforeach; ?>
			</table>
		</div>
	</body>
	</html>