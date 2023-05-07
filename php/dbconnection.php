<?php
$servername="localhost";
$connusername="kanivan";
$connpassword="1234";
$dbname = "mobikart";

$connection = mysqli_connect($servername, $connusername, $connpassword, $dbname);
if (!$connection) {
	die("Oops! server connection failed".mysqli_connect_error());
}

?>