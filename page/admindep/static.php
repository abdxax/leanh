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
 			<tr>
 				<th></th>
 				<th>الاسم</th>
 				<th>المبلغ</th>
 				
 				
 			</tr>
 		<!--	<tr>
 			<th></th>
 				<th>المجموع</th>


 			</tr>
 				-->

 			</thead>
 			<tbody>
 				<?php 
 				$n=1;
 				$id="";
 				$order="";
 				$total="";
                   $sql=$connect->prepare("SELECT * FROM requirestorder where Type=? AND status=? ORDER BY id DESC");
                   if ($sql->execute(array("pk","Done"))){
                   	foreach ($sql as $row) {
                   		$total+=$row['goal'];
                   		echo '
                              <tr>
                              <td>'.$n.'</td>
                              <td>'.$row['name_po'].'</td>
                              <td>'.$row['goal'].'</td>
                              
                              </tr>

                   		';
                   		$n++;
                   		
                   } 
}


 				?>
 			</tbody>
 		</table>
 		<dir class="h3 text-center">
 			<?php echo "مجموع المبالغ المسدده ".$total; ?>
 		</dir>
 	</div>
 </div>
</body>
</html>