<?php 
require "../../connnect.php";
session_start();
$ids=$_SESSION['id'];
$dates=date("Y-m-d H:i:s");
if(session_destroy()){
$sql=$connect->prepare("UPDATE voluntarycomp set Lastlogin=? WHERE id=?");

$sql->execute(array($dates,$ids));

header("location:../index.php");
}




?>