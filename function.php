<?php 

/* show total number of product in cart */
 $cookie = $_COOKIE ['Cart'];
 $cartinfo = unserialize ( $cookie );//反序列化cookie
foreach ($cartinfo as $value){
	
	$value['quantity']+=$value['quantity'];
	$total_product=$value['quantity'];
setcookie('total_product',$total_product,time()+36000);
}

	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	?>   
	   