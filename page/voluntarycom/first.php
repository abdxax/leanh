<?php
require '../../connnect.php';
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




if (isset($_POST['save'])) {
	$user=$_SESSION['user'];
	
$magename=$_POST['magename'];
$de=$_POST['dev'];
$link=$_POST['link'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$do=date("Y-m-d H:i:s");

$bankName=$_POST['bankn'];
$account=$_POST['account'];
$iba=$_POST['iban'];
$note=$_POST['bnote'];
if (isset($_FILES['imagelog'])){
	//print_r($_FILES['imagelog']); use if about type and size 
	$name=$_FILES['imagelog']['name'];
	$type=$_FILES['imagelog']['type'];
	$tem=$_FILES['imagelog']['tmp_name'];
	$size=$_FILES['imagelog']['size'];
	if(move_uploaded_file($tem, "../images/".$user."".$name)){
	$img="../images/".$user."".$name;

	$res=$connect->prepare("UPDATE voluntarycomp SET manage_name=?,descri=?,
imagepath=?,website=?,Lastlogin=?,email=?,phone=? WHERE name_voluntray=?");
	if ($res->execute(array($magename,$de,$img,$link,$do,$email,$phone,$user))){
		$_SESSION['img']=$img;

		$sql=$connect->prepare("INSERT INTO pay_way (bankNmae,id_voluntray,AccountNumber,IBAN,descr) VALUES (?,?,?,?,?) ");
		if ($sql->execute(array($bankName,$_SESSION['id'],$account,$iba,$note))){
			header("location:index.php");
		}
		else{
			echo "error bankdel";
		}
		
	}
	else{
	echo "error3";
}
}
else{
	echo "error2";
}
}
else{
	echo "error1";
}
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<?php require 'header.php'; ?>
 </head>
 <body>
 
 <div class="container">
 	<div class="col-md-7">
 		<form class="form-horizontal" method="POST" enctype="multipart/form-data">
 			<div class="form-group">
		<label class="col-md-3 control-label">اسم المدير</label>
		<div class="col-md-7">
			<input type="text" name="magename" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label">الوصف</label>
		<div class="col-md-7">
			<textarea name="dev" class="form-control" rows="9"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">رفع الشعار </label>
		<div class="col-md-7">
			<input type="file" name="imagelog"  class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">الموقع الالكترواني  </label>
		<div class="col-md-7">
			<input type="text" name="link"  class="form-control">
		</div>
	</div>

<div class="form-group">
		<label class="col-md-3 control-label">الهاتف  </label>
		<div class="col-md-7">
			<input type="number" name="phone"  class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">البريد الالكترواني   </label>
		<div class="col-md-7">
			<input type="email" name="email"  class="form-control" >
		</div>
	</div>


<div class="form-group">
		<label class="col-md-3 control-label">اسم البنك </label>
		<div class="col-md-7">
			<input type="text" name="bankn"  class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">رقم الحساب  </label>
		<div class="col-md-7">
			<input type="number" name="account"  class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">رقم الايبان </label>
		<div class="col-md-7">
			<input type="text" name="iban"  class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">ملاحظات </label>
		<div class="col-md-7">
			<input type="text" name="bnote"  class="form-control" >
		</div>
	</div>





	<div class="form-group">
		<label class="col-md-3 control-label"></label>
		<div class="col-md-7">
			<input type="submit" name="save"  class="btn btn-success btn-block" value="حفظ">
		</div>
	</div>
 		</form>
 	</div>
 </div>
 </body>
 </html>