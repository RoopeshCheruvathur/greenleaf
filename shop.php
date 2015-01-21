<?php include "connection/config.php";
include "connection/conect.php";
 session_start();
  if(isset($_GET['currentpage']))
$cp=$_GET['currentpage'];
else
$cp=0;
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
		$res1=mysql_query("select p_name from products_ls where p_id='$_GET[id]'") or die('Second');
	           $row=mysql_fetch_row($res1);  
		
?>

  <p id="info-message" class="alert alert-success text-center" > 
         <span class="" >
        <a href="#" class="close" data-dismiss="alert">&times;</a><img src="images/home/searchicon.png">
        <strong><?php echo $row[0] ;?></strong> added succesfully in to the cart.
        </span>
    </p>
    

<script>setTimeout(function(){ 
document.getElementById('info-message').style.display='none';;
},3000);
</script>
<?php
	}
	
}?>
 <br>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
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
$rowsperpage = 10;
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
	
   			  echo '<div class="col-sm-4" id="prod'.$row[0].'">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo ">
											<a href="product-details.php?id=' . $row["0"] . '&page=shop" > <img src="photo/'.$row["5"]. '" ></a>
						<div class="price">
					   <div class="cart-left">
							<p class="title">'.$row[1].'</p>
							 <div class="price1">
							  <span class="actual">Rs.'.$row[3].'</span>
							</div>
						</div>
						<div class="cart-right"><a href="addtocart.php?id=' . $row["0"] . '&page=shop&cp='.$cp.'" > <img src="images/cart2.png" alt=""/></a></div>
						<div class="clear"></div>
					 </div>
					</div>
					</div>
				</div>
                </div>';
	
                   
                     
}
   
   
   
   
   
} // end while
?>

					</div><!--features_items-->
                    
                    <div class="pagination" >
                     
                             <?php
/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <li class='active'><a href='{$_SERVER['PHP_SELF']}?currentpage=1'>First</a></li> ";
   $cp=1;
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo "  <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>Previous</a></li>";
   $cp=$prevpage;
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
        //echo "  <li><a href="">$x</a></li>";
      // if not current page...
      } else {
         // make it a link
         echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a></li> ";
		 $cp=$x;
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>Next</a></li> ";
   
   // echo forward link for lastpage
   echo "  <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>Last</a></li> ";
   $cp=$nextpage;
} // end if
/****** end build pagination links ******/
?>
                    
                    </div>
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
		
	</footer><!--/Footer--
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
