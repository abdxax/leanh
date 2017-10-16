<?php 
try{

$connect=new PDO('mysql:host=localhost;dbname=helping_peopel;charset=utf8','root','');


}

catch(Exception $e){
	echo $e->getMessage();
}



?>