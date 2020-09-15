<?php
session_start();
$conn=mysqli_connect('localhost','root','','game_shop')or die(mysqli_connect_error());
$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error($database));
$name=$_POST['name'];

$error=false;


if (!ctype_alpha($name) ){
		
		$_SESSION['pname_error']=" Please input vaild name !";
		$error=true;
		header("location:payment.php");
}


?>