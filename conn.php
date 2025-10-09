<?php
$conn = new mysqli('localhost','root','','petshop');
$conn->query("SET NAMES utf8");
if($conn->connect_error){
    die("Connection Fail". $conn->$conn_error);
}
?>
