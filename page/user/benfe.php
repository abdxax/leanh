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


if (isset($_POST["saveord"])) {
  $name=$_POST["name"];
  $id_gov=$_POST["id_govs"];
  $phone=$_POST["phone"];
  $house_type=$_POST["house"];
  $rent=$_POST["rent"];
  $income=$_POST["income"];
$_SESSION['name_benf']=$name;
$_SESSION['id_govs_benf']=$id_gov;
$_SESSION['phone_benf']=$phone;
$_SESSION['house_benf']=$house_type;
$_SESSION['rent_benf']=$rent;
$_SESSION['income_benf']=$income;

  header("location:addDetels.php");
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
<?php 
if(isset($_GET['msg'])){
  if ($_GET['msg']=="Done") {
    echo "<div class='alert alert-success text-center'>تم اضافة المستفيد </div>";
  }
}

?>
<div class="container">

  <div class="col-sm-12">
    <div class="col-sm-6 col-sm-offset-3">
      <form class="inline">
       <div class="form-group">
          <label class="col-sm-4"  >بحث عن مستفيد</label>
        <div class="col-sm-5">
          <input type="number" class="form-control" name="id_gov" placeholder="رقم الهوية الوطنية  ">
       </div>
           <input type="submit" class="btn btn-default" name="sub" value="بحث">
        </div>
      </form>
    </div>
  </div>

  <div class="col-sm-12">
    <div class="col-sm-6 col-sm-offset-5">
      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#Addbenf">اضافة مستفيد </a>
      <a href="benf_volu.php" class="btn btn-info">مستفيدين الجمعية </a>
    </div>
    
  </div>

  <div id="Addbenf" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">اضافة مستفيد </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="name" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">الهوية الوطنية</label>
              <div class="col-md-7">
                <input type="text" name="id_govs" class="form-control" required>
              </div>
            </div>

            

            <div class="form-group">
              <label class="col-md-2 control-label">الجوال</label>
              <div class="col-md-7">
                <input type="text" name="phone" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">نوع السكن </label>
              <div class="col-md-4">
               <!-- <textarea name="descs" rows="8" class="form-control" required></textarea>-->
               <select class="form-control" name="house">
                 <option>بيت</option>
                   <option>شقة </option>
               </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">السكن ملك </label>
              <div class="col-md-4">
               <!-- <textarea name="descs" rows="8" class="form-control" required></textarea>-->
               <select class="form-control" name="rent">
                 <option>نعم</option>
                   <option>لا </option>
               </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">الدخل الشهري </label>
              <div class="col-md-7">
                <input type="text" name="income" class="form-control" required>
              </div>
            </div>

           <!-- <p class="h3 text-center"> بيانات رافع الطلب </p>
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="applayname" class="form-control" required>
              </div>
            </div>-->

           <!-- <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="applayphone" class="form-control" required>
              </div>
            </div>
                       </div>-->
                       <div class="modal-footer">
                       <input type="submit" name="saveord" class="btn btn-info" value="تقديم">
                         <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
</form>
                         
                       </div>
      </div>
    </div>
  </div>
  
  
</div>
</body>
</html>