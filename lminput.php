//Input Page  - lminput.php
<! doctype html>
<html>
<head>
<title>Lawnmower Input</title>
</head>
<body>


<?php
	include 'header.php';
?>


<div id="lawnmowerInputBlock">
	
	<form method="POST" action="lmconfirm.php" enctype="multipart/form-data">
	<table id="lmInputTable" border="1">
		<tr>
			<td>Make</td>
			<td><input type="text" name="make" size="25" require></td>
		</tr>
		<tr>
			<td>Model</td>
			<td><input type="text" name="model" size="25" require></td>
		</tr>
		<tr>
			<td>Picture</td>
			<td><input type="file" name="lmpic" 
		accepts=".jpg,.png,jpeg,.gif" require></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit"></td>
		</tr>

	</table>
	</form>
<div>


<?php
	include 'footer.php';
?>

</body>
</html>
