<?php
	include "connection/conect.php";
$id=$_POST["pid"];
	
$rname=$_POST["name"];
$remail=$_POST["email"];

$rmessage=$_POST["message"];


	
				mysql_query("insert into review
				values('','$rname','$remail','$rmessage', NOW(),'$id')") or die("first");
				header("location:product-details.php?id=$id#reviews");
				

?>