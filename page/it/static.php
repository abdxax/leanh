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
 			<tr>
 				<th></th>
 				<th>اسم الجمعية </th>
 				<th>عدد الحالات  </th>
 				<th>عدد الحالات المحلوله</th>
 				<th>عدد الحالات تحت الانتظار</th>
 				
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
                   $sql=$connect->prepare("SELECT * FROM voluntarycomp ");
                   if ($sql->execute()){
                   	foreach ($sql as $row) {
                   		$id=$row['id'];
                   		$sql2=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? ");
                   		$sql2->execute(array($id));
                   		$numorder=$sql2->rowCount();

                   		$sql3=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? AND status=? ");
                   		$sql3->execute(array($id,"Done"));
                   		$numordersolved=$sql3->rowCount();

                   		$sql4=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? AND status=? ");
                   		$sql4->execute(array($id,"waiting"));
                   		$numorderwaiting=$sql4->rowCount();

                   		$sql5=$connect->prepare("SELECT * FROM requirestorder ");
                   		$sql5->execute(array());
                   		$total=$sql5->rowCount();

                   		echo '
                              <tr>
                              <td>'.$n.'</td>
                              <td>'.$row['name_voluntray'].'</td>
                               <td>'.$numorder.'</td>
                                <td>'.$numordersolved.'</td>
                                 <td>'.$numorderwaiting.'</td>

                              </tr>

                   		';
                   		$n++;
                   		
                   } 
}


 				?>
 			</tbody>
 		</table>
 		<dir class="h3 text-center">
 			<?php echo "مجموع الحالات الكلي".$total; ?>
 		</dir>
 	</div>
 </div>
</body>
</html>