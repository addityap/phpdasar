<?php
require 'functions.php';
if (isset($_POST["submit"])){

	if(tambah($_POST) > 0){
		echo "
		<script>
		alert('Data Berhasil ditambahkan!');
		document.location.href = 'index.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('Data Gagal ditambahkan!');
		document.location.href ='index.php';
		</script>
		";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>FORM UNTUK TAMBAH DATA</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="padding-top:70px">
		<form action="" method="post" enctype="multipart/form-data">
			<h1>Form Pendaftaran</h1>
			<label for="name" style="display: block;">Nama</label>
			<input type="text" name="name" id="name" class="form-control" style="width: 450px">
			<label for="nim" style="display: block;">NIM</label>
			<input type="text" name="nim" id="nim" class="form-control" style="width: 450px">
			<label for="email"style="display: block;">Email</label>
			<input type="text" name="email" id="email" class="form-control" style="width: 450px">
			<label for="jurusan"style="display: block;">Jurusan</label>
			<input type="text" name="jurusan" id="jurusan" class="form-control" style="width: 450px;">
			<br>
			<label for="gambar">Gambar :</label>
			<input type="file" name="gambar" id="gambar">

			<br>
			<button class="btn btn-primary" style="width: 225px" type="submit" name="submit" >Tambah Data</button>
			<button class="btn btn-danger" style="width: 225px" type="reset">Clear</button>
		</form>

	</div>
</body>
</html>