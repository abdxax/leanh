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
<div class="container" style="margin-top: 60px">
<div style="width: 20px;height: 20px"></div>
	<div class="row">
      <div class="col-sm-10 col-sm-offset-1">
  <?php
  $des="";
  $pos="";
  $name="";
  $sql=$connect->prepare("SELECT * FROM words");
  $sql->execute();
  foreach ($sql as $row) {
     $imgs=$row['imagepath'];
     $des=$row['des'];
     $pos=$row['postion'];
     $name=$row['name'];

$imgs=explode("../", $imgs);
$imj=$imgs[1];
   /* echo '

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    
      <img src="'.$imj.'" class="img-responsive col-sm-11 center-block">
    
     
      <div class="caption ">
        
        <p class="h3 ">'.$des.'</p>
        <p>'.$name.'</p>
        <p>'.$pos.'</p>
      </div>
    </div>
  </div>

    ';
    */
  
echo '

<div class="col-md-4 col-sm-6">
             <div class="card-container manual-flip">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            
                        </div>
                        <div class="user">
                            <img class="img-circle" src="'.$imj.'"/>
                        </div>
                        <div class="content">
                            <div class="main">
                               
                                <h3 class="name">'.$name.'</h3>
                                <p class="profession">'.$pos.'</p>
                                 <p class="text-center"></p>
                            </div>
                            <div class="footer">
                                <button class="btn btn-simple" onclick="rotateCard(this)">
                                    <i class="fa fa-mail-forward"></i> كلمات محفزة 
                                </button>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header ">
                             <img src="../lenh2.png" class="img-responsive col-sm-5"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">'.$des.'</h4>
                                

                                

                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                <i class="fa fa-reply"></i> الرجوع
                            </button>
                            <div class="social-links text-center">
                               
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->




';
}

   ?>
  













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