/*
logic: .post方法其实就是ajax的post版。para1是需要请求的页面或地址，para2是data:data， 左边应该只是命名，右边是实际需要传递的参数。para3是函数，括号里面如果填了这个其实就是请求页面的输出结果，在这个页面上forgotpasword的输出结果是noreg
如果这个email没有注册的话。所以这就是为什么php页面结果只要echo就行。因为只要输出结果

*/


$(document).ready(function(){
	
	
	$("#email_send").click(function(){
		var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
		var email=$('#email').val();
		if(email=='' || !preg.test(email)){
			$("#check_msg").html("Please enter a valid email address");
			$("#check_msg").css({"color":"red"});
		}else{
			
		
		
		
		
		
		
	
		$.post("forgotpasword.php",{mail2:email},function(msg){
			if(msg=="noreg"){
				
 		
				$("#check_msg").html('sorry,looks like this email has not been registered, please register first');
				$("#check_msg").css({"color":"red"});	
			}
			else{
				$("#check_msg").html('please check your email and click the link to reset your password');
				$("#check_msg").css({"color":"green"});	
				$("#email_send").attr("disabled","true");
				
				
				
			}
		
		
	})	
		
	}	
		
	})
	
	
	
})