<?php
include 'header.html';
$cookie = stripslashes ( $_COOKIE ['Cart'] ); //去除addslashes添加的反斜杠
        $cartinfo = unserialize ( $cookie );//反序列化cookie
		if(!isset($_SERVER['HTTP_REFERER'])){ //to prevent someone direct link to this page
    // redirect them to your desired location
    header("location:home.php");
    exit;
}
		
?>


<div style="margin-top:100px ;" class="container">
<!-- divide 2 part,left and right-->
<div class="row" >  
 <div class="col-9">
<form action="paymentf.php" method="post">
     <h5 style="font-weight: bold; margin-bottom:50px">Biling details</h5>
     <div class="row" >
       <div class="col-6">
       <div class="form-group">
	   <label> First&Last name</label>
	   <input type="text" name="name" class="form-control" required="required"/>
       </div>
       </div>   

	 </div>
	 <?php if(isset($_SESSION["pname_error"])){
                        $error = $_SESSION["pname_error"];
                        echo "<span class=\"error\">$error</span><br><br>";
                    }
										
?> 
	 <div class="row">
	   <div class="col-6">
       <div class="form-group">
	   <label> Email address</label>
	   <input type="email" name="email" class="form-control" required="required" />
       </div>
       </div>
     </div>
	 <div class="row">
	   <div class="col-6"> 
	   <div class="form-group">
	   <label> Address</label>
	  <input id="addrs_1" type="text" name="address" class="form-control  " required="required" autocomplete="off_1"/>
       </div>
       </div>
     </div>
	 <div class="row">
	   <div class="col-6">
	   <label> Suburb</label>
       <div class="form-group">
	    <input id="suburb" type="text" name="Suburb" class="form-control " disabled autocomplete="off_1"/>
       </div>
       </div>
     </div>
	 	 <div class="row">
	   <div class="col-6"> 
	   <div class="form-group">
	   <label> State</label>
	  <input id="state" type="text" name="state" class="form-control  " disabled autocomplete="off_1"/>
       </div>
       </div>
     </div>
	 	 <div class="row">
	   <div class="col-6"> 
	   <div class="form-group">
	   <label> Postcode</label>
	  <input id="postcode" type="text" name="Postcode" class="form-control  " disabled autocomplete="off_1"/>
       </div>
       </div>
     </div>
	  <div class="creditCardForm1">
	     <div class="row payment">
        
        <div class="col-6">
        
        <h5 style=" font-weight: bold; margin-top:20px;margin-bottom:30px">Credit / Debit card</h5>
            <!-- CREDIT CARD FORM STARTS HERE -->
			<div class="form-group" id="card-number-field">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" required="required">
				 <div class="invalid-feedback">please input correct number.</div>
            </div>
			<div class="row">
				<div class="col-8">
				<label>Expiration Date</label>
					<div class="form-group" id="expiration-date">
                        
                        <select>
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select>
                            <option value="16"> 2020</option>
                            <option value="17"> 2021</option>
                            <option value="18"> 2022</option>
                            <option value="19"> 2023</option>
                            <option value="20"> 2024</option>
                            <option value="21"> 2025</option>
                        </select>
                    </div>
				</div>
				<div class="col-4">
					<div class="form-group CVV">
						<label for="cvv">CVV</label>
						<input type="text" class="form-control" id="cvv" required="required">
					</div>
				</div>
			</div>
            
			<div class="row">
				<div class="col-4">
			<div class="form-group">
			<label for="owner">Card Holder</label>
						<input type="text" class="form-control" id="owner" required="required">
			</div>
			</div>
			<div class="col-8">
			<div class="form-group" style=" margin-top:25px; margin-left:20px"id="credit_cards">
              <img src="../practice/img/visa.jpg" id="visa">
              <img src="../practice/img/mastercard.jpg" id="mastercard">
              <img src="../practice/img/amex.jpg" id="amex">
            </div>
			</div>
			</div>
			
               
                                       
               
               
                      
            <!-- CREDIT CARD FORM ENDS HERE -->
            
            
        </div>            
        
   
        
    </div>
	</div>
	
	</div>
	
	<div class="col-3">
	<table class="table table-hover" style="width:100%;";>
	
 <tr >
    <td>total amount </td>
	<td>$<?php echo $_COOKIE["total_price"] ;?></td>
  </tr>
  <tr >
    <td>Subtotal </td>
	<td>$<?php echo $_COOKIE["total_price"] ;?></td>
  </tr>
  <tr >
    <td> Delivery </td>
	<td>$0</td>
  </tr>
</table>
<div class="form-group">
            <button id="confirm-purchase" type="submit" class="btn btn-primary btn-block btn-md">Confirm &Pay</button>
        </div>
</div>
	
	
	

  </form>
  </div>
  </div>
  <br><br><br><br><br><br>
<?php include'footer.html';

unset($_SESSION['pname_error']);
?>
<script src="js/jquery.payform.min.js" charset="utf-8"></script>
<script src="js/script.js"></script>
<script src="js/addressauto.js"></script>
