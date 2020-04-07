<?php
require 'dbconnect.php';

//file information
$theFileName = $_FILES['lmpic']['tmp_name'];
$size = filesize($theFileName);
$imagetype = mime_content_type($theFileName);

//get the actual file
$image = base64_encode(file_get_contents($_FILES['lmpic']['tmp_name']));

//sql statement
$sql = "INSERT INTO table1(make, model, lmimage, image_type, image_size)" .
	  "VALUES (:make, :model, :lmimage, :image_type, :image_size)";

//prepare
$sql = $pdo->prepare($sql);

//sanitize
$make =	filter_var($_POST['make'], FILTER_SANITIZE_STRING);
$model = filter_var($_POST['model'], FILTER_SANITIZE_STRING);

//bind
$sql->bindparam(":make", $make);
$sql->bindparam(":model", $model);
$sql->bindparam(":lmimage", $image, PDO::PARAM_LOB);
$sql->bindparam(":image_type", $imagetype);
$sql->bindparam(":image_size", $size);


//execute
try
{
	//return a boolean 
	$check = $sql->execute();

}catch(PDOException $e)
{
	console.log($e.getMessage());
}







if($check)
{
	echo("<br>*** File uploaded successfully ***<br>");
}
else
{
	echo("<br>*** File failed to load ***<br>");
}	


include 'footer.php';

?>