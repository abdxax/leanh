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
  <div class="col-sm-10">
    
    <div class="col-sm-10">
    <table class="table">
      <thead>
        <tr>
          <th>لاسم</th>
           <th>رقم الهوية</th>
            <th>رقم الجوال</th>
            <th>المنزل </th>
             <th>ملك</th>
              <th>الدخل الشهري</th>
        </tr>
      </thead>

      <tbody>
        <?php 
       $sql_dis=$connect->prepare("SELECT * FROM detl_benef LEFT JOIN beneficiary ON detl_benef.id_govs=beneficiary.id_gov WHERE  detl_benef.id_vo=? ");
       $sql_dis->execute(array($_SESSION['idvo']));

       foreach ($sql_dis as $row) {
         echo '
         
           <tr>
            <td><a href=detels_ben.php?id='.$row['id_govs'].' & id_item_de='.$row['id_items'].'>'.$row['name'].'</a></td>
              <td>'.$row['id_govs'].'</td>
               <td>'.$row['phone'].'</td>
                <td>'.$row['house_type'].'</td>
                 <td>'.$row['rent'].'</td>
                  <td>'.$row['Monthly_income'].'</td>
           </tr>
          

         ';
       }

        ?>
      </tbody>



    </table>

  </div>
  </div>
</div>
</body>
</html>