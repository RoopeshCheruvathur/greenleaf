<!--user registration-->

<?php

 session_start();
 if(isset($_SESSION['user_id'])) 
					{
						$uid=$_SESSION['user_id'];
					}
					else
					{
						$uid=0;
					}
					
						


include 'password/PasswordHash.php';

/**
 * Don't use mysql_ functions. These are for MySQL 4.x and have been deprecated
 * since 2004. MySQLi is fine if you know you'll only be using MySQL databases.
 * PDO doesn't tie you to a specific RDBMS.
 */
include 'connection/config.php';

// Create an array to catch any errors in the registration form.
$errors = array();

/**
 * Make sure the form has been submitted before trying to process it. This is
 * the single most common cause of 'undefined index' notices.
 */
if (!empty($_POST))
{
    // First check that required fields have been filled in.
    if (empty($_POST['username']))
    {
        $errors['username'] = "Username cannot be empty.";
    }

    // OPTIONAL
    // Restrict usernames to alphanumeric plus space, dot, dash, and underscore.
    /*
    if (preg_match('/[^a-zA-Z0-9 .-_]/', $_POST['username']))
    {
        $errors['username'] = "Username contains illegal characters.";
    }
    */

    if (empty($_POST['password']))
    {
        $errors['password'] = "Password cannot be empty.";
    }

    /**
     * Note there's no upper limit to password length.
     */
    if (strlen($_POST['password']) < 8)
    {
        $errors['password'] = "Password must be at least 8 charcaters.";
    }

    // OPTIONAL
    // Force passwords to contain at least one number and one special character.
    /*
    if (!preg_match('/[0-9]/', $_POST['password']))
    {
        $errors['password'] = "Password must contain at least one number.";
    }
    if (!preg_match('/[\W]/', $_POST['password']))
    {
        $errors['password'] = "Password must contain at least one special character.";
    }
    */

    if (empty($_POST['password_confirm']))
    {
        $errors['password_confirm'] = "Please confirm password.";
    }

    if ($_POST['password'] != $_POST['password_confirm'])
    {
        $errors['password'] = "Passwords do not match.";
    }

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email)
    {
        $errors['email'] = "Not a valid email address.";
    }

    /**
     * Check that the username and email aren't already in our database.
     * Note the use of prepared statements. If you aren't using prepared
     * statements, be sure to escape your data before passing it to the query.
     *
     * Note also the absence of SELECT *
     * Grab the columns you need, nothing more.
     */
    $query = "SELECT username, email
              FROM users
              WHERE username = :username OR email = :email";
    $stmt = $sql->prepare($query);
    $stmt->execute(array(
        ':username' => $_POST['username'],
        ':email' => $email
    ));

    /**
     * There may well be more than one point of failure, but all we really need
     * is the first one.
     */
    $existing = $stmt->fetchObject();

    if ($existing)
    {
        if ($existing->username == $_POST['username'])
        {
            $errors['username'] = "That username is already in use.";
        }
        if ($existing->email == $email)
        {
            $errors['email'] = "That email address is already in use.";
        }
    }
}

/**
 * If the form has been submitted and no errors were detected, we can proceed
 * to account creation.
 */
if (!empty($_POST) && empty($errors))
{
    /**
     * Hash password before storing in database
     */
    $hasher = new PasswordHash(8, FALSE);
    $password = $hasher->HashPassword($_POST['password']);

    /**
     * I'm going to mention it again because it's important; if you aren't using
     * prepared statements, be sure to escape your data before passing it to
     * your query.
     */
    $query = "INSERT INTO users (username, password, email, created)
              VALUES (:username, :password, :email, NOW())";
    $stmt = $sql->prepare($query);
    $success = $stmt->execute(array(
        ':username' => $_POST['username'],
        ':password' => $password,
        ':email'    => $_POST['email'],
    ));

    if ($success)
    {
        $message = "Account created.";
	
    
    }
    else
    {
        $errors['registration'] = "Account could not be created. Please try again later.";
    }
}

?>




<!--user registration end-->
<!--user login-->

<?php



// User is already logged in. Redirect them somewhere useful.
if (isset($_SESSION['user_id']))
{
    header('Location: index.php');
   exit();
}

//include 'password/PasswordHash.php';

///include 'connection/config.php';


$hasher = new PasswordHash(8, FALSE);

if (!empty($_POST))
{
    $query = "SELECT id, password, UNIX_TIMESTAMP(created) AS salt
              FROM users
              WHERE username = :username";
    $stmt = $sql->prepare($query);
    $stmt->execute(array(':username' => $_POST['username']));
    $user = $stmt->fetchObject();

    /**
     * Check that the query returned a result (otherwise user doesn't exist)
     * and that provided password is correct.
     */
    if ($user && $user->password == $hasher->CheckPassword($_POST['password'], $user->password))
    {
        /**
         * Set cookies here if/as needed.
         * Set session data as needed. DO NOT store user's password in
         * cookies or sessions!
         * Redirect the user if/as required.
         */
        session_regenerate_id();
        $_SESSION['user_id']   = $user->id;
        $_SESSION['loggedIn']  = TRUE;
        $_SESSION['signature'] = md5($user->id . $_SERVER['HTTP_USER_AGENT'] . $user->salt);
		header('Location: index.php');
    }
    /**
     * Don't provide specific details as to whether username or password was
     * incorrect. If an attacker knows they've found a valid username, you've
     * just made their life easier.
     */
    else
    {
        $error = "Login failed.";
    }
}

?>


<!--user login end-->

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
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart ( <?php if(isset($_SESSION['user_id'])) {
								$uid=$_SESSION['user_id'];

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
 }}
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
    
	<div class="subheader">
		<div class="container">
			<h3>LOGIN</h3>
    	 </div>
 	</div>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
                        
                        
					   <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
      
          <form class="form col-md-12 center-block" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="User" id="username" name="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" id="password" name="password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <a href="#">Need help?</a></span>
            </div>
          </form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2
						  ><?php if (isset($message)): ?>
        <p class="success"><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Note that we're again checking that each array key exists before
             trying to use it, in order to prevent undefined index notices. -->
        <?php if (isset($errors['registration'])): ?>
        <p class="error"><?php echo $errors['registration']; ?></p>
        <?php endif; ?>


        <form class="form col-md-12 center-block" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset id="registration">
                
                <input class="form-control input-lg" type="text" id="username" name="username"  placeholder="User"/>
                <span class="error">
                    <?php echo isset($errors['username']) ? $errors['username'] : ''; ?>
                </span><br />

              
                <input  class="form-control input-lg" type="text" id="email" name="email" placeholder="Email Address"  />
                <span class="error">
                    <?php echo isset($errors['email']) ? $errors['email'] : ''; ?>
                </span><br />

               
                <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password"  />
                <span class="error">
                    <?php echo isset($errors['password']) ? $errors['password'] : ''; ?>
                </span><br />

             <input  class="form-control input-lg" type="password" id="password_confirm" name="password_confirm"  placeholder="Confirm Password" />
                <span class="error">
                    <?php echo isset($errors['password_confirm']) ? $errors['password_confirm'] : ''; ?>
                </span><br />

                <button class="btn btn-primary btn-lg btn-block">Sign Up</button>
            </fieldset>
        </form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
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