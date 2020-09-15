<?php
session_start();
$conn=mysqli_connect('localhost','root','') or die(mysqli_connect_error());
$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error($database));

$firstname=$_POST ['firstname'];
$lastname=$_POST ['lastname'];
$email=$_POST ['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$insert_sql="INSERT INTO user(firstname, lastname,email,password) VALUES('$firstname','$lastname','$email','$password')" ;
$match_sql="SELECT email FROM user WHERE email='$email' ";
$match_result=mysqli_query($conn,$match_sql);
$error=false;


	if (!ctype_alpha($firstname) || (!ctype_alpha($lastname))){
		
		$_SESSION['alpha_error']=" Please input vaild name !";
		$error=true;
		header("location:signupform.php");
	}

	if(strlen($password)<'8'){
		
		 $_SESSION['short_error']="Your Password Must Contain At Least 8 Characters!";
		 $error=true;
		 header("location:signupform.php");
	}
	if(!preg_match("#[0-9]+#",$password)){
		$_SESSION['num_error']="Your Password Must Contain At Least 1 Number!";
		$error=true;
		header("location:signupform.php");
	}
	if($password!=$confirm_password){
		$_SESSION['match_error']="Password not match!";
		$error=true;
		header("location:signupform.php");
	}
	if(mysqli_num_rows($match_result)>0){
		$_SESSION['email_error']="The Email has already be used!";
		$error=true;
		header("location:signupform.php");
		}
		
	if($error==false){
		if(mysqli_query($conn,$insert_sql))
		{
			header("location:home.php");
		}
		else{
			die('ERROR'. mysqli_error($conn));
		}
		
		
	}
	
	


mysqli_close($conn);
?>