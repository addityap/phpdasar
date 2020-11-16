<?php
require 'function.php';
$id = $_GET["ids"];
try{
	$con;
	$sql = "DELETE FROM tblkeluarga WHERE ids =$id";
	$con->exec($sql);
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'index.php';
		</script>
		";
}catch(PDOException $e){
	echo "
		<script>
			alert('data gagal dihapus' $e);
			document.location.href = 'index.php';
		</script>
		";
}
$con = null;
?>