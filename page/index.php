<?php 
require "../connnect.php";
session_start();


$per_page=10;
 if (isset($_GET['page'])){
  $page=$_GET['page'];

 }
 else{
  $page=1;
 }
 $start_from=($page-1)* $per_page;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'header.php';?>
  
</head>
<body>
  
<?php require 'header_p.php';?>



<?php 
 if (isset($_GET['msg'])){
  if ($_GET['msg']=="done"){
    echo '<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
  }
  else if ($_GET['msg']=="error"){
    echo '<div class="alert alert-danger text-center">الحالة موجوده من قبل</div>';
  }
 }
?>
<div class="col-md-3 col-sm-3 col-sm-offset-4" style="margin-top: 33px;">
  <img src="../lenh2.png" class="img-responsive">
</div>

<header class="intro-header ">



     <!-- <div class="container">-->
        <div class="intro-message">
          <div class="col-md-5 col-sm-5 col-sm-offset-4">
             <form class="form-horizontal " style="margin-top: 6px" action="check.php" method="POST"> 
             <div class="form-group">
              <div class="col-md-8 col-sm-8">
                    <input type="text" name="email" class="form-control" placeholder="ادخل الايميل ">
              </div>
             
             </div>

             <div class="form-group ">
              <div class="col-md-8 col-sm-8">
                <input type="password" name="pass" class="form-control" placeholder="ادخل الرقم السري">
              </div>
                 
             </div>

             <div class="form-group col-sm-4 ">
              <div class="col-sm-8 ">
                 <input type="submit" name="login"  class="btn btn-info" value="تسجيل دخول">
              </div>
               
             </div>
    
  </form>


          </div>
         
         <!-- <h4 style="color: black;">ورد في صحيح مسلم عَنْ أَبِي هُرَيْرَةَ قَالَ : قَالَ رَسُولُ اللَّهِ صَلَّى اللَّه عَلَيْهِ وَسَلَّمَ : 
(( مَنْ نَفَّسَ عَنْ مُؤْمِنٍ كُرْبَةً مِنْ كُرَبِ الدُّنْيَا نَفَّسَ اللَّهُ عَنْهُ كُرْبَةً مِنْ كُرَبِ يَوْمِ الْقِيَامَةِ ، وَمَنْ يَسَّرَ عَلَى مُعْسِرٍ يَسَّرَ اللَّهُ عَلَيْهِ فِي الدُّنْيَا وَالْآخِرَةِ ، وَمَنْ سَتَرَ مُسْلِمًا سَتَرَهُ اللَّهُ فِي الدُّنْيَا وَالْآخِرَةِ ، وَاللَّهُ فِي عَوْنِ الْعَبْدِ مَا كَانَ الْعَبْدُ فِي عَوْنِ أَخِيهِ ، وَمَنْ سَلَكَ طَرِيقًا يَلْتَمِسُ فِيهِ عِلْمًا سَهَّلَ اللَّهُ لَهُ بِهِ طَرِيقًا إِلَى الْجَنَّةِ ، وَمَا اجْتَمَعَ قَوْمٌ فِي بَيْتٍ مِنْ بُيُوتِ اللَّهِ يَتْلُونَ كِتَابَ اللَّهِ وَيَتَدَارَسُونَهُ بَيْنَهُمْ ، إِلَّا نَزَلَتْ عَلَيْهِمُ السَّكِينَةُ ، وَغَشِيَتْهُمُ الرَّحْمَةُ ، وَحَفَّتْهُمُ الْمَلَائِكَةُ ، وَذَكَرَهُمُ اللَّهُ فِيمَنْ عِنْدَهُ ، وَمَنْ بَطَّأَ بِهِ عَمَلُهُ لَمْ يُسْرِعْ بِهِ نَسَبُهُ))</h4>
          <!--<h1>Landing Page</h1>-->
         <!-- <h3>A Template by Start Bootstrap</h3>-->
         <!--<h3>بتعاون مع </h3>
          <hr class="intro-divider">
          <ul class="list-inline intro-social-buttons  ">
            <li class="list-inline-item col-md-2 col-sm-3  col-md-offset-0 col-sm-offset-2 ">
              <a href="#" class="btn btn-secondary btn-lg">
                <i class="fa fa-twitter fa-fw"></i>
                <span class="network-name "><img src="../uoh.jpg" class="img-responsive"></span>
              </a>
            </li>
            <li class="list-inline-item col-md-2 col-sm-3">
              <a href="#" class="btn btn-secondary btn-lg">
                <i class="fa fa-github fa-fw"></i>
                <span class="network-name"><img src="../uohm.jpg" class="img-responsive"></span>
              </a>
            </li>
            <li class="list-inline-item col-md-2 col-sm-3">
              <a href="#" class="btn btn-secondary btn-lg">
                <i class="fa fa-linkedin fa-fw"></i>
                <span class="network-name"><img src="../vol.jpg" class="img-responsive"></span>
              </a>
            </li>
          </ul>-->
        </div>
     <!-- </div>-->
    </header>

