<?php

$server = 'localhost:3306';
$dbUser = 'root';
$dbName = 'registration';

$con = mysqli_connect($server, $dbUser, 'password', $dbName);

if(!$con){
	die("Connection failed: " . mysqli_connect_error());
}


//$con = mysqli_connect('localhost', 'root', '','registration');

//$server = 'localhost';
//$dbUser = 'root';
//$dbName = 'registration';

//$con = mysqli_connect($server, $dbUser, '', $dbName);

//$name = $_POST['user'];
//$email = $_POST['email'];
//$phone = $_POST['number'];
//$password = $_POST['password'];


//$sql ="INSERT INTO `details` (`Name`, `Email`, `Phone`, `Password`) VALUES ( '$name', '$email', '$phone', '$password')";

//$rs = mysqli_query($con, $sql);