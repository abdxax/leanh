<?php
require '../../connnect.php';
 require '../../PHPMailer-master/PHPMailerAutoload.php';

session_start();
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
/////////////////////////////////////////////////////

if (isset($_POST['saveadm'])){
	$name=strip_tags($_POST['volname']);
	$email=strip_tags($_POST['email']);
	$pass1=strip_tags($_POST['pass1']);
	$pass2=strip_tags($_POST['pass2']);
	$phone=strip_tags($_POST['phone']);
	$dep=strip_tags($_POST['dep']);
	$type=$_POST['opt'];
	$de="";
	if ($type=="null"){
		header("location:index.php?msg=".$msg."");
	}
	else if ($type=="pk"){
		$de="yes";
	}
	else if ($type=="other"){
		$de="";
	}
	$user=$_SESSION['user'];
	if ($pass1==$pass2){
		$res=$connect->prepare("INSERT INTO admin (name,department,email,phone,password,dep)VALUES (?,?,?,?,?,?)");
		if ($res->execute(array($name,$dep,$email,$phone,$pass1,$de))){

$res=$connect->prepare("INSERT INTO userAll (email,password,role)VALUES (?,?,?)");
         if($res->execute(array($email,$pass1,"admin"))){

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









////////////////////////////////////////////////////////////
$res=$connect->prepare("SELECT * FROM it WHERE name=?");
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
		$res=$connect->prepare("UPDATE it SET email=? , phone=? WHERE name=? ");
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



   if (isset($_POST['saveword'])){
   	$name=strip_tags($_POST['nameman']);
   	$postion=strip_tags($_POST['phn']);
   	$word=strip_tags($_POST['words']);
   	if(isset($_FILES['imgman'])){
       $names=$_FILES['imgman']['name'];
	$type=$_FILES['imgman']['type'];
	$tem=$_FILES['imgman']['tmp_name'];
	$size=$_FILES['imgman']['size'];
	$avali=array('jpg','png','bmp');
	 $ext=strtolower(end(explode('.', $names)));
	 if (in_array($ext, $avali)){
	 	if ($size<=256000){
	if(move_uploaded_file($tem, "../images/words_"."".$names)) {
		$path="../images/words_"."".$names;
		$res=$connect->prepare("INSERT INTO words (name,postion,imagepath,des) VALUES(?,?,?,?)");
		if($res->execute(array($name,$postion,$path,$word))){
			$msg='<div class="alert alert-success text-center"> تم التحديث </div>';
			header("location:index.php?msg=".$msg."");

		}
		else{
			$msg='<div class="alert alert-danger text-center"> 1تواصل مع المبرمج </div>';
			header("location:index.php?msg=".$msg."");

		}
	 }
	 else{
	 	echo "error1";
	 	$msg='<div class="alert alert-danger text-center"> 2تواصل مع المبرمج </div>';
	 	header("location:index.php?msg=".$msg."");
	 }	
	 }
	 else{
	 	echo "size";
	 	$msg='<div class="alert alert-danger text-center">الرجاء رفع صورة بحجم 2.5 ميجابايت </div>';
	 	header("location:index.php?msg=".$msg."");
	 }
	 }
	 else{
	 	echo "type";
	 	$msg='<div class="alert alert-danger text-center">الرجاء رفع صورو </div>';
	 	header("location:index.php?msg=".$msg."");
	 }
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
         
	?>
	<div style="margin-top: 5px">
		<?php
if (isset($_GET['msg'])){
         	echo $_GET['msg'];
         }
         echo $msg;
		?>
	</div>
	<p class="text-center">last login is </p>
		<div class="col-md-6" style="margin-top: 25px">

			<div class="row">
				<div class="col-md-4">
				<a href="#" data-toggle="modal" data-target="#vol">
					<div class="panel panel-default">
						<div class="panel-heading text-center" >
							<i class="glyphicon glyphicon-ok " style="font-size:3.5em;"></i>
						</div>
						<div class="panel-body text-center">تفعيل حساب للقطاع خيري</div>
					</div>
					</a>
				</div>

				<div class="col-md-4">
				<a href="#" data-toggle="modal" data-target="#adm">
					<div class="panel panel-default">
						<div class="panel-heading text-center" >
							<i class="glyphicon glyphicon-ok " style="font-size:3.5em;"></i>
						</div>
						<div class="panel-body text-center">تفعيل حساب للجهه منفذة</div>
					</div>
					</a>
				</div>

				<div class="col-md-4">
				<a href="#" data-toggle="modal" data-target="#it">
					<div class="panel panel-default">
						<div class="panel-heading text-center" >
							<i class="glyphicon glyphicon-earphone" style="font-size:3.5em;"></i>
						</div>
						<div class="panel-body text-center">تفعيل حساب تقنية معلومات </div>
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

				<div id="adm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"> تفعيل حساب </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
									<div class="form-group">
										<label class="col-md-2 control-label"> اسم الجمعية </label>
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
										<label class="col-md-2 control-label">الجوال</label>
										<div class="col-md-6">
											<input type="number" name="phone" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">الجهه</label>
										<div class="col-md-6">
											<input type="text" name="dep" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">تخصص الجهه</label>
										<div class="col-md-4">
											<select class="form-control " name="opt">
												<option value="null"></option>
												<option value="pk">تفريج كربة</option>
											    <option value="other">اخرى </option>
											</select>
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
       
        <input type="submit" name="saveadm" class="btn btn-success " value="حفظ">
        <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>

</form>
      </div>
    </div>

  </div>
</div>




<div id="vol" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"> تفعيل حساب </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
									<div class="form-group">
										<label class="col-md-2 control-label">اسم القطاع</label>
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




<div id="it" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"> تفعيل حساب </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
									<div class="form-group">
										<label class="col-md-2 control-label">الاسم</label>
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
										<label class="col-md-2 control-label">الجوال</label>
										<div class="col-md-6">
											<input type="number" name="phone" class="form-control">
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
       
        <input type="submit" name="saveit" class="btn btn-success " value="حفظ">
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


				<div class="col-md-4">
				<a href="problemsit.php">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<i class="glyphicon glyphicon-leaf" style="font-size: 3.5em"></i>
						</div>
						<div class="panel-body">المشاكل</div>
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

				<div class="col-md-4">
				<a href="#" data-toggle="modal" data-target="#words">
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<i class="glyphicon glyphicon-pencil" style="font-size: 3.5em;"></i>
						</div>
						<div class="panel-body">اضافة كلمة محفزة </div>
					</div>
					</a>
				</div>

					<div id="words" class="modal fade" role="dialog">
					
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title text-center"> اضافة كلمة محفزة </h3>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 control-label">الاسم </label>
										<div class="col-md-6">
											<input type="text" name="nameman" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">الصفة </label>
										<div class="col-md-6">
											<input type="text" name="phn" class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">الكلمة </label>
										<div class="col-md-6">
											<textarea name="words" class="form-control" rows="5"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">الصورة </label>
										<div class="col-md-6">
											<input type="file" name="imgman" class="form-control">
										</div>
									</div>
									</div>
									<div class="modal-footer">
										
										<input type="submit" name="saveword" class="btn btn-success" value="حفظ">
										 <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
										</form>
									</div>
								
							
						</div>
					</div>
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

		<div class="col-md-3"> 
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