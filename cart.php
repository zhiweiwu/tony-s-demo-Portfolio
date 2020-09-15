<?php
	include 'header.html';
ob_start();
$cookie = stripslashes ( $_COOKIE ['Cart'] ); //去除addslashes添加的反斜杠
        $cartinfo = unserialize ( $cookie );//反序列化cookie
	
		
?>

	<?php
	 
	if (empty($cartinfo)){
		 //$cart_ser=serialize($cartinfo);
	     //setcookie('Cart',$cart_ser,time()-36000);
		
		header("location:cart_empty.php");
		
	}
	 ?>

<div style="margin-top:80px ;" class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
				<?php
				$GLOBALS['ttotal']=0;
				$GLOBALS['ttotaln']=0;
				if(isset($_COOKIE['Cart'])){
					foreach($cartinfo as $value){
						$total=$value['price']*$value['quantity'];
						$totaln=$value['quantity'];
						
						echo"
						 <tr>
                        <td class=\"col-sm-8 col-md-6\">
                        <div class=\"media\">
                            <a class=\"thumbnail pull-left\" href=\"product_display.php?id=$value[pid]\"> <img class=\"media-object\" src=\"$value[img_url]\" style=\"width:100px; height:140px;\"> </a>
                            <div class=\"media-body\">
                                <h4 class=\"media-heading\"><a href=\"#\">$value[product_name]</a></h4>
                                <h5 class=\"media-heading\">$value[platform]</a></h5>
                                
                            </div>
                        </div></td>
                        <td data-th=\"Quantity\">
						<form method=\"post\" action=\"update.php\">
						<input type=\"number\" name=\"input\" onkeyup=\"this.value=this.value.replace(/\D/g,'')\" onafterpaste=\"this.value=this.value.replace(/\D/g,'')\"class=\"form-control text-center\" value=\"$value[quantity]\" min=\"1\" >
							</td>
                        <td class=\"col-sm-1 col-md-1 text-center\"><strong>$$value[price]</strong></td>
                        <td id=\"total\" class=\"col-sm-1 col-md-1 text-center \"><strong>$$total</strong></td>
                        <td class=\"col-sm-1 col-md-1\">
						<input  name=\"pid\" type=\"hidden\" value=\"$value[pid]\">
						<button  type=\"submit\" value=\"提交\"class=\"btn btn-info btn-sm\"><i class=\"fa fa-refresh\"></i></button>
						
						<a href=\"remove.php?id=$value[pid]\">
						<button id=\"remove\" type=\"button\"  name=\"$value[pid]\" class=\"btn btn-danger btn-sm\">
                            <i class=\"fa fa-trash-o\"></i>
                        </button>
						</a></form>
						</td>
                    </tr>";
					
					
						$GLOBALS['ttotal']+=$total;
						//$_SESSION["total"] = $GLOBALS['ttotal'];
						setcookie('total_price',$GLOBALS['ttotal'],time()+36000);
						$GLOBALS['ttotaln']+=$totaln;
						setcookie('cart_num',$GLOBALS['ttotaln'],time()+36000);
							
						
						
						
						
					}
					
				}
			
				?>
                   
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$<?php echo $GLOBALS['ttotal'] ?></strong></h5></td>
						
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td id="about"class="text-right"><h5><strong>$0</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td  class="text-right"><h3><strong>$<?php echo $GLOBALS['ttotal'] ?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
						<a href="checkout.php">
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
						</a>
						</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 

include'footer.html';
 //echo var_dump ($cartinfo);
 //$select_value=$_POST['qq'];
   // echo $select_value;
//echo $GLOBALS['ttotal'];
//echo var_dump (empty($cartinfo));
//$totaln=$_SESSION["totaln"];echo$totaln;
?>