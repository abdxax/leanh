<?php require "../connnect.php";
if (isset($_POST['saveord'])) {
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $location=$_POST['location'];
  $descs=$_POST['descs'];
  $nameap=$_POST['applayname'];
  $phoneapl=$_POST['applayphone'];
  $da=date("Y-m-d h:i:sa");
  $res=$connect->prepare("INSERT INTO requirestorder(name_applay,
phone_applay,name_po,phone_po,des,location,dates,status) VALUES (?,?,?,?,?,?,?,?) ");
  if ($res->execute(array($nameap,$phoneapl,$name,$phone,$descs,$location,$da,"new"))){
     // echo "Done";         
  }
  
  else{
   // echo "error";
  }



}




?>

<div style="height: 50px;width: 50px;"></div>
<aside>
	<div class="col-md-2 hidden-sm hidden-xs ">
    
    <ul class="nav navbar navbar-default ml-auto colo" style="height:1460px;">
    <li><a href="index.php">الصقحة الرئيسيه</a></li>
    	 <li class="nav-item"><a href="#" data-toggle="modal" data-target="#Adds" class="nav-link">رفع حالة انسانيه </a></li>
    	 <li class="nav-item"><a href="display.php" class="nav-link">الجعيات المشاركه</a></li>
    	 <li class="nav-item"><a href="word.php" class="nav-link">كلمات محفزة</a></li>
    	<!-- <li ><a href="allstatics.php">احصائياتنا</a></li> -->
    	 <li class="nav-item"><a href="#" class="nav-link">من نحن</a></li>
       </ul>
	 </div>

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





</aside>
