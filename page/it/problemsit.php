<?php
require"../../connnect.php";
session_start();
if (isset($_GET['id'])){
  $sqlupdate=$connect->prepare("UPDATE support SET status=? WHERE id=?");
  if ($sqlupdate->execute(array("solved",$_GET['id']))){
    header("location:problemsit.php");
  }
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
 				<th>الجوال</th>
        <th>المشكله</th>
     <!--   <th>الجهه</th>-->

     <th>حل المكشله</th>

 				
 			</tr>
 			
 				

 			</thead>
 			<tbody style="height: ">
 				 				<?php 
                   $sql=$connect->prepare("SELECT * FROM support where status=?");
                   $sql->execute(array("Not Solve"));
                   $rs="";
                   $name="";
                   $phone="";
                   $des="";
                   $dep="";
                   foreach($sql as $row){
                    $des=$row['des'];
                    if ($row['role']=='admin') {
                      //$rs="admin";
                      $sql2=$connect->prepare("SELECT * FROM admin WHERE id=?");
                      $sql2->execute(array($row['id_user']));
                      foreach ($sql2 as $rows) {
                        $name=$rows['name'];
                        $phone=$rows['phone'];
                        $dep=$rows['department'];
                      }
                    }
                    else if($row['role']=='voluntray'){
                       //$rs="voluntray";
                      $sql2=$connect->prepare("SELECT * FROM voluntray WHERE id=?");
                      $sql2->execute(array($row['id_user']));
                      foreach ($sql2 as $rows) {
                        $name=$rows['manage_name'];
                        $phone=$rows['phone'];
                        $dep=$rows['name_voluntray'];
                      }
                    }
                    else if($row['role']=='user'){
                      // $rs="user";
                      $sql2=$connect->prepare("SELECT * FROM user WHERE id=?");
                      $sql2->execute(array($row['id_user']));
                      foreach ($sql2 as $rows) {
                        $name=$rows['name'];
                        $phone=$rows['phone'];
                        if ($rows['dep']=='yes'){
                          $sql2=$connect->prepare("SELECT * FROM admin WHERE id=?");
                      $sql2->execute(array($row['id_voluntray']));
                      foreach ($sql2 as $rowss) {
                        $dep=$rowss['department'];
                      }

                        }
                        else{
                          $sql2=$connect->prepare("SELECT * FROM voluntray WHERE id=?");
                      $sql2->execute(array($row['id_voluntray']));
                      foreach ($sql2 as $rowss) {
                        $dep=$rowss['name_voluntray'];
                      }
                        }
                      }
                    }
                    




                   	echo '
                    <tr>
                    <td></td>
                       <td>'.$name.'</td>
                       <td>'.$phone.'</td>
                       <td>'.$des.'</td>
                      
                       <td><a href=problemsit.php?id='.$row['id'].' class="btn btn-info" style="height: 30px">تم الحل </a></td>


                    </tr>
                   	';
                   }

 				?>
 			</tbody >
 		</table>
 	</div>
 </div>
</body>
</html>