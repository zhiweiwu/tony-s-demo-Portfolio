/*
其实这个方法不完善，正确的应该是先创造个php 然后算出实际的cart数量（使用cookie），然后这个js直接输出php的值就行了。
*/
$(document).ready(function(){
 
  
	 var cart_num=$.cookie('cart_num');
	 var cart=$.cookie('Cart');
	 
	 
	 
	 if($('#cartinfo').val().length==13){ //when cartinfo dont have any value which means there is no product in the cart,the length will turn to 13.
		
		 $('.badge').text('0');
		 
	 }
	 else{
		 
		$.ajax({url:"/practice/header.html",success:function(){
		
		$('.badge').text(cart_num);
		
	}});

 
		 
	 }
	
	
});
