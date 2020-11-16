<?php
require 'function.php';

$id = $_GET["ids"];
$result = $con->query("SELECT * FROM `tblkeluarga` WHERE ids =$id");

if (isset($_POST['ubah'])){
	try{
		$con;
		$nama = $_POST['nama'];
		$status = $_POST['status'];
		$sql = "UPDATE tblkeluarga SET nama ='$nama',statusk = '$status' WHERE ids =$id";

		$stmt = $con->prepare($sql);
		$stmt->execute();

		echo "
		<script>
		alert('data berhasil diperbarui');
		document.location.href = 'index.php';
		</script>
		";
	}catch (PDOException $e){
		echo "
		<script>
		alert('data gagal diperbarui' $e);
		document.location.href = 'index.php';
		</script>
		";
	}
	$con = null;
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<title></title>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h2 class="text-center">UPDATE DATA</h2>
<form action="" method="POST">
	<?php foreach ($result as $dt): ?>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" id="nama" class="form-control" value="<?= $dt['nama']?>">
		</div>
		<div class="form-group">
			<label>Status</label>
			<input type="text" name="status" id="status" class="form-control" value="<?= $dt['statusk']?>">
		</div>
		<?php endforeach; ?>
			<a href="index.php" class="btn btn-dark" role="button">Back</a>
			<button type="submit" name="ubah" class="btn btn-primary">Save</button>
</form>
<br>
<p> STATUS </p>
						<hr>
						<p>1. Orangtua</p>
						<p>2. Saudara Kandung</p>
						<p>3. Paman / Om</p>
						<p>4. Bibi / Tante</p>
						<p>5. Bude </p>
						<p>6. Pakde </p>
						<p>7. Eyang Putri </p>
						<p>8. Eyang Kakung </p>
						<p>9. Saudara Sepupu </p>
</div>
</div>
</body>
</html>
