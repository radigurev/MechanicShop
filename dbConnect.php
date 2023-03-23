<?php


$con = mysqli_connect('localhost:3306', 'root', 'password', 'MechParts');

if(!$con){
	die("Connection failed: " . mysqli_connect_error());
}
?>