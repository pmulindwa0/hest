<?php
	include_once('csv.php');
	$csv = new csv(); 

	if (isset($_POST['sub'])) {
		$csv->import($_FILES['file']['tmp_name']);
	}
	if (isset($_POST['exp'])) {
		$csv->export();
	}
	if (isset($_POST['del'])) {
		$csv->delete($_POST['id']);
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CSV Files</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="sub" value="Import">
	</form>
	<br>
	<form action="" method="post">
		<input type="submit" name="exp" value="Export">
	</form>
	<br>
	<form action="" method="post">
		<input type="number" name="id">
		<input type="submit" name="del" value="Delete">
	</form>
</body>
</html>