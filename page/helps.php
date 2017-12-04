<?php
require "../connnect.php";
session_start();
$msg="";
if (isset($_POST['saveord'])){
	if (isset($_FILES['fipdf'])){
   $name=$_FILES['fipdf']['name'];
  $type=$_FILES['fipdf']['type'];
  $tem=$_FILES['fipdf']['tmp_name'];
  $size=$_FILES['fipdf']['size'];
  if ($size<=409600){

  }
  else{
 // header("location:helps.php?msg=")
  }
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

<?php require "header_p.php";?>
<div style="margin-top: 60px"></div>
<?php if(isset($_GET['msg'])){
if ($_GET['msg']=='Done'){
echo "<div class='alert alert-info'>تم الحفظ بنجاح </div>";
}
else{
echo $_GET['msg'];
}

} 
?>
<div class="col-sm-6 col-sm-offset-5" style="margin-top: 10px;margin-bottom: 15px;">
	
<a href="team.php"  class="btn btn-info " style="margin-top: 70px"><i class="glyphicon glyphicon-plus"></i> تقديم خدمة </a>
 	</div>


<div class="container">
<div style="width: 20px;height: 20px; margin-top: 15px"></div>
	<div class="row">
  <?php
  $des="";
  $hour="";
  $name="";
  $serves="";
  $sql=$connect->prepare("SELECT * FROM initiative INNER JOIN voluntarycomp ON initiative.id_voluntray=voluntarycomp.id WHERE initiative.type=? ");
  $sql->execute(array("company"));
  foreach ($sql as $row) {
     $imgs=$row['imagepath'];
     $des=$row['des'];
     $hour=$row['hours'];
     $name=$row['name_voluntray'];
     $serves=$row['servestype'];

$imgs=explode("../", $imgs);
$imj=$imgs[1];
    echo '
<a href='.$row['filepath'].'>
<div class="col-sm-6 col-md-4">
    <div class="thumbnail col-sm-6">
    
      <img src="'.$imj.'" class="img-responsive" style="margin-bottom:15px">
    
     
      <div class="caption " >
         <h5 >'.$serves.'</h5>
        <p class="h3">'.$des.'</p>
        <p>عدد الساعات '.$hour.'</p>
       
      </div>
    </div>
  </div>
</a>
    ';
  }



   ?>
  

  
</div>

</div>




<div style="margin-top: 900px"></div>
<?php require "footer.php"; ?>
</body>
</html>