<?php
$server="localhost";
$uname="root1234";
$password="root1234";
$dbname="id6425085_contact";

$contact=mysqli_connect($server,$uname,$password,$dbname) or die ("Database connection failed: " . mysql_error());

mysqli_select_db($contact,$dbname) or die(mysql_error());


$sql="CREATE TABLE contact(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
reg_date TIMESTAMP,
Name VARCHAR(30) NOT NULL,
Email VARCHAR(50) NOT NULL,
Phone INT(50) NOT NULL,
Message VARCHAR(200) NOT NULL
)";


if(mysqli_query($contact,$sql) === TRUE){echo "TABLE CREATED";}
else { echo "TABLE NOT CREATED";}

mysqli_close($contact);
?>