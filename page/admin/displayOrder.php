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
 				<th>الاسم </th>
 				<th>الحالة  </th>
 				<th>الوصف</th>
 				<th>رقم الجوال</th>
 				<th>رقم الحاله</th>
 				<th>اسم رافع الطلب</th>
 				<th>رقم جوال رافع الطلب</th>
        <th>الجهه</th>
        <th>السبب</th>

 				
 			</tr>
 			
 				

 			</thead>
 			<tbody>
 				 				<?php 
                   $sql=$connect->prepare("SELECT * FROM requirestorder ");
                   $sql->execute();
                   $rs="";
                   foreach($sql as $row){
                    if ($row['status']=='new') {
                      $rs="معلق";
                    }
                    else if($row['status']=='waiting'){
                       $rs="انتظار";
                    }
                    else if($row['status']=='accept'){
                       $rs="مقبول";
                    }
                    else if($row['status']=='not accept'){
                       $rs="مرفوض";
                    }
                    else if($row['status']=='Done'){
                       $rs="منجز";
                    }


                   	echo '
                    <tr>
                    <td></td>
                       <td>'.$row['name_po'].'</td>
                       <td>'.$rs.'</td>
                       <td>'.$row['phone_po'].'</td>
                       <td>'.$row['des'].'</td>
                       <td>'.$row['id'].'</td>
                       <td>'.$row['name_applay'].'</td>
                       <td>'.$row['phone_applay'].'</td>
                       <td>'.$row['name_voluntray'].'</td>
                        <td>'.$row['resoun'].'</td>


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