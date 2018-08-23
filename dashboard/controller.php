<?php 
include("includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from admin_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "'");
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



if (isset($_POST['from']) and $_POST['from'] == 'add-walk-in-customer') {

	mysqli_query($connection, "insert into address_table (province, city, barangay, street, buildingNumber) values ('" . $_POST['province'] . "', '" . $_POST['city'] . "', '" . $_POST['barangay'] . "', '" . $_POST['street'] . "', '" . $_POST['buildingNumber'] . "')");
	$addressId = mysqli_insert_id($connection);
	
	mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, addressId, contactNumber) values ('" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "', '" . $_POST['lastName'] . "', '" . $addressId . "', '" . $_POST['contactNumber'] . "')");
	$profileId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into customer_table (profileId, accountId, customerTypeId) values ('" . $profileId . "', 4, 1)");

	$_SESSION['do'] = 'trigger';
	header("Location: list-of-walk-in-customers.php");

}

 ?>