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
$name='';
$id='';
$phone='';
$house_type='';
$rent='';
$income='';
$idvolu='';
if (isset($_GET['id'])){
  $id=$_GET['id'];
  $sql_ben=$connect->prepare("SELECT * FROM beneficiary WHERE id_gov=?");
  $sql_ben->execute(array($_GET['id']));
  foreach ($sql_ben as $row) {
    $name=$row['name'];
    $phone=$row['phone'];
    $house_type=$row['house_type'];
    $rent=$row['rent'];
    $income=$row['Monthly_income'];
  }
}

if (isset($_POST['saveord'])) {
  $id_items="";
  $do=date("Y-m-d H:i:s");
  $res=strip_tags($_POST['reson']);
   $item=strip_tags($_POST['id_items']);
 $sql_upd=$connect->prepare("UPDATE detl_benef SET statuses=?, end_helps=?,resoun=? WHERE id_govs=? AND id_items=?  ");
 if ($sql_upd->execute(array("NO",$do,$res,$id,$_SESSION["id_item"]))){
  header("location:benfe.php?msg=Done2");
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
<?php 
if (isset($_GET['reg'])){
  echo'
<span>هذا المستفيد لدية سجل استفادة يمكن الاطلاع علية في الاسفل و للتسجله كا مستفيد لديكم اضغط نسجيل <sapn>
<a href="addDetels.php" class="btn btn-inf ">تسجيل </a>
  ';
}


?>
<div class="container">
  <div class="col-sm-6">
    <span class="h4 text-center">البيانات الشخصية </span>
    <table class="table">
      <tr>
        <th>الاسم </th>
        <td><?php echo $name;?></td>
      </tr>

       <tr>
        <th>السجل المدني </th>
        <td><?php echo $id;?></td>
      </tr>

       <tr>
        <th>الجوال</th>
        <td><?php echo $phone;?></td>
      </tr>

       <tr>
        <th>نوع السكن </th>
        <td><?php echo $house_type;?></td>
      </tr>

       <tr>
        <th>ملك </th>
        <td><?php echo $rent;?></td>
      </tr>

       <tr>
        <th>الدخل الشهري</th>
        <td><?php echo $income;?></td>
      </tr>

    </table>
  </div>
  <div class="col-sm-9">
    <hr/>
  <span class="h4">سجل المستفيد </span>
  <br/>
  <?php 
$sql_cons=$connect->prepare("SELECT * FROM detl_benef LEFT JOIN voluntarycomp ON detl_benef.id_vo=voluntarycomp.id WHERE detl_benef.id_govs=?");
$stat="";
$sql_cons->execute(array($id));
foreach ($sql_cons as $row) {
  $idvolu=$row['id_vo'];
  if ($row['statuses']=="Yes" ){
    $stat="الاعاننة مستمرة ";
  }
  else {
    $stat="الاعانة متوقفة ";
  }
  echo '
<div class"col-sm-6">
<table>
<tr>
<th> اسم الجمعية </th>
<td> '.$row['name_voluntray'].' </td>
</tr>

<tr>
<th> نوع الاعانة  </th>
<td> '.$row['help_type'].' </td>
</tr>

<tr>
<th> مقدار الاعانة  </th>
<td> '.$row['helps_mon'].' </td>
</tr>

<tr>
<th> الملاحظات </th>
<td> '.$row['Notes'].' </td>
</tr>

<tr>
<th> المرفقات </th>
<td> <a href='.$row['files_paths'].'>تحميل المرافقات </a> </td>
</tr>

<tr>
<th> الحالة  </th>
<td> '.$stat.' </td>
</tr>

<tr>
<th> تاريخ اقاف الاعانة  </th>
<td> '.$row['end_helps'].' </td>
</tr>

<tr>
<th> السبب </th>
<td> '.$row['resoun'].' </td>
</tr>

</table>
</div>
';
$id_items=$row['id_items'];
if ($_SESSION['idvo']==$idvolu && $row['statuses']=="Yes"){
  $_SESSION["id_item"]=$row['id_items'];
  echo '
<a href ="#"  class="btn btn-danger " data-toggle="modal" data-target="#stop">ايقاف الاعانة </a>

<div id="stop" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">طلب خدمة من جمعيات اهلية '.$_SESSION["id_item"].'</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
            <div class="form-group">
              <label class="col-md-2 control-label">السبب </label>
              <div class="col-md-7">
                <input type="text" name="reson" class="form-control" required>

              </div>
              
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label"></label>
              <div class="col-md-7">
                 <input type="text" name="id_items" value='.$row['id_items'].' class="form-control" disabled >

              </div>
             
            </div>

            
                       </div>
                       <div class="modal-footer">
                       <input type="submit" name="saveord" class="btn btn-info" value="تقديم">
                         <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
</form>
                         
                       </div>
      </div>
    </div>
  </div>
  ';
 
}
'
<hr/>
';
}


  ?>
  </div>
</div>
</body>
</html>