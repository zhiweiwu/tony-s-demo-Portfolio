<?php
    include 'header.html';
	ob_start();
    $conn=mysqli_connect('localhost','root','','game_shop')or die(mysqli_connect_error());
	//$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error());
	$userId= $_GET['id'];
	$sql="SELECT pid,product_name,platform,price,img_url FROM product WHERE pid='$userId' ";
	$result=mysqli_query($conn,$sql);
 //$cookie = stripslashes ( $_COOKIE ['Cart'] ); //去除addslashes添加的反斜杠
 $cookie = $_COOKIE ['Cart'];
        $cartinfo = unserialize ( $cookie );//反序列化cookie
	$row=mysqli_fetch_assoc($result);
	$row['quantity']=1; //add default quantity 1 for this product 
	//$cart=array();
	//$cart[]=$row;// 创建一个array把每一个row放进去，相当于一个大array里面可以存在多个product array的集合
	 $exist=false;
	if(isset($_POST['submit'])){ // after click add cart 
		
		if(count($cartinfo[0])!==0){ // if already have products inside of cart
		
		// $cartinfo[]=$row;
	
		// header("location:cart.php");
		
			 // if this product is already inside cart,add quantity
		foreach($cartinfo as $key=>$value){
		
		 if($value['pid']==$userId){
			 $exist=true;
			 $cartinfo[$key]['quantity']+=1;
			$cart_ser=serialize($cartinfo);
			 setcookie('Cart',$cart_ser,time()+36000);
			  header("location:cart.php");
			
		 }
		 
		 
		}
		if($exist==false){/*if is firit time got this product, add product into cart*/
			  $cartinfo[]=$row; // add $row into cart
			 $cart_ser=serialize($cartinfo);
			 setcookie('Cart',$cart_ser,time()+36000);
			 header("location:cart.php");}
		
		 
	 }
	 else{// if cart is empty,cartinfo is empty as well
	  $cartinfo[]=$row; // add $row into cart
		  $cart_ser=serialize($cartinfo);
		  setcookie('Cart',$cart_ser,time()+36000);
		  header("location:cart.php");
	 }
	
	}

	
?>

	


<div class="container " >

<nav aria-label="breadcrumb">
  <ol class="breadcrumb " style="margin:80px 0 40px;">
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#"><?php echo $row['platform'];?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['product_name'];?></li>
  </ol>
</nav>
<div class="row" style="margin-bottom:60px;">
 <div class="col-md-3 ">
 <img  style="max-width:100%;" src="<?php echo $row['img_url'];?>">

</div>
<div class="col-md-8 " style="margin-left:90px;">
<h3 style="font-weight:bold;"><?php echo $row['product_name'];?></h3>    
                    
                    <h6 style="color:grey;"><?php echo $row['platform'];?></h6>
					<hr>
					<h3> $<?php echo $row['price'];?></h3>
					<h6> FREE Delivery </h6> 
					<form method="post" action="">
                   <button id="add_cart" type="submit" name="submit" class="btn btn-success btn-lg " style="margin-top:95px; "><span class="fa fa-shopping-cart" ></span> Add to cart</button>
                       </form>

</div>
</div>
</div>


<?php include'footer.html';
//echo $userId;
 //var_dump ($_COOKIE['Cart']);;//show info where stored in the cart
//var_dump ($cart);//show product info of the cart page
//var_dump($row);



	
?>