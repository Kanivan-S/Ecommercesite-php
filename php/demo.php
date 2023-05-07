<?php
session_start();
include_once "dbconnection.php";
$login_email='qwe@gmail.com';
$sql_cart="SELECT product_name,ram FROM products";
$cartex_query=mysqli_query($connection,$sql_cart);
$cartres=mysqli_fetch_all($cartex_query,MYSQLI_ASSOC);
print_r(array_column($cartres,'product_name'));
// $er=unserialize($demos);
// print_r($er);
?>
