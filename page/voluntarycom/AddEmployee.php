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
$msg="";
$num="";
if(isset($_POST['saveuser'])){
$res=$connect->prepare("SELECT * FROM userAll WHERE volcom=?");
$res->execute(array($user));

	$num=$res->rowCount();





if ($num<=4){
	$name=strip_tags($_POST['name']);
	$phone=strip_tags($_POST['phone']);
	$email=strip_tags($_POST['email']);
	$pass=strip_tags($_POST['pass']);
	$pass2=strip_tags($_POST['pass2']);

	if ($pass==$pass2){
		$res=$connect->prepare("INSERT INTO user (name,email,id_voluntary,password,phone)VALUES (?,?,?,?,?)");
		if ($res->execute(array($name,$email,$id_vol,$pass,$phone))){
			$res=$connect->prepare("INSERT INTO userAll (email,password,volcom,role)VALUES (?,?,?,?)");
			if($res->execute(array($email,$pass,$user,"user"))){
				$msg= '<div class="alert alert-success"><i class="glyphicon glyphicon-glyphicon glyphicon-ok-circle"></i> تم انشاء الحساب </div>';
			}
			else{

			}
		}
		else{
$msg= '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove-circle"></i> الحساب مستخدم من قبل  </div>';
		}
	}
	else{
$msg= '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove-circle"></i>  ارجاء التاكد من الباسبورد المدخل غير متطابق  </div>';
	}
}

else{
	$msg= '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove-circle"></i> تجاوزت عدد السحابات المسموحه </div>';
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
<?php require'header_pa.php';

echo $msg;
?>

<div class="col-md-7 ">
	<form class="form-horizontal" method="POST">
	<div class="form-group">
		<label class="col-md-3 control-label">الاسم</label>
		<div class="col-md-7">
			<input type="text" name="name" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label">رقم الجوال</label>
		<div class="col-md-7">
			<input type="text" name="phone"  class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">البريد الالكترواني</label>
		<div class="col-md-7">
			<input type="text" name="email"  class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">الرقم السري</label>
		<div class="col-md-7">
			<input type="password" name="pass"  class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">تاكيد الرقم السري</label>
		<div class="col-md-7">
			<input type="password" name="pass2"  class="form-control">
		</div>
	</div><div class="form-group">
		<label class="col-md-3 control-label"></label>
		<div class="col-md-7">
			<input type="submit" name="saveuser"  class="btn btn-success btn-block" value="انشاء">
		</div>
	</div>
		
	</form>
</div>


</body>
</html>