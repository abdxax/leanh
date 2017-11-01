<?php 
require "../connnect.php";
session_start();


 $sql=$connect->prepare("SELECT * FROM  requirestorder WHERE id=? ");
 $sql->execute(array($_GET['id']));
 $id_vol="";
 $imgpa="";
 $desc="";
 $name_vol="";
 $phone="";
 $account_bank="";
 $bank_name="";
 $IBAN="";
 $goal="";
 $have="";
 $id_empo="";
 $name_emp="";

 $id_or=$_GET['id'];
  foreach ($sql as $row) {
  	$id_vol=$row['id_voluntray'];
  	$desc=$row['des'];
  	$goal=$row['goal'];
  	$have=$row["havemo"];
  	$id_empo=$row['id_user'];
  }
$mon=$goal-$have;
  $sql2=$connect->prepare("SELECT * from voluntarycomp where id=?");
  $sql2->execute(array($id_vol));
  foreach ($sql2 as $res) {
  	$imgpa=$res['imagepath'];
  	$name_vol=$res['name_voluntray'];
  	$phone=$res['phone'];

  }

$imgpa=explode("../", $imgpa);
$imj=$imgpa[1];

  $sql2=$connect->prepare("SELECT * from pay_way where id_voluntray=?");
  $sql2->execute(array($id_vol));
  foreach ($sql2 as $res) {
  	$account_bank=$res['AccountNumber'];
  	$bank_name=$res['bankNmae'];
  	$IBAN=$res['IBAN'];

  }

  $sql2=$connect->prepare("SELECT * from user where id=?");
  $sql2->execute(array($id_empo));
  foreach ($sql2 as $res) {
  	$phone=$res['phone'];
  	$name_emp=$res['name'];
  	

  }


	 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require'header.php';?>
</head>
<body>
<?php require 'header_p.php';?>


<div class="container" style="margin-top: 91px">
	

	<div class="col-sm-4  col-md-offset-3">
		<img src=<?php echo $imj;  ?> class="img-responsive img-rounded center-block" style="width: 55%">

	</div>
	<div class="col-md-9 col-sm-9 col-xs-9 text-center h4">
		<?php echo $name_vol; ?>
	</div>
               





	<div class="col-md-4 col-sm-4  ">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="text-center h5"> رقم الحاله : <?php echo $id_or; ?></div>
			</div>
			<div class="panel-body text-center">
				<div class="h3">وصف الحاله : </div>
				<div class="h6"><?php echo $desc; ?></div>
				<div class="h3">المبلغ المطلوب :</div>
				<div class="h6"><?php echo $goal; ?></div>
				<div class="h3">المبلغ المجموع</div>
				<div class="h6"><?php echo $have; ?></div>
				<div class="h3">المتبقي</div>
				<div class="h6"><?php echo $mon; ?></div>
			</div>
		</div>
	</div>









	<!--<div class="col-md-6"></div>-->
       <div class="col-md-8 col-sm-8 ">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="text-center h5"> طريقة التبرع</div>
			</div>
			<div class="panel-body text-center">
				<table class="table">
					<tr>
						<th>البنك : </th>
						<td><?php echo $bank_name; ?></td>
					</tr>
					<tr>
						<th>رقم الحساب : </th>
						<td><?php echo $account_bank; ?></td>
					</tr>
					<tr>
						<th>رقم الايبان :  </th>
						<td><?php echo $IBAN; ?></td>
					</tr>

					</table>

					
<h4 class="text-center">طريقة الدفع </h4>
  <pre> ارسال رسالة واتس اب بصورة الايصال و رقم الحاله الى : <?php echo $phone; ?></pre>
  <pre> تم النشر بواسطة  : <?php echo $name_emp; ?></pre>
			</div>
		</div>
	</div>

	<!--<div class="jumbotron col-md-5">
  <h4 class="text-center">طريقة الدفع </h4>
  <pre> ارسال رسالة واتس اب بصورة الايصال و رقم الحاله الى : <?php echo $phone; ?></pre>
  <pre> تم النشر بواسطة  : <?php echo $name_emp; ?></pre>
 
</div>-->

</div>

<?php

echo '


<script type="text/javascript">
window.randomize = function() {
	$(".ko-progress-circle").attr("data-progress", 70);
}
setTimeout(window.randomize, 200);

</script>


';


 ?>

 <script type="text/javascript">
 	
window.randomize = function() {
	$('.ko-progress-circle').attr('data-progress', 70);
}
setTimeout(window.randomize, 200);
 </script>



 <?php require "footer.php"; ?>
</body>
</html>