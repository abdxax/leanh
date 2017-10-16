<?php

require "../connnect.php";
session_start();
$imag="";
$name="";
$des="";
$mange="";
$phone="";
$email="";
$webs="";
$bankname="";
$bankaccount="";
$iban="";
$note="";
if (isset($_GET['id'])){
$sql=$connect->prepare("SELECT * FROM  voluntarycomp WHERE id=? ");
 $sql->execute(array($_GET['id']));

foreach ($sql as $ro) {
	$imag=$ro['imagepath'];
	$name=$ro['name_voluntray'];
	$des=$ro['descri'];
	$mange=$ro['manage_name'];
	$phone=$ro['phone'];
	$email=$ro['email'];
	$webs=$ro['website'];
}
$imag=explode("../", $imag);
$imj=$imag[1];

$sql2=$connect->prepare("SELECT * FROM  pay_way WHERE id=? ");
 $sql2->execute(array($_GET['id']));

foreach ($sql2 as $rs) {
	$bankname=$rs['bankNmae'];
	$bankaccount=$rs['AccountNumber'];
	$iban=$rs['IBAN'];
	$note=$rs['descr'];
}

 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<html>
<head>
	<title></title>
	<?php require'header.php';?>
</head>
<body>
<?php require 'header_p.php';?>



<div class="container">
	


	<div class="col-md-3 col-sm-3 col-sm-offset-4">
		<img src=<?php echo $imj;  ?> class="img-responsive img-rounded center-block">

	</div>

	<div class="col-md-8 col-sm-8 text-center col-sm-offset-1 ">
		<p class="h4"><?php echo $name; ?></p>
	</div>

<div class="col-md-8 col-sm-8 ">
	<dl>
		<dt>الوصف: </dt>
		<dd><?php echo $des ; ?></dd>
		<dt>التواصل: </dt>
		<dd>الهاتف : <?php echo $phone ; ?></dd>
		<dd> الايميل : <?php echo $email ; ?></dd>
		<dt>الحساب البنكي : </dt>
		<dd><?php echo $bankname ; ?></dd>
		<dd><?php echo $bankaccount ; ?></dd>
		<dd><?php echo $iban ; ?></dd>
		<dd><?php echo $note ; ?></dd>
	</dl>
</div>





	
</div>
<?php require "footer.php"; ?>
</body>
</body>
</html>