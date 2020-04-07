<!-- dbconnect.php -->
<?php
try
{
	$pdo = new PDO("mysql:hostname=localhost;dbname=lm_db;", 'root', '');
	// echo("Connected");
}
catch(PDOException $e)
{
	echo("Bad connection");
	die();
}


/*
CREATE DATABASE IF NOT EXISTS `lm_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
CREATE TABLE lm_db.table1
(
	make VARCHAR(20) NOT NULL,
	model VARCHAR(20) NOT NULL,
	price  DOUBLE(7, 2) NOT NULL,
	description TEXT NOT NULL,
	category VARCHAR(30) NOT NULL,
	lmimage   LONGBLOB NOT NULL, 
    image_type VARCHAR(20) NOT NULL, 
    image_size INT(9) NOT NULL, 
    table1_pk  INT(9) NOT NULL auto_increment, 
    PRIMARY KEY (`table1_pk`) 
  ) 
  engine = innodb;
 */
 http://127.0.0.1/phpmyadmin/tbl_sql.php?db=lm_db&table=table1
 ?>
