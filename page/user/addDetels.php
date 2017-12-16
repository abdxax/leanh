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

$id_goves=$_SESSION['id_govs_benf'];
$msg="";
$sql_ben=$connect->prepare("SELECT * FROM beneficiary WHERE id_gov=?");
$sql_ben->execute(array($id_goves));
$counts=$sql_ben->rowCount();

if ($counts==1){
$msg="هذا المستفيد مسجل مسبقا ";
header("location:detels_ben.php?reg=reg&id=".$id_goves."");
}

else{
  $sql_ben_ins=$connect->prepare("INSERT INTO beneficiary (id_gov,name,phone,house_type,rent,Monthly_income)VALUES (?,?,?,?,?,?)");
  echo $_SESSION['phone_benf'];
  echo $_SESSION['name_benf'];
  echo $id_goves;
  if ($sql_ben_ins->execute(array($id_goves,$_SESSION['name_benf'],$_SESSION['phone_benf'],$_SESSION['house_benf'],$_SESSION['rent_benf'],$_SESSION['income_benf']))){
    $msg="تم اضافة المستفيد الرجاء اكمال البيانات التالية ";
  }
  else{
    $msg="لا يمكن اضافة المستفيد تواصل مع الدعم الفني ";
  }

}

if (isset($_FILES['helpfile'])) {
    # code...
    //print_r($_FILES['fipdf']);
    $name=$_FILES['helpfile']['name'];
    $size=$_FILES['helpfile']['size'];
    $type=$_FILES['helpfile']['type'];
      $tem=$_FILES['helpfile']['tmp_name'];

      $avali=array('pdf');
      $ext=strtolower(end(explode('.', $name)));
      if (in_array($ext, $avali)){
        if ($size<=409600){
          $fil_sql=$connect->prepare("SELECT * FROM detl_benef");
              $fil_sql->execute();
              $count=$fil_sql->rowCount();
              $count+=1;
              if(move_uploaded_file($tem, "../files/volun".$count.$id_goves.$name)){
                $path="../files/volun".$count.$id_goves.$name;
                $type_help=strip_tags($_POST['type']);
                $help_mon=strip_tags($_POST['helpmo']);
                $note=strip_tags($_POST['notes']);
                //$body=strip_tags($_POST['descs']);
                //$hours=strip_tags($_POST['hours']);

                $sql=$connect->prepare("INSERT INTO detl_benef (id_govs,id_vo,help_type,helps_mon,statuses,Notes,files_paths) VALUES (?,?,?,?,?,?,?)");
                if ($sql->execute(array($id_goves,$_SESSION['idvo'],$type_help,$help_mon,"Yes",$note,$path))){
                   $msg="Done";
                   header("location:benfe.php?msg=Done");
                }
                else {
                  $msg="<div class='alert alert-info'>يوجد مشكلة الرجاء التواصل مع الدعم الفني</div>";
                   header("location:benfe.php?msg=".$msg."");
                }
              }
  
}


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
<?php echo '<div class="alert alert-info text-center">'.$msg.'</div>'; ?>

<div class="container ">
  <div class="col-sm-9">
    
<form method="POST" enctype="multipart/form-data" class="form-horizontal">
  <div class="form-group">
    
<label class="col-sm-4">نوع المساعده </label>
<div class="col-sm-5">
  <select class="form-control" name="type">
    <option>عينية</option>
    <option>مادية </option>

  </select>
</div>

  </div>

  <div class="form-group">
    
<label class="col-sm-4">مقدار المساعده</label>
<div class="col-sm-5">
  <input type="text" name="helpmo" class="form-control" >
</div>

  </div>

  <div class="form-group">
    
<label class="col-sm-4">رفع ملفات الحالة </label>
<div class="col-sm-4">
  <input type="file" name="helpfile" class="form-control">
</div>

  </div>

   <div class="form-group">
    
<label class="col-sm-4">ملاحظات </label>
<div class="col-sm-6">
  <textarea class="form-control" rows="5" name="notes"></textarea>
</div>

  </div>

   <div class="form-group">
    
<div class="col-sm-4">
  <input type="submit" name="savepeo" class="btn btn-success btn-block" value="تقديم">
</div>

  </div>
</form>

  </div>

 </div>
</body>
</html>