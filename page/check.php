<?php
require "../connnect.php";
session_start();
$email=$_POST['email'];
$pass=md5($_POST['pass']);
//echo var_dump($email);
//echo var_dump($pass);

$sql=$connect->prepare("SELECT * FROM userall WHERE email=? AND password=? ");

$sql->execute(array($email,$pass));

if ($sql->rowCount()==1){
	foreach ($sql as $row) {
	if ($row['role']=='admin'){
		$sql2=$connect->prepare("SELECT * FROM admin WHERE email=? AND password=? ");
		$sql2->execute(array($email,$pass));
		if ($sql2->rowCount()==1){
foreach ($sql2 as $row) {
	
	if ($row['dep']=="yes"){
		$_SESSION['user']=$row['name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['pass']=$row['password'];
	$_SESSION['id']=$row['id'];
       header("location:admindep/index.php");
	}
	else{
		$_SESSION['user']=$row['name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['pass']=$row['password'];
	$_SESSION['id']=$row['id'];
		header("location:admin/index.php");
	}
	
}
		}
		else{
			echo "error2";
		}
	}
	else if ($row['role']=='voluntray'){
		$sql2=$connect->prepare("SELECT * FROM voluntarycomp WHERE email=? AND password=? ");
		$sql2->execute(array($email,$pass));
		if ($sql2->rowCount()==1){

foreach ($sql2 as $row) {
	if ($row['Lastlogin']=='0000-00-00') {
	$_SESSION['user']=$row['name_voluntray'];
	$_SESSION['email']=$row['email'];
	$_SESSION['pass']=$row['password'];
	//$_SESSION['phone']=$row['phone'];
	$_SESSION['id']=$row['id'];
	header("location:voluntarycom/first.php");
	}
	else{
	$_SESSION['user']=$row['name_voluntray'];
	$_SESSION['email']=$row['email'];
	$_SESSION['pass']=$row['password'];
	$_SESSION['id']=$row['id'];
	$_SESSION['img']=$row['imagepath'];
	header("location:voluntarycom/index.php");
	}
	
}
		}
		else{
			echo "error2";
		}
	}
	else if ($row['role']=='user'){

             if ($row['volcom']==""){
             	$sql2s=$connect->prepare("SELECT * FROM   user    WHERE email=? AND password=? ");
		$sql2s->execute(array($email,$pass));
         foreach ($sql2s as $row) {
	$_SESSION['emailu']=$row['email'];
	$_SESSION['idadmin']=$row['id_admin'];


	//$_SESSION['user']=$row['name_voluntray'];
	//$_SESSION['name']=$row['name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['pass']=$row['password'];
	$_SESSION['id']=$row['id'];
	//$_SESSION['img']=$row['imagepath'];
	if($row['dep']=="yes"){
		$_SESSION['idadmin']=$row['id_admin'];
		header("location:userdep/index.php");
	}
	else{
		$_SESSION['idvo']=$row['id_voluntary'];
		header("location:user/index.php");
	}
	
	
	
}

             }


else{
$sql2=$connect->prepare("SELECT * FROM  voluntarycomp INNER JOIN user  ON user.id_voluntary=voluntarycomp.id  WHERE user.email=? AND user.password=? ");
		$sql2->execute(array($email,$pass));
		if ($sql2->rowCount()==1){
//$_SESSION['emailu']=$email;
foreach ($sql2 as $row) {
	$_SESSION['emailu']=$row['email'];
	

	$_SESSION['user']=$row['name_voluntray'];
	//$_SESSION['name']=$row['name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['pass']=$row['password'];
	$_SESSION['id']=$row['id'];
	$_SESSION['img']=$row['imagepath'];
	if($row['dep']=="yes"){
		$_SESSION['idadmin']=$row['id_admin'];
		header("location:userdep/index.php");
	}
	else{
		$_SESSION['idvo']=$row['id_voluntary'];
		header("location:user/index.php");
	}
	
	
	
}

}
		
		}
	}
else if ($row['role']=="it"){
	$sql2=$connect->prepare("SELECT * FROM it WHERE email=? AND password=? ");
		$sql2->execute(array($email,$pass));
		if ($sql2->rowCount()==1){

foreach ($sql2 as $row) {
	
	$_SESSION['user']=$row['name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['pass']=$row['password'];
	$_SESSION['id']=$row['id'];
	header("location:it/index.php");
	
}

}
}
}
}
else{
	//echo var_dump($email);
//echo var_dump($pass);
//echo "user name or pass not true";
	header("location:index.php?msg=error_log");
}









 ?>