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



$sq=$connect->prepare("SELECT * FROM user WHERE email=?");
$sq->execute(array($_SESSION['emailu']));
$id_user='';
$id_val="";
$name_val="";
$name_ap="";
$phone_ap="";
$msg="";
  foreach ($sq as $row) {
    $id_user=$row['id'];
    $id_val=$row['id_voluntary'];
    $name_val=$row['name'];
    $phone_ap=$row['phone'];

  }
if (isset($_GET['id'])){

//////////////////////////
	$sq=$connect->prepare("UPDATE requirestorder SET status=?,id_voluntray=?,id_user=?,name_voluntray=? WHERE id=?");
	if ($sq->execute(array("waiting",$id_val,$id_user,$_SESSION['user'],$_GET['id']))){
 $msg='<div class="alert alert-success text-center">تم التحديث بنجاح</div>';
	}
}

if(isset($_GET['id_accept'])){
$sq=$connect->prepare("UPDATE requirestorder SET status=? WHERE id=?");
  if ($sq->execute(array("accept",$_GET['id_accept']))){
$msg='<div class="alert alert-success text-center">تم التحديث بنجاح</div>';

  }
}

if (isset($_GET['id_Done'])){
  $sq=$connect->prepare("UPDATE requirestorder SET status=? WHERE id=?");
  if ($sq->execute(array("Done",$_GET['id_Done']))){
    $msg='<div class="alert alert-success text-center">تم التحديث بنجاح</div>';

  }
}



//validaion needs
     if (isset($_GET['saveord'])){
         $name=$_GET['namepor'];
         $phone=$_GET['phonepor'];
         $lcation=$_GET['locationpor'];
         $comm=$_GET['descs'];
         $goal=$_GET['goal'];
         $have=$_GET['have'];
         $sql=$connect->prepare("INSERT INTO requirestorder (id_user,id_voluntray 
,name_voluntray,name_applay,phone_applay,name_po,phone_po,des,status,location,goal,havemo,Type)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
         if ($sql->execute(array($id_user,$id_val,$name_val,$name_ap,$phone_ap,$name,$phone,$comm,'accept',$lcation,$goal,$have,"Personal"))){
                 $msg='<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
         }
         else{
          $msg='<div class="alert alert-danger text-center">الحالة موجوده مسبقا</div>';
         }



     } 
     else{
      
     }
  
if (isset($_GET['saveprog'])){
 //  $name=$_GET['namepor'];
        // $phone=$_GET['phonepor'];
        // $lcation=$_GET['locationpor'];
         $comm=$_GET['descs'];
         $goal=$_GET['goal'];
         $have=$_GET['have'];
         $sql=$connect->prepare("INSERT INTO requirestorder (id_user,id_voluntray 
,name_voluntray,name_applay,phone_applay,des,status,goal,havemo,Type)VALUES (?,?,?,?,?,?,?,?,?,?)");
         if ($sql->execute(array($id_user,$id_val,$name_val,$name_ap,$phone_ap,$comm,'accept',$goal,$have,"investment"))){
                 $msg='<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
         }
         else{
          $msg='<div class="alert alert-danger text-center">الحالة موجوده مسبقا</div>';
         }


}
//echo $id_val;


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require'header.php';?>
</head>
<body>
<?php require 'header_pa.php';
echo $msg;
?>
 <div class="container">
 <div class="col-sm-6 col-sm-offset-5">
 	<a href="#" data-toggle="modal" data-target="#help" class="btn btn-info "><i class="glyphicon glyphicon-plus"></i>اضافة حالة </a>
    <a href="#" data-toggle="modal" data-target="#addprog" class="btn btn-info "><i class="glyphicon glyphicon-plus"></i>اضافة فرصة استثمارية </a>

 	<div id="help" class="modal fade" role="dialog">
 		<div class="modal-dialog">
 			<div class="modal-content">
 				<div class="modal-header">
 				  <button type="button" class="close" data-dismiss="modal">&times;</button>
 					<p class="modal-title text-center h3">اضافة حالة </p>
 				</div>
 				<div class="modal-body">
 					<form class="form-horizontal">
 						<div class="form-group">
 							<label class="col-md-2 control-label">الاسم</label>
 							<div class="col-md-7">
 								<input type="text" name="namepor" class="form-control">
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="col-md-2 control-label">رقم الجوال</label>
 							<div class="col-md-7">
 								<input type="text" name="phonepor" class="form-control">
 							</div>
 						</div>

 						

 						<div class="form-group">
 							<label class="col-md-2 control-label">المكان</label>
 							<div class="col-md-7">
 								<input type="text" name="locationpor" class="form-control">
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="col-md-2 control-label">وصف الحاله</label>
 							<div class="col-md-7">
 								<textarea name="descs" rows="5" class="form-control" ></textarea>
 							</div>
 						</div>
                   

                   <div class="form-group">
              <label class="col-md-2 control-label">المبلغ المراد</label>
              <div class="col-md-7">
                <input type="number" name="goal" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">المبلغ المحصل</label>
              <div class="col-md-7">
                <input type="number" name="have" class="form-control">
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



