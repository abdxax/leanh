<?php
require '../../connnect.php';
 require '../../PHPMailer-master/PHPMailerAutoload.php';

session_start();


if (isset($_SESSION['email']) && isset($_SESSION['pass'])==true){
	$sql=$connect->prepare("SELECT * FROM userall WHERE email=? AND password=?");
	$sql->execute(array($_SESSION['email'],$_SESSION['pass']));
	if ($sql->rowCount()==1){
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



//echo$_SESSION['user'] ."eee";
$msg='';

if (isset($_POST['save'])){
	$name=strip_tags($_POST['volname']);
	$email=strip_tags($_POST['email']);
	$pass1=strip_tags($_POST['pass1']);
	$pass2=strip_tags($_POST['pass2']);
	$user=$_SESSION['user'];
	if ($pass1==$pass2){
		$res=$connect->prepare("INSERT INTO voluntarycomp (name_voluntray,email,password,createby)VALUES (?,?,?,?)");
		if ($res->execute(array($name,$email,$pass1,$user))){

$res=$connect->prepare("INSERT INTO userAll (email,password,role)VALUES (?,?,?)");
         if($res->execute(array($email,$pass1,"voluntray"))){

     ////////////// ////send email to subscribres//////////////////////////////////////////////
         	$mail=new PHPMailer();
         	$mail->IsSmtp();
         	$mail->SMTPDebug=1;
         	$mail->SMTPAuth=true;
         	$mail->SMTPSecure='ssl';
         	$mail->Host="smtp.gmail.com";
         	$mail->Port=465;
         	$mail->IsHTML(true);
         	$mail->Username="abdxax@gmail.com";
         	$mail->Password="1094906623";
         	$mail->SetFrom("abdxax@gmail.com");

         	$mail->Subject="مرحبا بكم";
         	$mail->Body='<p class="text-center h3">مرحبا بكم في موقع لينا الخيري للاكمال البيانات و تفعيل العضويه سجل دخول </p>';
         	$mail->AddAddress($email);

         	if (!$mail->Send()){
         		echo "Mail not send";
         	}

         	else{
         		echo "success send ";
         	}








         	//////////////////////////////////////////////////////////////////////////////////////////
                                   




                     $msg= '<div class="alert alert-success"><i class="glyphicon glyphicon-glyphicon glyphicon-ok-circle"></i> تم انشاء الحساب </div>';
                     header("location:index.php?msg=".$msg."");
                 }
                 else{
                 	$msg= '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove-circle"></i> الحساب مستخدم من قبل 1 </div>';
			 header("location:index.php?msg=".$msg."");
                 }
		}
		else{
			$msg= '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove-circle"></i> الحساب مستخدم من قبل 2 </div>';
			  header("location:index.php?msg=".$msg."");
		}
	}
	else{
		$msg= '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove-circle"></i>  مشكلة بالاتصال 3</div>';
		  header("location:index.php?msg=".$msg."");
	}

}//end the function button 

$res=$connect->prepare("SELECT * FROM admin WHERE name=?");
$res->execute(array($_SESSION['user']));
$emails='';
$phone='';
$dep="";
$name="";
foreach ($res as $row) {
	$emails=$row['email'];
	$phone=$row['phone'];
	$name=$row['name'];
	$dep=$row['department'];

}
$msg="";
$res=$connect->prepare("SELECT * FROM userAll WHERE email=?");
$res->execute(array($_SESSION['email']));
$id='';
foreach ($res as $row) {
	$id=$row['id'];
}


if (isset($_POST['saveedit'])){
	$email=strip_tags($_POST['emailedit']);
	$phone=strip_tags($_POST['phn']);
	$pass=strip_tags($_POST['password']);
	$pass2=strip_tags($_POST['password2']);

	if ($pass==""  && $pass2=="" ){
		$res=$connect->prepare("UPDATE admin SET email=? , phone=? WHERE name=? ");
		if ($res->execute( array($email,$phone,$_SESSION['user']))){
               $res=$connect->prepare("UPDATE userAll SET email=?  WHERE id=? ");
               if ($res->execute( array($email,$id))){
                      $msg='<div class="alert alert-success text-center"> تم التحديث </div>';
               }
               else{
               	 $msg='<div class="alert alert-danger text-center"> يوجد خطاء ,,, تواصل مع الدعم الفني  </div>';
               }
		}
		else{
			  $msg='<div class="alert alert-danger text-center"> يوجد خطاء ,,, تواصل مع الدعم الفني  </div>';
		}
	}
	
	else if ($pass==$pass2){
		$res=$connect->prepare("UPDATE admin SET email=? , phone=?,password=? WHERE name=? ");
		if ($res->execute( array($email,$phone,$pass,$_SESSION['user']))){
			$res=$connect->prepare("UPDATE userAll SET email=? ,password=? WHERE id=? ");
		if ($res->execute( array($email,$pass,$id))){
 $msg='<div class="alert alert-success text-center"> تم التحديث </div>';

		}
		else{
  $msg='<div class="alert alert-danger text-center"> يوجد خطاء ,,, تواصل مع الدعم الفني  </div>';
		}
//echo $email;
//echo $phone;
		}
		else{
			$msg='<div class="alert alert-danger text-center"> يوجد خطاء ,,, تواصل مع الدعم الفني  </div>';
		}
	}
	else{
		  $msg='<div class="alert alert-danger text-center"> كلمة المرور غير متطابقة </div>';
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
	<?php require 'header_pa.php';
         if (isset($_GET['msg'])){
         	echo $_GET['msg'];
         }
         echo $msg;
	?>
	<p class="text-center">last login is </p>
		<div class="col-md-6" style="margin-top: 25px">

			<div class="row">
				<div class="col-md-4">
				<a href="#" data-toggle="modal" data-target="#vol">
					<div class="panel panel-default">
						<div class="panel-heading text-center" >
							<i class="glyphicon glyphicon-ok " style="font-size:3.5em;"></i>
						</div>
						<div class="panel-body text-center">تفعيل حساب</div>
					</div>
					</a>
				</div>
			<!--	<div id="vol" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header ">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
							<p class="modal-title text-center">تفعيل حساب جمعية</p>

							 </div>

							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="col-md-2 control-label">اسم الجمعية</label>
										<div class="col-md-6">
											<input type="text" name="volname" class="form-control">
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer"></div>
						</div>
					</div>
				</div>-->

				<div id="vol" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">تفعيل حساب </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
									<div class="form-group">
										<label class="col-md-2 control-label">اسم الجمعية</label>
										<div class="col-md-6">
											<input type="text" name="volname" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">البريد الالكترواني</label>
										<div class="col-md-6">
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">الرقم السري</label>
										<div class="col-md-6">
											<input type="password" name="pass1" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">التاكد من الرقم السري </label>
										<div class="col-md-6">
											<input type="password" name="pass2" class="form-control">
										</div>
									</div>

								
      </div>
      <div class="modal-footer ">
       
        <input type="submit" name="save" class="btn btn-success " value="حفظ">
        <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>

</form>
      </div>
    </div>

  </div>
</div>


				<div class="col-md-4">
				<a href="listofVoluntary.php">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<i class="glyphicon glyphicon-th-list" style="font-size: 3.5em"></i>
						</div>
						<div class="panel-body" >عرض الجمعيات </div>
					</div>
					</a>
				</div>

				<div class="col-md-4">
				<a href="static.php">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<i class="glyphicon glyphicon-stats" style="font-size: 3.5em"></i>
						</div>
						<div class="panel-body">احصائيات </div>
					</div>
					</a>
				</div>

				<div class="col-md-4">
				<a href="displayOrder.php">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<i class="glyphicon glyphicon-leaf" style="font-size: 3.5em"></i>
						</div>
						<div class="panel-body">عرض طلبات المساعده</div>
					</div>
					</a>
				</div>

			<!--	<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="glyphicon glyphicon-ok"></i>
						</div>
						<div class="panel-body">عرض الجمعيات </div>
					</div>
				</div> -->

				<div class="col-md-4">
				<a href="#" data-toggle="modal" data-target="#edit">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<i class="glyphicon glyphicon-wrench" style="font-size: 3.5em;"></i>
						</div>
						<div class="panel-body">تعديل البيانات </div>
					</div>
					</a>
				</div>

				<div id="edit" class="modal fade" role="dialog">
					
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title text-center"> تعديل البيانات الشخصية </h3>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" method="POST">
									<div class="form-group">
										<label class="col-sm-2 control-label">البريد الالكتروتني</label>
										<div class="col-md-6">
											<input type="email" name="emailedit" class="form-control" value=<?php echo $emails; ?>>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">الجوال</label>
										<div class="col-md-6">
											<input type="number" name="phn" class="form-control" value=<?php echo $phone; ?>>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">كلمة المرور</label>
										<div class="col-md-6">
											<input type="password" name="password" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">التاكد من كلمة المرور</label>
										<div class="col-md-6">
											<input type="password" name="password2" class="form-control">
										</div>
									</div>
									</div>
									<div class="modal-footer">
										
										<input type="submit" name="saveedit" class="btn btn-success" value="حفظ">
										 <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
										</form>
									</div>
								
							
						</div>
					</div>
				</div>


			</div>
		</div>

		<div class="col-md-4"> 
		<p class="text-center">البيانات الشخصية</p>
         <table class="table">
         	<tr>
         		<th>الاسم</th>
         		<td><?php echo$name; ?></td>
         		</tr>
         		<tr>
         		<th>القسم</th>
         		<td><?php echo$dep; ?></td>
         		</tr>
         		<tr>
         		<th>الجوال</th>
         		<td><?php echo$phone; ?></td>
         		</tr>
         		<tr>
         		<th>الايميل</th>
         		<td><?php echo$emails; ?></td>
         	</tr>
         </table>
		</div>

		<!--<div class="col-md-8 col-md-offset-2">
			<table class="table">
				<thead>
					<tr>
						<th>رقم الحالة</th>
						<th>شرح الحاله</th>
						<th>الجمعية </th>
					</tr>
				</thead>
			</table>
		</div>-->
	</div>

</body>
</html>