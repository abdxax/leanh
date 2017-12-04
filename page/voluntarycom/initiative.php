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
     

              if(move_uploaded_file($tem, "../files/team_".$name)){
              	$path="files/team_".$name;
              	$names=$_SESSION['user'];
              	//$phone=$_SESSION['phone'];
              	$title=$_POST['serves'];
              	$body=$_POST['descs'];
              	$hours=$_POST['hours'];

              	$sql=$connect->prepare("INSERT INTO initiative (name,type,servestype,des,hours,filepath,id_voluntray) VALUES (?,?,?,?,?,?,?)");
              	if ($sql->execute(array($names,"company",$title,$body,$hours,$path,$_SESSION['id']))){
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
	<?php require 'header.php';?>
</head>
<body>
<?php require "header_pa.php";?>
<div class="container">
<div class="col-md-8" style="margin-top: 15px">
 
	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
 						
 						

 						<div class="form-group">
 							<label class="col-md-2 control-label">نوع الخدمة</label>
 							<div class="col-md-7">
 								<input type="text" name="serves" class="form-control">
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="col-md-2 control-label">وصف الخدمة </label>
 							<div class="col-md-7">
 								<textarea name="descs" rows="8" class="form-control" ></textarea>
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-md-2 control-label">عدد الساعات</label>
 							<div class="col-md-7">
 								<input type="text" name="hours" class="form-control">
 							</div>
 						</div>
            <div class="form-group">
              <label class="col-md-8 control-label">رفع ملف شرح كامل التفاصيل بصيغة pdf حجم (400)كيلو بايت </label>
              <div class="col-md-7 col-sm-offset-2">
                <input type="file" name="fipdf" class="form-control">
              </div>
            </div>

            <div class="form-group">
 							<label class="col-md-2 control-label"></label>
 							<div class="col-md-7">
 								<input type="submit" name="sav" class="btn btn-info btn-block">
 							</div>
 						</div>
                   </form>
</div>



</div>
</body>

</html>