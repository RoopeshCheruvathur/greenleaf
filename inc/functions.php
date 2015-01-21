<?php require("db.php"); 


session_start();
$action="null";
$sessionID = $_COOKIE['PHPSESSID'];

if(isset($_POST['action']) != '' || isset($_GET['action'] )!= '') {
	if($_POST['action'] == '')
	{
		$action 	= $_GET['action'];
		$productID	= $_GET['productID'];
		$noJavaScript = 1;
	} else {
		$action 	= $_POST['action'];
		$productID	= $_POST['productID']; 
		$noJavaScript = 0;
	}
}
	
if ($action == "addToBasket"){

	$productInBasket 	= 0;
	$productTotalPrice	= 0;

	$query  = "SELECT * FROM products_ls WHERE p_id = " . $productID;
	$result = mysql_query($query);
	$row = mysql_fetch_array( $result );

	$productPrice 		= $row['p_prize'];	
	$productName		= $row['p_name'];
	
	$query1 = "insert into add_2_cart
				values('','$productID','$productName','','$productPrice ','','$sessionID','')";
	
	mysql_query($query1) or die('Error, insert query failed');	
   
	$query2  = "SELECT count(*) FROM add_2_cart ";
	$result2 = mysql_query($query2) or die(mysql_error());;
	$r = mysql_fetch_row($result2);
	$r1=$r[0];
if ($noJavaScript == 1) {
	header("Location: ../index2.php");
} else {
		echo $r1;
	}

}

?>