 require 'PHPMailer-master/PHPMailerAutoload.php';
$succmsg="";
 
if(isset($_POST['place_order'])) {
 $userid=$_SESSION['user_id'];
  $qry="SELECT * FROM user WHERE id='$userid'";
   
$result=mysqli_query($db,$qry);
  $row = $result->fetch_assoc();  

$useremail=$row['email'];
$username=$row['username'];
$usercity=$row['city'];
$usermobile=$row['mobile'];
//$email="info@ymama.ps";
$email=" @gmail.com";

$mail = new PHPMailer;
 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = ' @gmail.com';
$mail->Password = ' ';
$mail->SMTPSecure = 'tls';
 
$mail->From = ' @gmail.com';
$mail->FromName = 'AsawerShop Orders';
$mail->addAddress($email , 'Meet This Order From AsawerShop');
 
$mail->addReplyTo($email , 'Meet This Order From AsawerShop');
 
$mail->WordWrap = 50;
$mail->isHTML(true);
 
 


$mail->Subject = 'Meet This Order From AsawerShop';
$mail->Body    = " ";
 
if(!$mail->send()) {
   echo 'Try again , your order not sent..';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
$succmsg = 'Your order has been met..';
