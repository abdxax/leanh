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
	<div class="col-sm-6 col-sm-offset-5" style="margin-top: 10px">
	
<a href="initiative.php"  class="btn btn-info "><i class="glyphicon glyphicon-plus"></i> تقديم خدمة </a>
</div>

<table class="table">
	<thead>
		<tr>
			<th></th>
			<th>الاسم</th>
			<th>رقم الجوال</th>
			<th>نوع المبادرة </th>
			
			<th>الوصف  </th>
			<th>شرح تفاصيل المبادرة </th>
		</tr>
	</thead>
	<tbody>
		<?php
		$n=1;
         $sql=$connect->prepare("SELECT * FROM initiative WHERE type=?");
         $sql->execute(array("Paresnal"));
         foreach ($sql as $row) {
         	 echo '
                <tr>
                  <td>'.$n.'</td>
                   <td>'.$row['name'].'</td>
                   <td>'.$row['phone'].'</td>
                   <td>'.$row['servestype'].'</td>
                   <td>'.$row['des'].'</td>
                   <td><a href=../'.$row['filepath'].'>تفاصيل المبادرة </a></td>
                </tr>



         	';
         	$n++;
         }


		 ?>
	</tbody>
</table>
</div>

</body>
</html>