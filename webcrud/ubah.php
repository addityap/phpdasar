<?php
require 'functions.php';

$id = $_GET["id"];

$querys = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])){

	if(ubah($_POST) > 0){
		echo "
		<script>
		alert('Data Berhasil diubah!');
		document.location.href = 'index.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('Data Gagal diubah!');
		document.location.href ='index.php';
		</script>
		";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>FORM UNTUK UPDATE DATA</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="padding-top:70px">
		<form action="" method="post">
			<h1>Informasi Data <?= $querys["nama"]; ?></h1>
			<input type="hidden" name="id" value="<?=$querys["id"];?>">
			<label for="name" style="display: block;">Nama</label>
			<input type="text" name="name" id="name" class="form-control" style="width: 450px" value="<?=$querys["nama"];?>">
			<label for="nim" style="display: block;">NIM</label>
			<input type="text" name="nim" id="nim" class="form-control" style="width: 450px" value="<?=$querys["nim"];?>">
			<label for="email"style="display: block;">Email</label>
			<input type="text" name="email" id="email" class="form-control" style="width: 450px" value="<?=$querys["email"];?>">
			<label for="jurusan"style="display: block;">Jurusan</label>
			<input type="text" name="jurusan" id="jurusan" class="form-control" style="width: 450px;" value="<?=$querys["jurusan"];?>"><br>
			<button class="btn btn-primary" style="width: 225px;" type="submit" name="submit" >Simpan</button>
			<button class="btn btn-danger" style="width: 225px ;" type="reset">Clear</button>
		</form>
	</div>
</body>
</html>