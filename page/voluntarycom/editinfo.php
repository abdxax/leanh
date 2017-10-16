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




$name="";
$de="";
$web="";
$ph="";
$em="";
$bn="";
$ba="";
$bi="";
$bno="";
$sql=$connect->prepare("SELECT * FROM voluntarycomp WHERE name_voluntray=?");
$sql->execute(array($_SESSION['user']));
foreach ($sql as $ro) {
	$name=$ro['manage_name'];
	$de=$ro['descri'];
	$web=$ro['website'];
	$ph=$ro['phone'];
	$em=$ro['email'];
}


$sql2=$connect->prepare("SELECT * FROM pay_way WHERE id_voluntray=?");
$sql2->execute(array($_SESSION['id']));
foreach ($sql2 as $ro) {
	$bn=$ro['bankNmae'];
	$ba=$ro['AccountNumber'];
	$bi=$ro['IBAN'];
	$bno=$ro['descr'];
	
}


if (isset($_POST['save'])) {
	$user=$_SESSION['user'];
	
$magename=$_POST['magename'];
$de=$_POST['dev'];
$link=$_POST['link'];
$do=date("Y-m-d H:i:s");
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_SESSION['user'];

$bankName=$_POST['bankn'];
$account=$_POST['account'];
$iba=$_POST['iban'];
$note=$_POST['bnote'];

	$res=$connect->prepare("UPDATE voluntarycomp SET manage_name=?,descri=?,
website=?,Lastlogin=?,phone=?,email=? WHERE name_voluntray=?");
	if ($res->execute(array($magename,$de,$link,$do,$phone,$email,$user))){
		//$_SESSION['img']=$img;
		$res2=$connect->prepare("UPDATE pay_way SET bankNmae=?,AccountNumber=?,IBAN=?,descr=? WHERE id_voluntray=?");
	if ($res2->execute(array($bankName,$account,$iba,$note,$_SESSION['id']))){
		//$_SESSION['img']=$img;
		header("location:index.php");
	}
	else{
		echo "bankdeya";
	}
}
	else{
	echo "error6";
}



if (isset($_FILES['imagelog'])){
	//print_r($_FILES['imagelog']); //use if about type and size 
	$name=$_FILES['imagelog']['name'];
	$type=$_FILES['imagelog']['type'];
	$tem=$_FILES['imagelog']['tmp_name'];
	$size=$_FILES['imagelog']['size'];
	

	 if ($size<=256000){
	if(move_uploaded_file($tem, "../images/".$user."".$name)){
	$img="../images/".$user."".$name;

	$res=$connect->prepare("UPDATE voluntarycomp SET imagepath=? WHERE name_voluntray=?");
	if ($res->execute(array($img,$user))){
		$_SESSION['img']=$img;
		header("location:index.php");
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
	echo "size problem";
}
}
else{

	/*$user=$_SESSION['user'];
	$magename=$_POST['magename'];
 echo $magename;
	$res=$connect->prepare("UPDATE voluntarycomp SET manage_name=?,descri=?,
website=?,Lastlogin=?,imagepath=? WHERE name_voluntray=?");
	if ($res->execute(array($magename,$de,$link,$do,$_SESSION['img'],$user))){
		$_SESSION['img']=$img;
		header("location:index.php");
	}
	else{
	echo "error634";
}
*/
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
 	<?php require 'header_pa.php'; ?>
 	<img src=<?php echo $_SESSION['img']; ?> class="img-responsive center-block  img-circle" style="width: 18%;height: 18%;margin-top: 10px;">
 	<div class="col-sm-7 col-sm-offset-2">
 		<form class="form-horizontal" method="POST" enctype="multipart/form-data">
 			<div class="form-group">
		<label class="col-md-3 control-label">اسم المدير</label>
		<div class="col-md-7">
			<input type="text" name="magename" class="form-control" value=<?php echo $name; ?>>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label">الوصف</label>
		<div class="col-md-7">
			<textarea name="dev" class="form-control" rows="9" ><?php echo $de; ?></textarea>
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
			<input type="text" name="link"  class="form-control" value=<?php echo $web; ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">الهاتف  </label>
		<div class="col-md-7">
			<input type="number" name="phone"  class="form-control" value=<?php echo $ph; ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">البريد الالكترواني   </label>
		<div class="col-md-7">
			<input type="email" name="email"  class="form-control" value=<?php echo $em; ?>>
		</div>
	</div>


<div class="form-group">
		<label class="col-md-3 control-label">اسم البنك </label>
		<div class="col-md-7">
			<input type="text" name="bankn"  class="form-control" value=<?php echo $bn; ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">رقم الحساب  </label>
		<div class="col-md-7">
			<input type="number" name="account"  class="form-control" value=<?php echo $ba; ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">رقم الايبان </label>
		<div class="col-md-7">
			<input type="text" name="iban"  class="form-control" value=<?php echo $bi; ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">ملاحظات </label>
		<div class="col-md-7">
			<input type="text" name="bnote"  class="form-control" value=<?php echo $bno; ?>>
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