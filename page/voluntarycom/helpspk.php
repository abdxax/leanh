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
 	<div class="col-sm-10  col-xs-10 col-sm-offset-1">
 		<table class="table">
 			<thead>
 			<tr>
 				<th></th>
 				<th>الاسم </th>
 				<th>الجوال </th>
 				<th>الوصف</th>
 				

 				
 			</tr>
 			
 				

 			</thead>
 			<tbody>
 				<?php
                $stu='';
               $res=$connect->prepare("SELECT * FROM family ");
               $res->execute(array($id_vol));

               $num=$res->rowCount();

               if ($num==0){
               	echo '<div class="h3 text-center">لا يوجد حالات</div>';
               }
               else{
                $n=1;
               	foreach ($res as $row) {
               		
               		echo '
                         <tr>
                         <td>'.$n.'</td>
                          <td>'.$row['name'].'</td>
                          <td>'.$row['phone'].'</td>
                          <td>'.$row['des'].'</td>
                          
                        
                         </tr>


               		';
                  $n++;
               	}
               }
			 ?>
 			</tbody>
 		</table>
 	</div>
 </div>
</body>
</html>