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
<?php require'header_pa.php';
if (isset($_GET['msg'])){
	echo $_GET['msg'];
}
?>

<div class="col-md-9 col-md-offset-1  ">
	<table class="table">
		<thead>
			<tr>
				<th>الاسم</th>
				<th>الجوال</th>
				<th>البريد الالكتواني</th>
				<th>حذف</th>
			</tr>
		</thead>
		<tbody>
			<?php

               $res=$connect->prepare("SELECT * FROM user WHERE id_voluntary=?");
               $res->execute(array($id_vol));

               $num=$res->rowCount();

               if ($num==0){
               	echo '<div class="h3 text-center">لا يوجد موظفين </div>';
               }
               else{
               	foreach ($res as $row) {
               		echo '
                         <tr>
                          <td>'.$row['name'].'</td>
                          <td>'.$row['phone'].'</td>
                          <td>'.$row['email'].'</td>
                          <td><a href="del.php?id='.$row['email'].'" class="btn btn-danger">حذف</a></td>
                         </tr>


               		';
               	}
               }
			 ?>
		</tbody>
	</table>
</div>


</body>
</html>