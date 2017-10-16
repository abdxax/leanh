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

$sql=$connect->prepare("SELECT * FROM user WHERE email=?");
$sql->execute(array($_SESSION['emailu']));
$name='';
$email='';
$phone='';
$id_vol="";
//echo $_SESSION['email'];
foreach ($sql as $row) {
  $name=$row['name'];
  $phone=$row['phone'];
  $email=$row['email'];
  $id_vol=$row['id_voluntary'];
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
  
    <img src="../../KSA2.jpg" class="img-responsive center-block  " style="width: 18%;height: 18%;margin-top: 10px;"">

    <p class="text-center">Lasr log in is </p>

    <section>
      <div class="col-sm-9 col-sm-offset-2">
      <div class="col-md-4 text-center"> 
    <p class="text-center">البيانات الشخصية</p>
         <table class="table">
          <tr>
            <th>الاسم</th>
            <td><?php echo $name; ?></td>
            </tr>
            <tr>
            <th>البريد الالكترواني</th>
            <td><?php echo $email; ?></td>
            </tr>
            <tr>
            <th>رقم الجوال</th>
            <td><?php echo $phone; ?></td>
            </tr>
            <tr>
            <th></th>
            <td></td>
          </tr>
         </table>
    </div>
        <div class="col-sm-10 ">
          <div class="panel panel-default">
            <div class="panel-heading">
              <p class="h4 text-center">احصائيات </p>
            </div>
            <div class="panel-body"></div>
            <table class="table">
              <thead>
                <tr>
                  <th>عدد الحالات</th>
                  <th> عدد الحالات المحلوله</th>
                  <th> الحالات تحت الانتظار</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? ");
             $sql->execute(array($id_vol));
                $num=$sql->rowCount();


                 $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? AND status=?");
             $sql->execute(array($id_vol,'Done'));
                $num2=$sql->rowCount();


                    $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? AND status=?");
             $sql->execute(array($id_vol,'waiting'));
                $num3=$sql->rowCount();

                $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? ");
             $sql->execute(array($id_vol));
                $all=$sql->rowCount();

                $result="";

                if ($all==0){
                  $result=0;
                }
                else{
                  $result=($num2/$all)*100;
                }
               ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $num2; ?></td>
                  <td><?php echo $num3; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-sm-11">
        <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result."%"; ?>">
   <?php echo $result."%"; ?>
  </div>
</div>
      </div>
    </section>
  
</div>


</div>
</body>
</html>