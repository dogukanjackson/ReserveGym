<?php
$connection = mysqli_connect("127.0.0.1","root","","sport"); 
//$baglanti = mysqli_connect("localhost","root","","sport"); 

if($connection)
{



$sql1 = "CREATE TABLE IF NOT EXISTS gym(id INT AUTO_INCREMENT PRIMARY KEY,name varchar(50),address varchar(200), capacity INT, availabledays Date);";
$sorgu1 = mysqli_query($connection, $sql1);



$sql2 = "CREATE TABLE IF NOT EXISTS  user(id INT AUTO_INCREMENT PRIMARY KEY,username varchar(20), password varchar(20), role varchar(20), fullname varchar(100), phonenumber varchar(20),height INT, weight INT, age INT);";
$sorgu1 = mysqli_query($connection, $sql2);

$sql3 = "CREATE TABLE IF NOT EXISTS  days(id INT AUTO_INCREMENT PRIMARY KEY,gymid INT,days varchar(20), hours varchar(20));";
$sorgu1 = mysqli_query($connection, $sql3);

$sql3 = "CREATE TABLE IF NOT EXISTS  exercises(id INT AUTO_INCREMENT PRIMARY KEY,userid INT,days varchar(20), hours datetime,gymid INT);";
$sorgu1 = mysqli_query($connection, $sql3);

}


?>
