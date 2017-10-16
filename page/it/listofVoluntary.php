<?php
require"../../connnect.php";
session_start();

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
 				<th>اسم الجمعية </th>
 				<th>مدير الجمعيه </th>
 				<th>الوصف</th>
 				<th>رقم الهاتف  </th>
 				<th>الحساب البنكي </th>

 			</thead>
 			<tbody>
 				<?php 
                   $sql=$connect->prepare("SELECT * FROM voluntarycomp ");
                   $sql->execute();

                   foreach($sql as $rows){
                    $id=$rows['id'];
                      $sql2=$connect->prepare("SELECT * FROM pay_way WHERE id_voluntray=? ");
                   $sql2->execute(array($id));
                   $banknum="";
                   foreach ($sql2 as $row) {
                     $banknum=$row['AccountNumber'];
                   }
                   	echo '
                    <tr>
                    <td></td>
                       <td>'.$rows['name_voluntray'].'</td>
                       <td>'.$rows['manage_name'].'</td>
                       <td>'.$rows['descri'].'</td>
                       <td>'.$rows['phone'].'</td>
                       <td>'.$banknum.'</td>


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