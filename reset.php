<?php

include 'header.html';
$past_time=$_GET['time'];
$email=$_GET['email'];
$conn=mysqli_connect('localhost','root','','game_shop')or die(mysqli_connect_error());
$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error());
$token=$_GET['token'];
$email=$_GET ['email'];
$sql="SELECT * FROM user WHERE email='$email'";
$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
if($row){
	$mt=md5($row['UID'].$row['password']);
	if($mt==$token){
		if(time()-$past_time>10*60){
	header("location:link_expired.php");
	}
	else{
		if(isset($_POST['submit'])){
	$error=false;	
	$new_p=$_POST['new_p'];
	$confirm_p=$_POST['confirm_p'];
	if(strlen($new_p)<'8'){
		
		 $_SESSION['error_message']="Your Password Must Contain At Least 8 Characters!";
		 $error=true;
		 
	}
	if(!preg_match("#[0-9]+#",$new_p)){
		$_SESSION['error_message']="Your Password Must Contain At Least 1 Number!";
		$error=true;
	
	}
	if($new_p!=$confirm_p){
		$_SESSION['error_message']="Password not match!";
		$error=true;
		
	}
		if($error==false){
			
			$update_sql="UPDATE user SET password= '$new_p' WHERE email='$email'";
			if(mysqli_query($conn,$update_sql))
		{
			header("location:home.php");
		}
		else{
			die('ERROR'. mysqli_error($conn));
		}
			
			
		}
	}
		
	}
	}
	else{
		$_SESSION['error_message']='Invaild link';
		//header("location:mterro.php?$mt");
	}
	
	
	
}
else{
	$_SESSION['error_message']='database error, please contact our supporter for help';
	//header("location:rowerror.php");
}

?>
<div style="margin-top:100px ;" class="container ">
<div class="row">

<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action= "<?php echo "reset.php?email=$email&time=$past_time&token=$token";?>  "method="post" >    
        <h2 class="text-center">Reset Password</h2>       
        <div class="form-group">
            <input type="password" class="form-control" placeholder="new Password" name="new_p"required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" placeholder="confirm Password" name="confirm_p" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
        </div>
            	<?php
		if(isset($_SESSION["error_message"])){
			
			$errorm=$_SESSION["error_message"];
			echo"<span class=\"error\">$errorm</span>";
		}
          
          ?>  
    </form>

</div>
  </div>
</div>
<?php 
unset($_SESSION["error_message"]);
?>