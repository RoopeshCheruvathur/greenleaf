<?php

	session_start();
	if($_SESSION["user_id"]=="")
	{
		?>
		<script type="text/javascript">
			window.location="index.php";
        </script>
		<?php
	}
	else
	{
		include "connection/conect.php";
		mysql_query("delete from add_2_cart where p_id='$_GET[id]'");
		?>
        <script type="text/javascript">
			window.location="cart.php";
        </script>
			<?php
	}
?>