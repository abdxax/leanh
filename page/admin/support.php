<?php
require '../../connnect.php';
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



if (isset($_POST['save'])) {
	$idvo=$_SESSION['id'];
	$des=strip_tags($_POST['des']);
	$id_user=$_SESSION['id'];
	$sql=$connect->prepare("INSERT INTO support (id_voluntray,des,status,id_user,role) VALUES (?,?,?,?,?)");
	if ($sql->execute(array($idvo,$des,"Not Solve",$id_user,"admin"))){
		echo "done";
	}
	else{
		echo "string";
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
	<?php require 'header_pa.php'; ?>

	<div class="col-sm-8">
		<form class="form-horizontal" method="POST">
			<div class="form-group">
				<label class="col-md-2 control-label">وصف المشكلة </label>
					<div class="col-md-6">
					  <textarea name="des" class="form-control" rows="7"></textarea>
					</div>
					
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"></label>
					<div class="col-md-6">
					 <input type="submit" name="save" class="btn btn-info btn-block">
					</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>