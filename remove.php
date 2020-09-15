<?php

$cookie = stripslashes ( $_COOKIE ['Cart'] ); //去除addslashes添加的反斜杠
        $cartinfo = unserialize ( $cookie );//反序列化cookie
		$userId= $_GET['id'];
		
	
		 foreach($cartinfo as $key=>$value)
	 { 
		 if($value['pid']==$userId){
			 
			 unset($cartinfo[$key]);
			 $b=array_values($cartinfo);
			 $cart_ser=serialize($b);
		     setcookie('Cart',$cart_ser,time()+36000);
			 header("location:cart.php");
		 }
		 else{
			 
			
		 }
		 
	}
?>