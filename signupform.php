<?php
//session_start();
include 'header.html';
?>
<body>
<div  style="margin-top:100px ;margin-bottom:80px"class="container">
 <div class="row"  >
 <div style="border: 2px solid gray;"class="col-4 offset-4">
<div class="signup-form" >
    <form style="margin-top:25px; "action="signup.php" method="post">
		<h2>Sign Up</h2>
		<p>It's free and only takes a minute.</p>
		<hr>
        <div class="form-group">
			<label>First name</label>
        	<input type="text" class="form-control" name="firstname" required="required">
        </div>
		<?php
					if(isset($_SESSION["alpha_error"])){
                        $error = $_SESSION["alpha_error"];
                        echo "<span class=\"error\">$error</span><br><br>";
                    }
					?>
		<div class="form-group">
			<label>Last name</label>
        	<input type="text" class="form-control" name="lastname" required="required">
        </div>
        <div class="form-group">
			<label>Email Address</label>
        	<input type="email" class="form-control" name="email" required="required">
			   
        </div>
		<?php
					if(isset($_SESSION["email_error"])){
                        $error = $_SESSION["email_error"];
                        echo "<span class=\"error\">$error</span>";
                    }
              ?> 
		
		<div class="form-group">
			<label>Password</label>
            <input type="password" class="form-control" name="password" required="required">
        </div>
		<?php
					
                    if(isset($_SESSION["short_error"])){
                        $error = $_SESSION["short_error"];
                        echo "<span class=\"error\">$error</span><br><br>";
                    }
					 if(isset($_SESSION["num_error"])){
                        $error = $_SESSION["num_error"];
                        echo "<span class=\"error\">$error</span><br><br>";
                    }
					
                ?> 
		<div class="form-group">
			<label>Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" required="required">
        </div>
		<?php
		if(isset($_SESSION["match_error"])){
                        $error = $_SESSION["match_error"];
                        echo "<span class=\"error\">$error</span><br><br>";
                    }
		?>			
		<div class="form-group">
            <button type="submit" class="btn btn-info btn-block btn-lg">Sign Up</button>
        </div>
		<p class="small text-center">By clicking the Sign Up button, you agree to our <br><a href="#">Terms &amp; Conditions</a>, and <a href="#">Privacy Policy</a></p>
    </form>
	
</div>
</div>
</div>
</div>
</body>
</html>
<?php
	//include'footer.html';
	unset($_SESSION["alpha_error"]);
    unset($_SESSION["short_error"]);
	unset($_SESSION["num_error"]);
	unset($_SESSION["match_error"]);
	unset($_SESSION["email_error"]);
?>