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
               
              $fil_sql=$connect->prepare("SELECT * FROM initiative");
              $fil_sql->execute();
              $count=$fil_sql->rowCount();
              $count+=1;

              if(move_uploaded_file($tem, "files/team_".$count.$name)){
              	$path="files/team_".$count.$name;
              	$names=strip_tags($_POST['name']);
              	$phone=strip_tags($_POST['phone']);
              	$title=strip_tags($_POST['serves']);
              	$body=strip_tags($_POST['descs']);
              	$hours=strip_tags($_POST['hours']);

              	$sql=$connect->prepare("INSERT INTO initiative (name,type,servestype,des,phone,hours,filepath) VALUES (?,?,?,?,?,?,?)");
              	if ($sql->execute(array($names,"Paresnal",$title,$body,$phone,$hours,$path))){
              		 $msg="Done";
                   header("location:helps.php?msg=Done");
              	}
              	else {
              		$msg="<div class='alert alert-info'>يوجد مشكلة الرجاء التواصل مع الدعم الفني</div>";
                   header("location:helps.php?msg=".$msg."");
              	}
              }

	    	}
	    	else{
              $msg="<div class='alert alert-danger'>اقصى حجم للرفع 400 كليو بايت </div>";
              header("location:helps.php?msg=".$msg."");
	    	}
	    }
	    else{
	    	$msg="<div class='alert alert-danger'>الرجاء رفع ملف بصيغة pdf </div>";
        header("location:helps.php?msg=".$msg."");
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

if (isset($_GET['msg'])){
  echo '<div style="margin-top: 80px">'.$_GET['msg'].'</div>';
}

?>

<div class="col-md-8" style="margin-top: 80px">
 
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" >
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
 								<!--<input type="text" name="serves" class="form-control" required>-->
                <select class="form-control" name="serves" required >
                  <option>...</option>
                  
                  <?php 
                  $infos=$connect->prepare("SELECT * FROM kinds where type=?");
                  $infos->execute(array("team"));
                  foreach ($infos as $key ) {
                    echo '
                   
                        <option>'.$key['name'].'</option>

                    ';
                  }
                  ?>
                </select>
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

