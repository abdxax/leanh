<?php
require "../connnect.php";
session_start();
$msg='';
	if (isset($_FILES['fipdf'])) {
		# code...
		//print_r($_FILES['fipdf']);
		$name=$_FILES['fipdf']['name'];
		$size=$_FILES['fipdf']['size'];
		$type=$_FILES['fipdf']['type'];
	    $tem=$_FILES['fipdf']['tmp_name'];

	    $avali=array('pdf');
	    $ext=strtolower(end(explode('.', $name)));
	    if (in_array($ext, $avali)){
	    	if ($size<=409600){
     

              if(move_uploaded_file($tem, "files/team_".$name)){
              	$path="files/team_".$name;
              	$names=strip_tags($_POST['name']);
              	$phone=strip_tags($_POST['phone']);
              	$title=strip_tags($_POST['serves']);
              	$body=strip_tags($_POST['descs']);
              	$hours=strip_tags($_POST['hours']);

              	$sql=$connect->prepare("INSERT INTO initiative (name,type,servestype,des,phone,hours,filepath) VALUES (?,?,?,?,?,?,?)");
              	if ($sql->execute(array($names,"Paresnal",$title,$body,$phone,$hours,$path))){
              		 $msg="<div class='alert alert-info'>تم الحفظ بنجاح </div>";
              	}
              	else {
              		$msg="<div class='alert alert-info'>يوجد مشكلة الرجاء التواصل مع الدعم الفني</div>";
              	}
              }

	    	}
	    	else{
              $msg="<div class='alert alert-danger'>اقصى حجم للرفع 400 كليو بايت </div>";
	    	}
	    }
	    else{
	    	$msg="<div class='alert alert-danger'>الرجاء رفع ملف بصيغة pdf </div>";
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

<?php require "header_p.php";


?>

<div class="col-md-8" style="margin-top: 15px">
 
	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
 						<div class="form-group">
 							<label class="col-md-2 control-label">الاسم</label>
 							<div class="col-md-7">
 								<input type="text" name="name" class="form-control" required>
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="col-md-2 control-label">رقم الجوال</label>
 							<div class="col-md-7">
 								<input type="text" name="phone" class="form-control" required>
 							</div>
 						</div>

 						

 						<div class="form-group">
 							<label class="col-md-2 control-label">نوع الخدمة</label>
 							<div class="col-md-7">
 								<input type="text" name="serves" class="form-control" required>
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="col-md-2 control-label">وصف الخدمة </label>
 							<div class="col-md-7">
 								<textarea name="descs" rows="8" class="form-control" required></textarea>
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-md-2 control-label">عدد الساعات</label>
 							<div class="col-md-7">
 								<input type="text" name="hours" class="form-control" required>
 							</div>
 						</div>
            <div class="form-group">
              <label class="col-md-8 control-label">رفع ملف شرح كامل التفاصيل بصيغة pdf حجم (400)كيلو بايت </label>
              <div class="col-md-7 col-sm-offset-2">
                <input type="file" name="fipdf" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
 							<label class="col-md-2 control-label"></label>
 							<div class="col-md-7">
 								<input type="submit" name="sav" class="btn btn-info btn-block" value="حفظ">
 							</div>
 						</div>
                   </form>
</div>

               </body>
               </html>

