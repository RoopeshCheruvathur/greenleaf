<?php
	include "connection/conect.php";
$cname=$_POST["name"];
$cemail=$_POST["email"];
$csubject=$_POST["subject"];
$cmessage=$_POST["message"];


	
				mysql_query("insert into contact_us
				values('','$cname','$cemail','$csubject','$cmessage')") or die("first");
				header("location:contact-us.php?msg=success");

?>