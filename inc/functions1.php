<?php require("db.php"); 



$query  = "SELECT count(*) FROM add_2_cart ";
	$result = mysql_query($query) or die(mysql_error());;
	$r = mysql_fetch_row($result);
	$r1=$r[0];
	
		echo $r1;
	?>