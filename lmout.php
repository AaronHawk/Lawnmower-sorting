<?php //dogout.php; ?>
<!doctype html>
<html>
<head>
<title>Our Lawnmowers</title>
<link rel="stylesheet" type="text/css" href="lmstyle.css">
<?php
include 'dbconnect.php';	



try
{
if(!(empty($_POST['makeSelect'])))
{
	$_SESSION['make'] = $_POST['makeSelect'];
}
else
{
	$_SESSION['make'] = "*";
}

if($_SESSION['make'] == "*")
{
	$sql = "SELECT * FROM table1";
}
else
{
	$sql = "SELECT * FROM table1 ".
		"WHERE make like '". 
		$_SESSION['make']."'";
}



	$rs = $pdo->query($sql);

}catch(PDOException $e)
{
echo('<script>console.log('.$e->getMessage().')</script>');
}


	//get data for the filter
try{



$sql_filter = "SELECT DISTINCT make FROM table1 ORDER BY make";
		$rs_filter= $pdo->query($sql_filter);
		
		
echo('<script>console.log("Successful filter recordset")</script>');

}catch(Exception $e)
{

	echo('<script>console.log('.$e.getMessage().')</script>');


}

	//get the lawnmower data
	

?>

</head>

<body>
<?php include 'header.php'; ?>

<div id="lmout">

	<!- ---------------Filter Button ------------------ -->
	<form Method="POST" action="lmout.php">
		<select id="makeSelect" name="makeSelect" >
		<option value="*">----</option>
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
	</form


	<!-- --------------------------------------- -->


</div>

<div>
<?php
	while(($row = $rs->fetch()) != null)
	{
		echo('<div class="alm">');

//data url  - src=data:image/jpeg;base64,myp.jpg
echo('
	<img src="data:'.$row['image_type'].
	';base64,'.$row['lmimage'].'"><br><br>');			


		echo('</div>');

}

?>

</div>

<?php include 'footer.php'; ?>
</body>
</html>
