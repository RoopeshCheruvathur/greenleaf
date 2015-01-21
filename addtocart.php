<?php 
session_start();
	
if(isset($_SESSION['user_id'])=="")
{	
header("location:login.php?msg=fail");
exit(); 
}
	include "connection/conect.php";
$user=$_SESSION['user_id'];

    $pid=$_GET['id'];
    //$cp=$_GET['cp'];
	$page=$_GET['page'];
	$res=mysql_query("select * from add_2_cart where id='$user' && p_id='$pid'") or die('FIRST');

	$no = mysql_num_rows($res);
	
	if($no > 0)
	
	{
			mysql_query("update add_2_cart set no_of_products=no_of_products+1 where p_id='$_GET[id]'") or die("Fifth");
	}
	else
	{
			$res1=mysql_query("select * from products_ls where p_id='$_GET[id]'") or die('Second');
			while($row=mysql_fetch_array($res1))
			{
				$uname = $_SESSION['user_id'];
				$pid = $row['p_id'];
				$pname = $row['p_name'];
				$pdesc = $row['p_description'];
				$pprice = $row['p_prize'];
				$no_of_prod='1';
				
				$id="username";
				$pimage=$row['p_image'];
				
				mysql_query("insert into add_2_cart
				values('','$pid','$pname','$pdesc','$pprice',$no_of_prod,'$uname','$pimage')") or die("Third");
			}
				
	}
	if($page=="shop")
	{
		header("location:shop.php?currentpage=$cp&msg=success&id=$pid#prod$pid");
	}
	else if($page=="prod_det")
	{
		header("location:cart.php?msg=success&id=$pid");
	}
	else
	{
		
			header("location:index.php?msg=success&id=$pid");
	}
	
?>
