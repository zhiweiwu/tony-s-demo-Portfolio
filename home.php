<?php
session_start();
if(isset($_COOKIE['Cart'])){
$cookie = stripslashes ( $_COOKIE ['Cart'] ); //去除addslashes添加的反斜杠
$cartinfo = unserialize ( $cookie );//反序列化cookie
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/creative.css" rel="stylesheet">
	 

</head>

<nav class="navbar navbar-expand-lg navbar-light  fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-triggder" href="#">
         Game World
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto ">
	  
        <li class="nav-item active">
          <a class="nav-link js-scroll-trigger" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Contact</a>
        </li>
        <li class="nav-item">
		<?php
		if(isset($_SESSION["loged_in"])){
         echo "<a class=\"nav-link js-scroll-trigger\" href=\"logout.php\"   data-toggle=\"modal\" data-target=\"#myModal\">Hi,$_SESSION[user_name]</a>";
		 
		}
		else{
		 echo "<a class=\"nav-link js-scroll-trigger\" href=\"loginform.php\">Account</a>";
		}
      
		?>

		  </li>
      </ul>
	  <ul class=" navbar-nav  ">
        <li class="nav-item">
	      <a class="" href="cart.php" id="cart"><i class="  fa fa-shopping-cart"></i> Cart <span class="badge"><?php if (!empty($cartinfo)){$totaln=$_COOKIE["cart_num"];echo$totaln;}else{echo 0;}?></span></a></span></a>
		</li>
	  </ul>
	  <ul class=" navbar-nav  ">
        <li class="nav-item">
	<form method="get" action="searchform.php"class="form-inline"id="demo-2">
		<button class="fa fa-search" id="search" type="search"></button>
    <input type="search" placeholder="Seasrch" name="pname">

	</form>
	</li>
	  </ul>
	 
    </div>
  </div>
</nav>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleFade" data-slide-to="1"></li>
    <li data-target="#carouselExampleFade" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/mo1.jpg" alt="First slide">
	  <div class="carousel-caption d-none d-md-block" style="margin-bottom:280px; ">
	  <h1 class="text-uppercase" style="font-size:350%;">
              <strong >Available January 26, </strong><br>
			  <strong>2018</strong>
    
     </h1>
	 </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/2020sale.original.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/mo1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
<div class="container" id="game_section">
  <div class="row img_container">
    <div class="col-lg-12 mx-auto space">
      <h1> Game Section</h1>
    </div>
    <div class="col-sm-6 col-md-3 ds">
        <a href="#" class="thumbnail">
            <img src="../practice/img/3ds.jpg"
                 alt="p">
        </a>
    </div>
    <div class="col-sm-6 col-md-3 psv">
        <a href="#" class="thumbnail">
            <img src="../practice/img/psv.png"
                 alt="p">
        </a>
    </div>
    <div class="col-sm-6 col-md-3 ps4">
        <a href="#" class="thumbnail">
            <img src="../practice/img/ps4.jpg"
                 alt="p">
        </a>
    </div>
    <div class="col-sm-6 col-md-3 x">
        <a href="#" class="thumbnail">
            <img src="../practice/img/x.png"
                 alt="p">
        </a>
    </div>
  </div>
</div>
<!-- display products-->
<div class="container" id="product">
  <div class="row">
    <div class="col-lg-10  space">
   <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active " data-toggle="pill" href="#home">Popular</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">coming soon</a>
    </li>
<li class="right">
      <a href="#home"> more</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container-fluid tab-pane active"><br>
 
      <div class="row">
 <?php
	$conn=mysqli_connect('localhost','root','')or die(mysqli_connect_error());
	$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error());
	$sql="SELECT * FROM product";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
		echo"
       <div class=\"col-sm-6 col-md-3\">
        <div class=\"thumbnail\">
		<a href=\"product_display.php?id=$row[pid]\">
            <img src=\"$row[img_url]\" 
            alt=\"product\">
            <div class=\"caption\">
			</a>
                <strong>$$row[price]</strong>
                <p>$row[product_name] </p>
                
            </div>
        </div>
    </div>";
	}
	?>
	
</div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
	<div class="row">
	<?php
	$conn=mysqli_connect('localhost','root','')or die(mysqli_connect_error());
	$database=mysqli_select_db($conn,'game_shop') or die(mysqli_error());
	$sql="SELECT * FROM product";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
		echo"
       <div class=\"col-sm-6 col-md-3\">
        <div class=\"thumbnail\">
		<a href=\"product_display.php?id=$row[pid]\">
            <img src=\"$row[img_url]\" 
            alt=\"product\">
            <div class=\"caption\">
			</a>
                <strong>$$row[price]</strong>
                <p>$row[product_name] </p>
                
            </div>
        </div>
    </div>";
	}
	?>
    </div>
    </div>
  </div>

	</div>
  </div>

</div>

<?php include 'footer.html';?>
<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Log Out</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         Are you sure you want log out?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		  <a type="button" href="logout.php" class="btn btn-primary">Yes</a>
        </div>
 
 </div>
  </div>
   </div>
  

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>