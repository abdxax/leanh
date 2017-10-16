<?php require "../connnect.php";
if (isset($_POST['saveord'])) {
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $location=$_POST['location'];
  $descs=$_POST['descs'];
  $nameap=$_POST['applayname'];
  $phoneapl=$_POST['applayphone'];
  $da=date("Y-m-d h:i:sa");
  $res=$connect->prepare("INSERT INTO requirestorder(name_applay,
phone_applay,name_po,phone_po,des,location,dates,status) VALUES (?,?,?,?,?,?,?,?) ");

  if ($res->execute(array($nameap,$phoneapl,$name,$phone,$descs,$location,$da,"new"))){
               //valiadion 
  	echo "Done";
  }
  else{
    echo "error";
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
<?php require 'header_p.php';?>
<div class="container">
	<div class="col-sm-7 col-xs-7">
		<form class="form-horizontal" method="POST">
			
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="name" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="phone" class="form-control">
              </div>
            </div>

            

            <div class="form-group">
              <label class="col-md-2 control-label">المكان</label>
              <div class="col-md-7">
                <input type="text" name="location" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">وصف الحاله</label>
              <div class="col-md-7">
                <textarea name="descs" rows="8" class="form-control"></textarea>
              </div>
            </div>

            <p class="h3 text-center"> بيانات رافع الطلب </p>
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="applayname" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="applayphone" class="form-control">
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-2 control-label"></label>
              <div class="col-md-7">
                <input type="submit" name="saveord" class="btn btn-success btn-block" value="حفظ">
              </div>
            </div>
                       
		</form>
	</div>

</div>
</body>
</html>