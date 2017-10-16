<?php
require "../../connnect.php";
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['pass'])==true){
	$sql=$connect->prepare("SELECT * FROM userall WHERE email=? AND password=?");
	$sql->execute(array($_SESSION['email'],$_SESSION['pass']));
	if ($sql->rowCount()==1){
         $sql2=$connect->prepare("SELECT * FROM voluntarycomp WHERE email=? AND password=?");
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
<!--<div style="height: 55px;width: 55px;"> </div>-->
<!--<aside>
	<div class="col-sm-2">
		<ul class="nav navbar-default" style="height: 650px">
			<li>aax</li>
			<li>aax</li>
			<li>aax</li>
			<li>aax</li>
		</ul>
	</div>
</aside>
-->
<div class="container">
	
		<img src=<?php echo $_SESSION['img']; ?> class="img-responsive center-block  img-circle" style="width: 18%;height: 18%;margin-top: 10px;">

		<p class="text-center">Lasr log in is </p>

		<section>
			<div class="col-sm-9 col-sm-offset-2">
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
                    $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? " );
             $sql->execute(array($_SESSION['id']));
                $num=$sql->rowCount();

                $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? AND status=?");
             $sql->execute(array($_SESSION['id'],'Done'));
                $num2=$sql->rowCount();

                $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? AND status=?");
             $sql->execute(array($_SESSION['id'],'waiting'));
                $num3=$sql->rowCount();

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

			<?php 

                 $sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? AND status=?");
             $sql->execute(array($_SESSION['id'],'Done'));
                $num2=$sql->rowCount();


$sql=$connect->prepare("SELECT * FROM requirestorder WHERE id_voluntray=? ");
             $sql->execute(array($_SESSION['id']));
                $all=$sql->rowCount();

                $result="";

                if ($all==0){
                  $result=0;
                }
                else{
                  $result=($num2/$all)*100;
                }



			?>
				<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result."%";?>">
    <?php echo $result; ?>
  </div>
</div>
			</div>
		</section>
	
</div>


</div>
</body>
</html>