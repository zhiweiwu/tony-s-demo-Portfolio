<?php
session_start();
$cookie = stripslashes ( $_COOKIE ['Cart'] ); //去除addslashes添加的反斜杠
$cartinfo = unserialize ( $cookie );//反序列化cookie
?>

<?php
	
if(!isset($_SESSION["loged_in"])){
	header("location:loginform.php");
	
	
	
}
else{
  if (!empty($cartinfo)){
    header("location:payment.php");
	;
}
  else{
	  
	 header("location:home.php"); 
  }
}
	?>
	
}