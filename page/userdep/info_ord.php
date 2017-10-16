<?php
require "../../connnect.php";
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['pass'])==true){
  $sql=$connect->prepare("SELECT * FROM userall WHERE email=? AND password=?");
  $sql->execute(array($_SESSION['email'],$_SESSION['pass']));
  if ($sql->rowCount()==1){
         $sql2=$connect->prepare("SELECT * FROM user WHERE email=? AND password=?");
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


$desc="";
$goal="";
$have="";
$id_or="";

$name="";
$phone="";
$msg="";

if(isset($_GET['ids'])){
	$sql=$connect->prepare("SELECT * FROM requirestorder where id=?");
$sql->execute(array($_GET['ids']));

foreach ($sql as $row) {
	$desc=$row['des'];
	$goal=$row['goal'];
	$have=$row['havemo'];
	
	$id_or=$row['id'];
  $name=$row['name_po'];
  $phone=$row['phone_po'];
}
$rem=$goal-$have;


$ids=$_GET['ids'];
//echo $ids;
if (isset($_POST['saveedit'])) {
	$hovemun= $_POST['havem']+$have;
  if ($hovemun<$goal){
    $sq=$connect->prepare("UPDATE requirestorder SET status=?,havemo=? WHERE id=? ");
  if ($sq->execute(array("accept",$hovemun,$ids))){
 $msg='<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
 header("location:dispalyorder.php?msg=".$msg."");
  }
  }

  else if ($hovemun==$goal){
    $sq=$connect->prepare("UPDATE requirestorder SET status=?,havemo=? WHERE id=? ");
  if ($sq->execute(array("Done",$hovemun,$ids))){
 $msg='<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
 header("location:dispalyorder.php?msg=".$msg."");
  }
  }

  else{
    $msg='<div class="alert alert-danger text-center">القيمه المدخله اكبلر من المتبقي</div>';
  }
	 
}


/*if(isset($_GET['id'])){
	$sql=$connect->prepare("SELECT * FROM requirestorder where id=?");
$sql->execute(array($_GET['id']));
$desc="";
$goal="";
$have="";
$id_or=$_GET['id'];
$test="";
foreach ($sql as $row) {
	$desc=$row['des'];
	$goal=$row['goal'];
	$have=$row['havemo'];
	$test=$row['test'];
}
*/
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
<?php echo $msg;?>
	<img src=<?php echo  $_SESSION['img']; ?> class="img-responsive center-block  img-circle" style="width: 18%;height: 18%;margin-top: 10px;">
  <h4 class="text-center">رقم الحالة <?php echo $id_or;?></h5>
          <div class="col-md-8 col-sm-8 col-xs-8 ">
            <div class="col-md-6 col-md-offset-6">
              <table class="table">
                <tr>
                  <th>الاسم</th>
                  <td><?php echo $name;?></td>
                </tr>
                <tr>
                  <th>رقم الجوال</th>
                  <td><?php echo $phone;?></td>
                </tr>
                <tr>
                  <th>الهدف</th>
                  <td><?php echo $goal;?></td>
                </tr>
                <tr>
                  <th>المجموع</th>
                  <td><?php echo $have;?></td>
                </tr>
                <tr>
                  <th>الهدف</th>
                  <td><?php echo $rem;?></td>
                </tr>
              </table>
            </div>
            <div class="col-md-8 col-md-offset-4">
              <form class="form-horizontal" method="POST">
          

              <div class="form-group">
                <label class="col-md-3"></label>
                <div class="col-md-8">
                  <input type="number" name="havem" class="form-control " placeholder="المبلغ المحصول عليه">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3">  </label>
                <div class="col-md-8">
                  <input type="submit" name="saveedit" class="btn btn-success btn-block" value="حفظ">
                </div>
              </div>
            </form>

            </div>
          	
          </div>
</div>
</body>
</html>