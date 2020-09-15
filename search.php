<?php

$conn=mysqli_connect('localhost','root','')or die(mysqli_connect_error());
	$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error());
	$Pname=$_GET['pname'];
	$sql="SELECT pid,product_name,price,img_url FROM product WHERE product_name LIKE '$Pname%'";
	$result=mysqli_query($conn,$sql);
	
	if($result){
		if(mysqli_num_rows($result)>0){
			
			while($row=mysqli_fetch_array($result)){
				
				echo"
       <div class=\"col-sm-6 col-md-3 nav-space\">
        <div class=\"thumbnail\">
		<a href=\"product_display.php?id=$row[pid]\">
            <img src=\"$row[img_url]\" 
            alt=\"product\">
            <div class=\"caption\">
                <strong>$$row[price]</strong>
                <p>$row[product_name] </p>
                
            </div>
        </div>
    </div>";
			}
			
			
			
		}
		else{
			
			echo"<p style=\"margin-top:150px ;margin-bottom:330px; margin-left:130px; \">Oh no! Looks like we couldn't find any matches... sorry about that! Perhaps try another keyword?</p>";
		}
		
		
	}
	else{
		
		die('Error: ' . mysqli_error($conn));
		
	}
	

?>