<?php require "../connnect.php";
$msg="";
if (isset($_POST['saveord'])) {
  $name=strip_tags($_POST['name']);
  $phone=strip_tags($_POST['phone']);
  $location=strip_tags($_POST['location']);
  $descs=strip_tags($_POST['descs']);
  $nameap=strip_tags($_POST['applayname']);
  $phoneapl=strip_tags($_POST['applayphone']);
  $da=date("Y-m-d h:i:sa");
  $res=$connect->prepare("INSERT INTO requirestorder(name_applay,
phone_applay,name_po,phone_po,des,location,dates,status,type) VALUES (?,?,?,?,?,?,?,?,?) ");
  if ($res->execute(array($nameap,$phoneapl,$name,$phone,$descs,$location,$da,"new","Personal"))){
     header('location:index.php?msg=done');  
  }
  
  else{
    header('location:index.php?msg=error');
  }



}

if (isset($_POST['savehelp'])){
  $name=strip_tags($_POST['name']);
  $phone=strip_tags($_POST['phone']);
   $descs=strip_tags($_POST['descs']);
   $sql=$connect->prepare("INSERT INTO family(name,phone,des,type) VALUES (?,?,?,?)");
   if ($sql->execute(array($name,$phone,$descs,"waiting"))){
    header('location:index.php?msg=done');

   }
   else{
     header('location:index.php?msg=error');
   }
}


?>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top   colo">


     <ul class="nav navbar-nav">
       <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> الصفحة الرئيسية</a></li>
       <li class="nav-item"><a href="#" data-toggle="modal" data-target="#Adds" class="nav-link"><i class="glyphicon glyphicon-plus"></i> رفع طلب </a></li>
       <li class="nav-item"><a href="display.php" class="nav-link"><i class="glyphicon glyphicon-heart"></i> الجمعيات المشاركة</a></li>
       <li class="nav-item"><a href="word.php" class="nav-link"><i class="glyphicon glyphicon-book"></i> كلمات محفزة</a></li>
      <!-- <li ><a href="allstatics.php">احصائياتنا</a></li> -->
      <li class="nav-item"><a href="helps.php" class="nav-link"><i class="glyphicon glyphicon-briefcase"></i> زاوية المبادرات</a></li>
       <li class="nav-item"><a href="#"  data-toggle="modal" data-target="#Addshelp" class="nav-link"><i class="glyphicon glyphicon-leaf"></i> تفريج كربة اسر السجناء </a></li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="glyphicon glyphicon-question-sign"></i> من نحن</a></li>
      
       </ul>
 





       
      
      







	<!--<form class="form-inline " style="margin-top: 6px" action="check.php" method="POST"> 
	<div class="col-md-offset-1">
		<input type="text" name="email" class="form-control" placeholder="ادخل الايميل ">
		<input type="password" name="pass" class="form-control" placeholder="ادخل الرقم السري">
		<input type="submit" name="login"  class="btn btn-info" value="تسجيل دخول">
	</div>
		
	</form>-->
	</nav>
	<div id="Adds" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">اضافة حالة انسانيه</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="name" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="phone" class="form-control" required>
              </div>
            </div>

            

            <div class="form-group">
              <label class="col-md-2 control-label">المكان</label>
              <div class="col-md-7">
                <input type="text" name="location" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">وصف الحاله</label>
              <div class="col-md-7">
                <textarea name="descs" rows="8" class="form-control" required></textarea>
              </div>
            </div>

            <p class="h3 text-center"> بيانات رافع الطلب </p>
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="applayname" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="applayphone" class="form-control" required>
              </div>
            </div>
                       </div>
                       <div class="modal-footer">
                       <input type="submit" name="saveord" class="btn btn-success" value="حفظ">
                         <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
</form>
                         
                       </div>
      </div>
    </div>
  </div>
    





<div id="Addshelp" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">تفريج كربة</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="name" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="phone" class="form-control" required>
              </div>
            </div>

            

            
            <div class="form-group">
              <label class="col-md-2 control-label">وصف الحاله</label>
              <div class="col-md-7">
                <textarea name="descs" rows="8" class="form-control" required></textarea>
              </div>
            </div>

            
                       </div>
                       <div class="modal-footer">
                       <input type="submit" name="savehelp" class="btn btn-info" value="حفظ">
                         <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
</form>
                         
                       </div>
      </div>
    </div>
  </div>




	<!--<header class="visible-xs visible-sm">
<nav class="navbar navbar-default  colo">
<div class="navbar-header pull-right">
      <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <!-- <a class="navbar-brand" href="#">Brand</a> 
    </div>

	
	<!--<a href="#" class="navbar-brand pull-right dropdown-toggle " data-toggle="dropdown">حسابي
     <ul class="dropdown-menu">
     <li><a href="#">qqq</a></li>
     	

     </ul>

	</a>
	-->
	 <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		<ul class="nav navbar-nav">
		<li><a href="index.php">الصقحة الرئيسيه</a></li>
		<li><a href="index.php">تسجيل دخول</a></li>
    	 <li ><a href="adds.php" >رفع حالة انسانيه </a></li>
    	 <li ><a href="display.php">الجعيات المشاركه</a></li>
    	 <li ><a href="word.php">كلمات محفزة</a></li>
    	<!-- <li ><a href="allstatics.php">احصائياتنا</a></li> -->
    <!--	 <li ><a href="#">من نحن</a></li>
		</ul>
		</div>
	</nav>



<!--<div id="Adds" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">اضافة حالة انسانيه</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST">
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="name" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="phone" class="form-control">
              </div>
            </div>

            

            <div class="form-group">
              <label class="col-md-2 control-label">المكان</label>
              <div class="col-md-7">
                <input type="text" name="location" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">وصف الحاله</label>
              <div class="col-md-7">
                <textarea name="descs" rows="8" class="form-control"></textarea>
              </div>
            </div>

            <p class="h3 text-center"> بيانات رافع الطلب </p>
            <div class="form-group">
              <label class="col-md-2 control-label">الاسم</label>
              <div class="col-md-7">
                <input type="text" name="applayname" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="applayphone" class="form-control">
              </div>
            </div>
                       </div>
                       <div class="modal-footer">
                       <input type="submit" name="saveord" class="btn btn-success" value="حفظ">
                         <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
</form>
                         
                       </div>
      </div>
    </div>
  </div>
</div>
	-->
</header>