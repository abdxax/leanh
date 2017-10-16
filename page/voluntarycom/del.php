<?php 
require "../../connnect.php";
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['pass'])==true){
	$sql=$connect->prepare("SELECT * FROM userall WHERE email=? AND password=?");
	$sql->execute(array($_SESSION['email'],$_SESSION['pass']));
	if ($sql->rowCount()==1){
         $sql2=$connect->prepare("SELECT * FROM voluntarycomp WHERE email=? AND password=?");
         $sql2->execute(array($_SESSION['email'],$_SESSION['pass']));
         if ($sql2->rowCount()==1){

         }
         else{
         	header("location:../index.php");
         }
	}
	else{
		header("location:../index.php");
	}

}
else{
	header("location:../index.php");
}

$id_vol=$_SESSION['id'];
$user=$_SESSION['user'];

if (isset($_GET['id'])){
	$res=$connect->prepare("DELETE FROM user WHERE email=?");
if($res->execute(array($_GET['id']))){
	$res=$connect->prepare("DELETE FROM userAll WHERE email=?");
	if($res->execute(array($_GET['id']))){
		header("location:displayemp.php?msg='<div class='alert alert-success'><i class='glyphicon glyphicon-glyphicon glyphicon-ok-circle'></i> تم حذف الحساب بنجاح </div>");
	}
}
}


?>