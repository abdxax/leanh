<?php 
require"../../connnect.php";
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['pass'])==true){
	$sql=$connect->prepare("SELECT * FROM userall WHERE email=? AND password=?");
	$sql->execute(array($_SESSION['email'],$_SESSION['pass']));
	if ($sql2->rowCount()==1){
         $sql2=$connect->prepare("SELECT * FROM admin WHERE email=? AND password=?");
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

if (isset($_GET['id'])){
	$sql=$connect->prepare("DELETE FROM user WHERE email=?");
	if ($sql->execute(array($_GET['id']))){
		$sql2=$connect->prepare("DELETE FROM userall WHERE email=?");
	if ($sql2->execute(array($_GET['id']))){
		header("location:listofVoluntary.php");
	}
	}
}


?>