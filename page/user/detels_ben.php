<?php
require "../../connnect.php";
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['pass'])==true){
  $sql=$connect->prepare("SELECT * FROM userall WHERE email=? AND password=?");
  $sql->execute(array($_SESSION['email'],$_SESSION['pass']));
  if ($sql->rowCount()==1){
         $sql2=$connect->prepare("SELECT * FROM user WHERE email=? AND password=?");
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
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
   <?php require 'header.php';?>
</head>
<body>
<?php require "header_pa.php";?>
<div class="container">
  <?php 



  ?>
</div>
</body>
</html>