<?php
$conn=mysqli_connect('localhost','root','','game_shop')or die(mysqli_connect_error());
$email=$_POST['mail2'];
$sql="SELECT uid,firstname,email,password FROM user WHERE email='$email'";
$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';

$mail = new PHPMailer(TRUE);

if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_array($result);
	$token=md5($row['uid'].$row['password']);
	$time = time();
	$url="http://localhost:82/practice/reset.php?email=".$email."&time=".$time."&token=".$token;
	try {
   
   $mail->setFrom('gameshoplove@gmail.com', 'tony wu');
   $mail->addAddress($email, 'guest');
   $mail->Subject = 'Reset Password';
   $mail->isHTML(true);
   $mail->Body = 'Dear '.$row['firstname'].":<br/><br/><br/><br/> please click the link below to reset password, beware this link will expired within 1hour.<br/><br/><a href='".$url."'target='_blank'>".$url."</a>";
   
   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->SMTPDebug=2;
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.gmail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';
   
   /* SMTP authentication username. */
   $mail->Username = 'gameshoplove@gmail.com';
   
   /* SMTP authentication password. */
   $mail->Password = 'gameshoplove520';
   
   /* Set the SMTP port. */
   $mail->Port = 587;
   
   /* Finally send the mail. */
   $mail->send();
  
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}

	
		 
	
}
else{
	echo 'noreg';

	//$_SESSION["email_unfound"]="Sorry, looks like this Email have not been enrolled yet, please input correct Email address to try it again. ";
	 //header("location:loginform.php");
}





?>