<div class="container ">

  <!--<div class="col-md-3  col-md-offset-4 ">
    <img src="../lena.jpg" class="img-responsive ">
  </div>

	<header class="col-md-9 col-md-offset-1" style="margin-top: 20px">  
			<div class="panel panel-default">
				<div class="panel-heading text-center"> بتعاون مع </div>
				<div class="panel-body">
				<div class="row">
				<div class="col-md-4 ">
					
						<div class="card " style="width: 20rem;">
							<img class="card-img-top img-responsive" src="../uoh.jpg" alt="Card image cap">
                           <div class="card-block">
                              <h4 class="card-title"></h4>
                    <p class="card-text"></p>
                  
                        </div>

						</div>
						</div>
					
					<div class="col-md-4 ">
						<div class="card" style="width: 20rem;">
							<img class="card-img-top img-responsive" src="../uohm.jpg" alt="Card image cap">
                           <div class="card-block">
                              <h4 class="card-title"></h4>
                    <p class="card-text"></p>
                   
                        </div>

						</div>
					</div>
					<div class="col-md-4 ">
						<div class="card" style="width: 20rem;">
							<img class="card-img-top img-responsive" src="../vol.jpg" alt="Card image cap">
                           <div class="card-block">
                              <h4 class="card-title"></h4>
                    <p class="card-text"></p>
                  
                        </div>

						</div>
					</div>
				</div>
					
				</div>
				</div>
	</header>-->

	<div class="col-sm-10 col-sm-offset-1 " style="margin-top: 10px;padding-left:5px">
  <div class="panel panel-default ">
      <div class="panel-heading text-center h3 " style="background: #743e4d;color: white">الحالات </div>
      <div class="panel-body">
        <div class="row">
  <?php
$res=$connect->prepare("SELECT * FROM requirestorder WHERE status=? ORDER BY id DESC LIMIT $start_from,$per_page");
$res->execute(array('accept'));
$id_va='';

foreach ($res as $row) {
 $id_va=$row['id_voluntray'];
 $sod="";
$imgs="";
if ($row['Type']=="Personal"){
  $sod="#".$row['id'];
 
}
else if ($row['Type']=="investment"){
  $sod="فرصة استثمار ";
}
else if ($row['Type']=="pk"){
  $sod="تفريج كربة سجين ";
}
 $sql=$connect->prepare("SELECT * FROM voluntarycomp WHERE id=? ");
$sql->execute(array($id_va));
foreach ($sql as $rows) {
  $imgs=$rows['imagepath'];
}
$imgs=explode("../", $imgs);
$imj=$imgs[1];

echo '
          <a href="info.php?id='.$row['id'].'" >
            <div class=" col-sm-6">
              <div class="panel panel-default ">
                <div class="panel-heading text-center  " style="background:#743e4d;color:white">'.$sod.'
                 <div class="col-md-2 col-sm-2 pull-right "><img src='.$imj.' class="img-responsive"></div>
                </div>
                <div class="panel-body">'.$row['des'].'</div>
              </div>
            </div>
       </a>
            


';
}


   ?>
		<!--<div class="panel panel-default">
			<div class="panel-heading text-center">الحالات </div>
			<div class="panel-body">
				<div class="row">
          	<div class="col-md-5">
          		<div class="panel panel-default">
          			<div class="panel-heading">test</div>
          			<div class="panel-body">aaa</div>
          		</div>
          	</div>

          	<div class="col-md-5">
          		<div class="panel panel-default">
          			<div class="panel-heading">test</div>
          			<div class="panel-body">aaa</div>
          		</div>
          	</div>

          	<div class="col-md-5">
          		<div class="panel panel-default">
          			<div class="panel-heading">test</div>
          			<div class="panel-body">aaa</div>
          		</div>
          	</div>

          	<div class="col-md-5">
          		<div class="panel panel-default">
          			<div class="panel-heading">test</div>
          			<div class="panel-body">aaa</div>
          		</div>
          	</div>

          	<div class="col-md-5">
          		<div class="panel panel-default">
          			<div class="panel-heading">test</div>
          			<div class="panel-body">aaa</div>
          		</div>
          	</div>
          </div>
-->
</div>
<div class="text-center">
            
<ul class="pagination ">
<?php

$sql=$connect->prepare("SELECT * FROM requirestorder WHERE status=? ");
$sql->execute(array("accept"));
$count=$sql->rowCount();
$totals=ceil($count/$per_page);

for($i=1;$i<=$totals;$i++){
  echo '
                   
           <li class="page-item "><a class="page-link " href="index.php?page='.$i.'">'.$i.'</a></li>
   

             


 ';
}


 ?>

       </ul>
          </div>   
             
			</div>
		</div>
	</div>

</div>

<!--<footer class="navbar  navbar-default  " >
    <p class="text-center ">Developer by Abdulrahman AL-Jarallah @2017   </p>
     <p class="text-center ">aljarallahabdulrahman@gmail.com  </p>
     <p class="text-center ">version : 1.0  </p>
  </footer>-->



    <?php require "footer.php"; ?>



</body>
</html>