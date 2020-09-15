
<?php
session_start();
$conn=mysqli_connect('localhost','root','','game_shop')or die(mysqli_connect_error());
$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error());

$email=$_POST ['email'];
$password=$_POST['password'];
$sql="SELECT email,password,firstname FROM user WHERE email='$email' AND password= '$password'";

$result=mysqli_query($conn,$sql);
if(isset($_POST['submit'])){
if ($result)
{
	
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_array($result);
		$_SESSION['loged_in']='';
		$_SESSION['user_name']=$row['firstname'];
		header("location:home.php");
		
	}
	else
	{
		
		$_SESSION['match_error']='The username or password is incorrect';
		header("location:loginform.php");
	}
}
else
  {
  die('Error: ' . mysqli_error($conn));
  }
}
mysqli_close($conn);



?>