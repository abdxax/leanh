<?php
require "../../connnect.php";

 /*$sql=$connect->prepare("SELECT * FROM requirestorder WHERE status=?");
             $sql->execute(array("new"));
                $num=$sql->rowCount();
                */
 ?>

<header>
	<nav class="navbar navbar-default navbar-static-top">
	<!--<a href="#" class="navbar-brand pull-right dropdown-toggle " data-toggle="dropdown">حسابي
     <ul class="dropdown-menu">
     <li><a href="#">qqq</a></li>
     	

     </ul>

	</a>
	-->
		<ul class="nav navbar-nav">
		<li><a href="index.php">الصفحة الرئيسيه</a></li>
			<li class="dropdown" >
				<a href="#" class="navbar-brand  dropdown-toggle " data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
				<ul class="dropdown-menu">
					<!--<li><a href="#">تعديل البيانات</a></li>-->
					<li><a href="#">تسجيل خروج</a></li>
					
				</ul>
			</li>
			
			<li><a href="dispalyorder.php">

<button class="btn btn-info" type="button">
  الحالات <span class="badge"><?php //echo $num; ?></span>
</button>
</a>
</li>
			<li><a href="support.php">تواصل مع الدعم الفني </a></li>
		</ul>
	</nav>

	
</header>