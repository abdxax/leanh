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

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require'header.php';?>
</head>
<body>
 <div class="container">
 <?php require 'header_pa.php';?>
 	<div class="col-sm-10 col-sm-offset-1">
 		<table class="table">
 			<thead>
 				<th></th>
 				<th>الاسم </th>
 				<th>البريد الالكترواني</th>
 				<th>رقم الجوال </th>
 				<th>حذف</th>
 				

 			</thead>
 			<tbody>
 				<?php 
                   $sql=$connect->prepare("SELECT * FROM user where id_admin=? ");
                   $sql->execute(array($_SESSION['id']));

                   foreach($sql as $rows){
                   // $id=$rows['id'];
                      
                   	echo '
                    <tr>
                    <td></td>
                       <td>'.$rows['name'].'</td>
                       <td>'.$rows['email'].'</td>
                       <td>'.$rows['phone'].'</td>
                       <td><a href=del.php?id='.$rows['email'].' class="btn btn-danger">حذف </a></td>
                      


                    </tr>
                   	';
                   }

 				?>
 			</tbody>
 		</table>
 	</div>
 </div>
</body>
</html>