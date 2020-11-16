<?php
require 'function.php';
$results = $con->query("SELECT * FROM `tblkeluarga` LEFT JOIN `status_keluarga` ON `tblkeluarga`.`statusk`= `status_keluarga`.`id`");

//input code

if (isset($_POST['submit'])){
	try{
		$con;
		$nama = $_POST['nama'];
		$status = $_POST['status'];
		$sql = "INSERT INTO tblkeluarga VALUES ('','$nama','$status')";

		$con->exec($sql);
		echo "
		<script>
		alert('data berhasil ditambah');
		document.location.href = 'index.php';
		</script>
		";
	}catch (PDOException $e){
		echo "
		<script>
		alert('data gagal ditambahkan' $e);
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
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
						</div>
						<div class="form-group">
							<label>Status</label>
							<input type="text" name="status" id="status" class="form-control" placeholder="Angka(1-9)">
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-secondary">Clear</button>
							<button type="submit" name="submit" class="btn btn-primary">Save</button>
						</div>

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
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
			Tambahkan Data!
		</button>
		<br>
		<hr>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php $i=1; ?>
			<?php foreach ($results as $d): ?>
				<tr>
					<td><?= $i; ?></td>
						<td><?= $d["nama"]; ?></td>
					<td><?= $d["status"];?></td>
					<td>
						<a href="ubah.php?ids=<?=$d["ids"];?>" name="ubah" id="ubah" class="btn btn-primary" role="button">Ubah</a>
						<a href="hapus.php?ids=<?=$d["ids"];?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger" role="button">Hapus</button>
						</td>
					</tr>
					<?php $i++?>
				<?php endforeach; ?>
			</div>
		</table>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	</body>
	</html>