<?php


include 'header.html';
?>

<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/check_email.js"></script>


<!------ Include the above in your HEAD tag ---------->

<div style="margin-top:100px ;" class="container ">
  
  <div class="row">
 
    
    <div  style="border: 2px solid gray;padding :50px 15px; "class="col-md-4 offset-4">
  
        <form method="post" action="login.php" role="login">
		<h2> LOG IN </h2>
		<hr>
		
        Username:  <input type="email" name="email" placeholder="Email"  class="form-control input-lg" required="" />
          
        Password:  <input type="password" name="password" placeholder="Password" class="form-control input-lg" id="password" required="" />
		<?php
		if(isset($_SESSION["match_error"])){
			
			$error=$_SESSION["match_error"];
			echo"<span class=\"error\">$error</span>";
		}
          
          ?>
         <br>
          
          
          <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
		  </form>
          <br>
            <a href="signupform.php">Don't have an account?</a> <br> <a href="#" data-toggle="modal" data-target="#require_email">Forgot password?</a>
			
			<div class="modal fade" id="require_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Forgot Password?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	
       <label> please enter your Username below:</label>
	   
	  <input id="email" type="email" name="email" class="col-sm-12 form-control" placeholder="Email"  required="" /><span id="check_msg"></span>
 <br/>
    
      <div class="modal-footer">
	  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		
        <button id="email_send" type="button" name="submit"class="btn btn-primary">Send</button>
		
      </div>
    </div>
  </div>
</div>
          
           </div>
        
        
        
    
     
      
     
      

  </div>
  
    
  
  
</div>
</div>
<?php
	
	unset($_SESSION["match_error"]);
	
?>