<div id="addprog" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p class="modal-title text-center h3">اضافة فرصة استثمارية </p>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="form-group">
             <!-- <label class="col-md-2 control-label">اسم البرنامج </label>
              <div class="col-md-7">
                <input type="text" name="namepor" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">رقم الجوال</label>
              <div class="col-md-7">
                <input type="text" name="phonepor" class="form-control">
              </div>
            </div>-->

            

          <!--  <div class="form-group">
              <label class="col-md-2 control-label">المكان</label>
              <div class="col-md-7">
                <input type="text" name="locationpor" class="form-control">
              </div>
            </div>-->

            <div class="form-group">
              <label class="col-md-2 control-label">وصف الحاله</label>
              <div class="col-md-7">
                <textarea name="descs" rows="5" class="form-control" ></textarea>
              </div>
            </div>
                   

                   <div class="form-group">
              <label class="col-md-2 control-label">المبلغ المراد</label>
              <div class="col-md-7">
                <input type="number" name="goal" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">المبلغ المحصل</label>
              <div class="col-md-7">
                <input type="number" name="have" class="form-control">
              </div>
            </div>

                       </div>

                       <div class="modal-footer">
                        
                        <input type="submit" name="saveprog" class="btn btn-success" value="حفظ">
                         <button type="button" class="btn btn-default " data-dismiss="modal">اغلاق</button>
</form>
                       </div>

          
        
      </div>
    </div>
  </div>
 </div>



 	<div class="col-xs-10 col-sm-offset-1">
 		<table class="table">
 			<thead>
 			<tr>
 				<th></th>
 				<th>الاسم </th>
 				<th>الحالة  </th>
 				<th>رقم الجوال</th>
 				<th>رقم الحاله</th>
 				<th>الوصف</th>
        <th>المبلغ المطلوب</th>
        <th>المحصول</th>
 				<th>اسم رافع الطلب</th>
 				<th>رقم جوال رافع الطلب</th>

 				
 			</tr>
 			
 			</thead>
 			<tbody>
 				<?php
$sql=$connect->prepare("SELECT * FROM requirestorder WHERE status =? OR id_user=?");
             $sql->execute(array("new",$id_user));
           $su="";
           $ids='';
             foreach ($sql as $row) {
             if ($row['status']=="new"){
             	$su='<a href=dispalyorder.php?id='.$row['id'].' class="btn btn-info">تحقق</a>';
             }
             else if ($row['status']=="waiting"){
             	$su='<a href=# class="btn btn-warning" data-toggle="modal" data-target="#acce">قبول</a> <a href=# class="btn btn-danger" data-toggle="modal" data-target="#res">رفض</a>';
              $ids=$row['id'];
             }
             else if ($row['status']=="accept"){
              $su='<a href="info_ord.php?ids='.$row['id'].'" class="btn btn-success">تحديث</a>';
             }
             else if ($row['status']=="Done"){
              $su='<i class="glyphicon glyphicon-ok "><i>';
             }
             else if ($row['status']=="not accept"){
              $su='<i class="glyphicon glyphicon-remove "><i>';
             }


             	echo '
                      <tr>
                       <td></td>
                       <td>'.$row['name_po'].'</td>
                       <td>'.$su.'</td>
                       <td>'.$row['phone_po'].'</td>
                       <td>'.$row['id'].'</td>
                        <td>'.$row['des'].'</td>
                        <td>'.$row['goal'].'</td>
                        <td>'.$row['havemo'].'</td>
                       <td>'.$row['name_applay'].'</td>
                       <td>'.$row['phone_applay'].'</td>



                      </tr>
                      


             	';
             }




 				 ?>
 			</tbody>
 		</table>

    <div class="modal fade" id="res" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">سبب الرفض</h4>
      </div>

      <div class="modal-body">
        <form>
        <div class="form-group">
          <div class="col-md-8">
            <input type="text" name="res" class="form-control">
          </div>

        </div>
      </div>

      <div class="modal-footer">
      <input type="submit" name="reson" class="btn btn-danger" value="رفض ">
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        
        
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="acce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">قبول الحالة</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">المبلغ المطلوب</label>
            <input type="number" class="form-control" id="recipient-name" name="goal">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">المبلغ المحجموع</label>
          <input type="number" class="form-control" id="message-text" name="have">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        <input type="submit" name="saveorda" class="btn btn-success" value="حفظ">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="dones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تحديث المبلغ</h4>
      </div>
      <div class="modal-body">
        <form>
          
          <div class="form-group">
            <label for="message-text" class="control-label">المبلغ المحجموع</label>
          <input type="number" class="form-control" id="message-text" name="havem">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        <input type="submit" name="updatetsta" class="btn btn-success" value="حفظ">
        </form>
      </div>
    </div>
  </div>
</div>

 	</div>
 </div>
</body>
</html>

<?php 

if(isset($_GET['reson'])){
      
        $sq=$connect->prepare("UPDATE requirestorder SET status=?,resoun=? WHERE id=?");
  if ($sq->execute(array("not accept",strip_tags($_GET['res']),$ids))){
 $msg='<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
 header("location:dispalyorder.php?msg=".$msg."");
  }
  else{
    $msg='<div class="alert alert-danger text-center">يوجد مشكله تواصل مع الدعم الفني </div>';
 header("location:dispalyorder.php?msg=".$msg."");
  }
}

if(isset($_GET['saveorda'])){
  $sq=$connect->prepare("UPDATE requirestorder SET status=?,goal=?,havemo=? WHERE id=?");
  if ($sq->execute(array("accept",strip_tags($_GET['goal']),strip_tags($_GET['have']),$ids))){
 $msg='<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
 //header("location:dispalyorder.php?msg=".$msg."");
  }
  else{
    $msg='<div class="alert alert-danger text-center">يوجد مشكله تواصل مع الدعم الفني </div>';
 //header("location:dispalyorder.php?msg=".$msg."");
  }
  }

if (isset($_GET['updatetsta'])) {
  echo $_GET['havem'];
  $sql=$connect->prepare("UPDATE requirestorder SET status=:st,havemo=:ha WHERE id=:id");
  if ($sql->execute(array(':st'=>"accept",':ha'=>strip_tags($_GET['havem']),':id'=>$ids))){
 $msg='<div class="alert alert-success text-center">تم اضافة الحالة بنجاح</div>';
 //header("location:dispalyorder.php?msg=".$msg."");
  }
 
}




?>