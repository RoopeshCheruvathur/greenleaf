<?php 
include "connection/conect.php";
include "connection/config.php";
session_start();

if($_SESSION["user_id"]=="")
{	
?>
	<script type="text/javascript">
		window.location="login_pdo.php";
    </script>

<?php 
}
	
	 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EDCOS | Export Distribution &amp; Consulting Service</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/custom/css/flexslider.css" type="text/css" media="screen">    	
    <link rel="stylesheet" href="assets/custom/css/parallax-slider.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

    <!-- Custom styles for this template -->
	
    <link href="assets/custom/css/business-plate.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/custom/ico/favicon.ico">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
	<div class="top">
    <div class="container">
        <div class="row-fluid">
            <ul class="loginbar">
             <li><a href="viewcart.php" class="login-btn">CART ( <?php if(isset($_SESSION['user_id']))
{
$res=mysql_query("select sum(no_of_products) from add_2_cart where id='$_SESSION[user_id]'") or die('FIRST');
$res1=mysql_query("select * from add_2_cart where id='$_SESSION[user_id]'") or die('SECOND');
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
 }}
 ?> )</a></li>
                <li >&nbsp;</li>
                <li><?php  if(isset($_SESSION['user_id'])) 
					{
						$uid=$_SESSION['user_id'];
						//echo $uid;
						$query="select * from users where id=:uid";	
						//username = :username
						$stmt = $sql->prepare($query);
						//echo $row[0];
						$stmt->execute(array(':uid' => $uid));
                        $user = $stmt->fetchObject();
						echo 'Hello,  '.$user->username; echo '<a href="logout.php" class="login-btn">   &nbsp;<span>LOGOUT</span></a>';
					}
					else{
						 echo '<a href="login_pdo.php" class="login-btn"><span>LOGIN</span></a>&nbsp;';
						  echo '<a href="register_pdo.php" class="login-btn"><span>SIGNUP</span></a>';
						 } ?></li>
                <li >&nbsp;</li>
                
               
                <li><a href="#" ><img src="assets/custom/img/es.png"></a></li>
                <li >&nbsp;</li>
                <li><a href="#"  ><img src="assets/custom/img/us.png"></a></li>
            </ul>
        </div>
    </div>
	</div>
	
    <!-- topHeaderSection -->	
    <div class="topHeaderSection">		
    <div class="header">			
		<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="assets/custom/img/logo.png" alt="" /></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="manufactures.php">Manufacturers</a></li>
            <li><a href="contact.php">Contact</a></li>
          </li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
	</div>
	</div>

    <!-- bannerSection -->
    
    	<div class="col-md-5" >
			


<?php 	
	if($no>0)
	{
	$res=mysql_query("select * from add_2_cart where id='$_SESSION[user_id]' order by cart_id desc") or die("sixth");
	
	while($row=mysql_fetch_array($res))
	{
?>

<table border="1">
	<tr>
    	<td>Image:</td>
		<td><?php echo '<img src="photo/'.$row["p image"]. '" width="200" height="190">' ?></td>
	</tr>
	<tr>
    	<td>Name:</td>
		<td><?php echo $row['P name'];?></td> 
	</tr>
	<tr>
    	<td>Quantity:</td>
		<td><form method="post" name="form1"><input type="text" id="quan" name="quan" value="<?php echo $row['no_of_products'];?>"/>
        <input type="submit" name="submit1" value="Edit"/>
<?php 
	if(isset($_POST['submit1']))
	{
		?>
		<a href="changequant.php?id=<?php echo $row['p_id']; ?>&quan=<?php echo $_POST['quan']; ?>">Save</a>
		<?php
	}
?>
        </form></td>
        
	</tr>
	<tr>
    	<td>Product id:</td>
		<td><?php echo $row['p_id'];?></td>
	</tr>
    <tr>
    	<td colspan="2"><a href="deletecartitem.php?id=<?php echo $row['p_id']; ?>">Delete</a></td>
	</tr>
	<?php }}
	else
	{
		echo "<h4>Cart empty.please add some item into the cart!!<a href='products.php'>click here </a> to continue<h4>";
	}
	?>
</table></div></div>

							
					 </div>

    <!-- footerBottomSection -->	
	<div class="footerBottomSection">
		<div class="container text-center">
			&copy; 2014, Allright reserved. 
			
		</div>
	</div>
	
<!-- JS Global Compulsory -->			
<script type="text/javascript" src="assets/custom/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="assets/custom/js/modernizr.custom.js"></script>		
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>	
	
	<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="assets/custom/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/custom/js/modernizr.js"></script>
<script type="text/javascript" src="assets/custom/js/jquery.cslider.js"></script> 
<script type="text/javascript" src="assets/custom/js/back-to-top.js"></script>
<script type="text/javascript" src="assets/custom/js/jquery.sticky.js"></script>

<!-- JS Page Level -->           
<script type="text/javascript" src="assets/custom/js/app.js"></script>
<script type="text/javascript" src="assets/custom/js/index.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>


	</body>
</html>