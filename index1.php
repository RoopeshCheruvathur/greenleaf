<?php require("inc/functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Fly-To-Basket Effect With jQuery</title>
<link href="inc/style.css" rel="stylesheet" type="text/css" />
 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
<script type="text/javascript" src="inc/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="inc/js/custom.js"></script>
</head>

<body>
   <div id="contentWrapRight">
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

<br><br><br><br><br><br><br><br>
<div id="mainWrap">
  <div id="headerWrap">
    
  </div>
	
 
    
	
	<div id="contentWrap">
	
		<div id="content"> <?php

include "connection/conect.php";
// get the info from the db 

$sql = "SELECT * FROM products_ls where p_catagory='t_shirts'  LIMIT 10";
$result = mysql_query($sql, $link) or trigger_error("SQL", E_USER_ERROR);


while ($row = mysql_fetch_array($result))
{

             
		
 echo '<div class="productWrap">
					<div class="productImageWrap" id="productImageWrapID_'.$row[0].'">
						<img width="100" src="photo/'.$row["5"]. '" >
					</div>
					<div class="productNameWrap">
						Keurig Cup					</div>
					<div class="productPriceWrap">
						<div class="productPriceWrapLeft">
							$38
						</div>
						<div class="productPriceWrapRight">
							<a href="inc/functions.php?action=addToBasket&productID='.$row[0].'" onClick="return false;">
								<img src="images/cart2.png" alt="" id="featuredProduct_'.$row[0].'" />
							</a>
						</div>
					</div>
				</div>
				</div>
				';
				
				
				
				
				
				   
} // end while
?>
		

		</div>
		
		
		
		
	</div>
	
</div>
	
</body>
</html>
