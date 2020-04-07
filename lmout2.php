<?php //dogout.php; ?>
<!doctype html>
<html>
<head>
<title>Our Lawnmowers</title>

<?php
include 'dbconnect.php';	

try{
$sql_filter = "SELECT DISTINCT make FROM table1 ORDER BY make";
		$rs_filter = $pdo->query($sql_filter);
		echo('<script>console.log("Successful filter recordset"); </script>');
}catch(Exception $e)
{
	echo('<script> console.log($e.getMessage()); </script>');
}

//get the dog data

?>

</head>
<body>
<?php include 'header.php'; ?>

<div id ="lmout">

	
	<!-- ---------------Filter Button ------------------ -->
	<form Method="POST" action="lmout.php"> 
	<select id="makeSelect" name="makeSelect">
	<option value="*"> ----- </option> 
	<?php
	while(($rowmake = $rs_filter->fetch())!= null)
	{
		echo('<option value="'.$rowmake['make'].'">');
		echo($rowmake['make']);
		echo('</option>');
	}
	?>
	</select>
	<input type="submit" value="Filter">
	</form>

	<!-- --------------------------------------- -->

</div>


<?php include 'footer.php'; ?>
</body>
</html>
