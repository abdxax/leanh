<?php
require "../connnect.php";
session_start();


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'header.php'; ?>

    <link href='../css/rotating-card.css' rel='stylesheet' />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
</head>
<body>

<?php require "header_p.php";?>
<div class="container">
<div style="width: 20px;height: 20px"></div>

  
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">

  <?php 
$sql=$connect->prepare("SELECT * FROM voluntarycomp where imagepath!=?");
$sql->execute(array(""));
foreach ($sql as $row) {
  $imgs=$row['imagepath'];
  $imgs=explode("../", $imgs);
$imj=$imgs[1];
$id_vol=$row['id'];
/*
  echo '
<div class="col-xs-6 col-md-3">
    <a href="detst.php?id='.$row['id'].'" class="thumbnail img-responsive" >
      <img src="'.$imj.'" alt="...">
    </a>

 </div>
  ';
  */
  $sql2=$connect->prepare("SELECT * FROM  pay_way WHERE id_voluntray=? ");
 $sql2->execute(array($id_vol));
$bankname="";
$bankaccount="";
$iban="";
$note="";
foreach ($sql2 as $rs) {
  $bankname=$rs['bankNmae'];
  $bankaccount=$rs['AccountNumber'];
  $iban=$rs['IBAN'];
  $note=$rs['descr'];
}


  echo '
       <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                             <img src="../rotating_card_thumb.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="'.$imj.'"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">'.$row['name_voluntray'].'</h3>
                                <p class="profession"></p>
                                <p class="text-center"></p>
                            </div>
                            <div class="footer">
                                <i class="fa fa-mail-forward"></i> تفاصيل 
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">'.$row['descri'].'</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">التواصل</h4>
                                <p class="text-center">الهاتف : '.$row['phone'].'</p>
                                <p class="text-center">البريد الالكترواني: '.$row['email'].'</p>
                                <h4 class="text-center">طرق التبرع </h4>
                                <p class="text-center">البنك: '.$bankname.'</p>
                                <p class="text-center">رقم الحساب: </p>
                                <p class="text-center">'.$bankaccount.'</p>
                                <p class="text-center">رقم الايبان: </p>
                                <p class="text-center">'.$iban.'</p>
                                

                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->  


  ';
}

  ?>
  

 
  <!--<div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <img src="..." alt="...">
    </a>
    
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <img src="..." alt="...">
    </a>
    
  </div>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <img src="..." alt="...">
    </a>
    
  </div>
  ...-->

















</div>
</div>
</div>








<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>



</body>
</html>