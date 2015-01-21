 <?php

include "connection/conect.php";
// get the info from the db 

$sql = "SELECT * FROM products_ls where p_catagory='$catagory'  LIMIT 3";
$result = mysql_query($sql, $link) or trigger_error("SQL", E_USER_ERROR);


while ($row = mysql_fetch_array($result))
{

             
		
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
						<div class="cart-right"><a href="addtocart.php?id=' . $row["0"] . '" > <img src="images/cart2.png" alt=""/></a></div>
						<div class="clear"></div>
					 </div>
					</div>
					</div>
				</div>
                </div>';
                     
                     

   
   
   
   
} // end while
?>
		