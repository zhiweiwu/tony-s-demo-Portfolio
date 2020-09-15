<?php

$input=$_POST['input'];
$int=(int)$input;
$id=$_POST['pid'];

echo $id;

	
	$cookie = stripslashes ( $_COOKIE ['Cart'] ); //去除addslashes添加的反斜杠
    $cartinfo = unserialize ( $cookie );//反序列化cookie
	foreach($cartinfo as $key=>$value){
		
		if($value['pid']==$id){
			
			$cartinfo[$key]['quantity']=$int;
			$cart_ser=serialize($cartinfo);
			 setcookie('Cart',$cart_ser,time()+36000);
			// setcookie('Cart_number',$cart_num,time()=36000);
			  header("location:cart.php");
		}
		else{
			
			
		}
}



