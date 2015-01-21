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
    
      
  <script>
$(document).ready(function(){ 

 $(".cart-right a img").click(function() {

$("html,body").animate({scrollTop:0},"slow");




});

});

  
  </script>

    
</head><!--/head-->

<body>	<div id="slidingTopWrap">
		<div id="slidingTopContent">
			<div id="basketWrap">
				<div id="basketTitleWrap">
					Your Basket <span id="notificationsLoader"></span>
				</div>
				<div id="basketItemsWrap">
					<ul>
					<li></li>
					<?php getBasket(); ?>
					</ul>
				</div>
			</div>
		</div>
        
		<div id="slidingTopFooter">
			<div id="slidingTopFooterLeft">
				<img src="images/arrow-down.png" alt="Show Basket" /> <a href="no-js.htm" onclick="return false;" id="slidingTopTrigger">Show Basket</a>
			</div>
		</div>
	</div>
		
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
                                <li><a href="shop.php">Shop</a></li> <li><a href="howtobuy.php">How to Buy</a></li>
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
    
	<?php if(isset($_GET['msg']))
{
	$msg=$_GET['msg'];
	if($msg=="fail")
	{
		  ?><p id="info-message" class="alert alert-success text-center"> 
         <span class="" >
        <a href="#" class="close" data-dismiss="alert">&times;</a>You must login first!!.<a href='login.php'>click here</a> to login
        </span>
    </p><?php

	}
	else if($msg=="success")
	{
		$res1=mysql_query("select p_name,p_image from products_ls where p_id='$_GET[id]'") or die('Second');
	           $row=mysql_fetch_row($res1);  
		
?>

  <p id="info-message" class="alert alert-success text-center" > 
         <span class="" >
        <a href="#" class="close" data-dismiss="alert">&times;</a><?php echo '	<img width="40" src="photo/'.$row["1"]. '" >';?>
        <strong><?php echo $row[0] ;?></strong> added succesfully in to the cart.
        </span>
    </p>
    

<script>setTimeout(function(){ 
document.getElementById('info-message').style.display='none';;
},4000);
</script>
<?php
	}
	
}?>
	<section id="slider" ><!--slider-->
    <div  style="background:#dfdfdf ">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span></span></h1>
									<h2>Stationery Organizer</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/p1.png" class="girl img-responsive" alt="" />
									<!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span></span></h1>
									<h2>Paper Earings</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.png" class="girl img-responsive" alt="" />
									<!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span></span></h1>
									<h2>Wood Art</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.png" class="girl img-responsive" alt="" />
									<!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
        </div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">

						<div class="brands_products"><!--brands_products-->
							<h2>Category</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Art </a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Wood Art</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Accessories</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Jewelry</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Paintings</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Weddings</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Clothings</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<!--<div class="shipping text-center"><!--shipping-->
							<!--<img src="images/home/shipping.jpg" alt="" />-->
						<!--</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
					  <?php
//$conn = mysql_connect($host,$user,$pw) or trigger_error("SQL", E_USER_ERROR);
//$db = mysql_select_db($db,$conn) or trigger_error("SQL", E_USER_ERROR);

include "connection/conect.php";

$sql = "SELECT COUNT(*) FROM products_ls";

$result = mysql_query($sql);
$r = mysql_fetch_row($result);
$numrows = $r[0];
$rowsperpage = 7;
// number of rows to show per page
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 

$sql = "SELECT * FROM products_ls order by p_id desc LIMIT $offset,$rowsperpage";
$result = mysql_query($sql, $link) or trigger_error("SQL", E_USER_ERROR);

// while there are rows to be fetched...
while ($list = mysql_fetch_assoc($result)) {
   // echo data

while ($row = mysql_fetch_array($result))
{


//if ($rating==0)
//{

   			  echo '		<div class="productWrap">
					<div class="productImageWrap">
						<img src="images/product2.jpg" alt="Product2" />
					</div>
					<div class="productNameWrap">
						Keurig Cup					</div>
					<div class="productPriceWrap">
						<div class="productPriceWrapLeft">
							$38
						</div>
						<div class="productPriceWrapRight">
							<a href="inc/functions.php?action=addToBasket&productID=2" onClick="return false;">
								<img src="images/add-to-basket2.gif" alt="Add To Basket" width="111" height="32" id="featuredProduct_2" />
							</a>
						</div>
					</div>
				</div>';

}
} // end while
?>
		
        
        				
                     
           
                        
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Art</a></li>
								<li><a href="#blazers" data-toggle="tab">Accessories</a></li>
								<li><a href="#sunglass" data-toggle="tab">Jewelry</a></li>
								<li><a href="#kids" data-toggle="tab">Weddings</a></li>
								<li><a href="#poloshirt" data-toggle="tab" >Clothings</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
												
                                                <?php $catagory="t_shirts";
												include("catagorylist.php");?>
											
							</div>
							<div class="tab-pane fade" id="blazers" >
								<?php $catagory="blazers";include("catagorylist.php");?>
								
												
							</div>
							<div class="tab-pane fade" id="sunglass" >
                            <?php $catagory="painting";include("catagorylist.php");?>
								</div>
							<div class="tab-pane fade" id="kids" >
								<?php $catagory="blazers";include("catagorylist.php");?>
							</div>
							
							<div class="tab-pane fade" id="poloshirt" >
								<?php $catagory="t_shirts";include("catagorylist.php");?>
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
                                
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo ">
								<img src="images/home/placeholder1.jpg" alt="" />
						<div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							 <div class="price1">
							  <span class="actual">Rs12.00</span>
							</div>
						</div>
						<div class="cart-right"><img src="images/cart2.png" alt=""/> </div>
						<div class="clear"></div>
						 </div>
							</div></div>
               					 </div></div>
                                    
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo ">
								<img src="images/home/placeholder1.jpg" alt="" />
						<div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							 <div class="price1">
							  <span class="actual">Rs12.00</span>
							</div>
						</div>
						<div class="cart-right"><img src="images/cart2.png" alt=""/> </div>
						<div class="clear"></div>
						 </div>
							</div></div>
               					 </div></div>
                                    
                                    
								<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo ">
								<img src="images/home/placeholder1.jpg" alt="" />
						<div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							 <div class="price1">
							  <span class="actual">Rs12.00</span>
							</div>
						</div>
						<div class="cart-right"><img src="images/cart2.png" alt=""/> </div>
						<div class="clear"></div>
						 </div>
							</div></div>
               					 </div></div>
                                 </div>
                                 
								<div class="item">	
									<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo ">
								<img src="images/home/placeholder1.jpg" alt="" />
						<div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							 <div class="price1">
							  <span class="actual">Rs12.00</span>
							</div>
						</div>
						<div class="cart-right"><img src="images/cart2.png" alt=""/> </div>
						<div class="clear"></div>
						 </div>
							</div></div>
               					 </div></div>
                                 
                          		<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo ">
								<img src="images/home/placeholder1.jpg" alt="" />
						<div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							 <div class="price1">
							  <span class="actual">Rs12.00</span>
							</div>
						</div>
						<div class="cart-right"> <img src="images/cart2.png" alt=""/></div>
						<div class="clear"></div>
						 </div>
							</div></div>
               					 </div></div>
                                 
										<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo ">
								<img src="images/home/placeholder1.jpg" alt="" />
						<div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							 <div class="price1">
							  <span class="actual">Rs12.00</span>
							</div>
						</div>
						<div class="cart-right"> <img src="images/cart2.png" alt=""/></div>
						<div class="clear"></div>
						 </div>
							</div></div>
               					 </div></div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
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
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>