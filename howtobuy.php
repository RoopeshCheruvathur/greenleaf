<?php include "connection/config.php";
include "connection/conect.php";
 session_start();
 if(isset($_SESSION['user_id'])) 
					{
						$uid=$_SESSION['user_id'];
					}
					else
					{
						$uid=0;
					}
					
						?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Greenleaf</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<!--<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>-->
							</ul>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart ( <?php 

$res=mysql_query("select sum(no_of_products) from add_2_cart where id='$uid'") or die('FIRST');
$res1=mysql_query("select * from add_2_cart where id='$uid'") or die('SECOND');
 $no = mysql_num_rows($res1);

 if($no>0)
 {
 if( $row=mysql_fetch_row($res))
 {
	echo $row[0];
	
	
 }}
 else
 {
	 echo "0";
 }
 ?> )</a></li>
 
 <li><li>
 </i><span style="color:#FFF; font-size:12px; margin-top:4px;"><p style="padding-top:5px;"><?php  if(isset($_SESSION['user_id'])) 
					{
						//echo $uid;
						$query="select * from users where id=:uid";	
						//username = :username
						$stmt = $sql->prepare($query);
						//echo $row[0];
						$stmt->execute(array(':uid' => $uid));
                        $user = $stmt->fetchObject();
						echo 'Hello,  '.$user->username;  ?></span></li>
                  
                       
 <li><a href="logout.php" class="fa fa-lock"> &nbsp;<span>Logout</span></a></li>
        <?php 
                    }
					else{
						 ?>
 

		 <li><a href="login.php" class="fa fa-lock"><span>Login</span></a>
		<?php  } ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
        
        	<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>

				</div>
			</div>
		</div><!--/header-bottom-->
		
		<div class="header-middle" ><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
							<div class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="howtobuy.php">How to Buy</a></li>
                                 <li><a href="contact-us.php">Contact</a></li>
                                
                                <li  class="search_box " style="padding-top:20px;"><input type="text" placeholder="Search"/></li>
							</ul>
                    	</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
	
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    
		    				    				
						<div class="container text-center">
		<div class="logo-404">
			<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="images/404/404.png" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> We Couldn't Find this Page</h1>
			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
			<h2><a href="index.php">Bring me back Home</a></h2>
		</div>
	</div>

<br><br>
				</div>			 		
			</div>       	
  </div>
  </div>
	
		<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
			</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Information</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">About us</a></li>
								<li><a href="#">Returns and Cancellation</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms of Service</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Customer Service</h2>
							<ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
							
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>My Account</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">My Account</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="#">Order Status</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Secure Payment</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>Pay securely through credit card, debit card or netbanking</li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Greenleaf</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2014 Greenleaf. All rights reserved.</p>
					<p class="pull-right"></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer--
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>