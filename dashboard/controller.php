<?php 
include("includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from admin_view where userName = '" . $_POST['userName'] . "' and passWord = '" . $_POST['passWord'] . "'");
	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['adminId'] = $res['adminId'];
		header("Location: home.php");
	}
	else
	{
		header("Location: login.php?login=failed");
	}
}

 ?>