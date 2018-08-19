<?php 
include("includes/connection.php");
if (isset($adminid)) {
	header("Location: home.php");
}
else
{
	header("Location: login.php");
}

 ?>