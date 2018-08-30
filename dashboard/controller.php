<?php 
include("includes/connection.php");

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	$qry = mysqli_query($connection, "select * from admin_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "'");
	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);
		$_SESSION['accountType'] = 'admin';
		$_SESSION['accountId'] = $res['accountId'];
		header("Location: home.php");
	}
	else
	{
		$qry = mysqli_query($connection, "select * from employee_view where userName = '" . $_POST['userName'] . "' and passWord = '" . md5($_POST['passWord']) . "'");
		if (mysqli_num_rows($qry) > 0) {
			$res = mysqli_fetch_assoc($qry);
			$_SESSION['accountType'] = 'employee';
			$_SESSION['accountId'] = $res['accountId'];
			header("Location: home.php");
		}
		else
		{
			$_SESSION['do'] = 'failed';
			header("Location: login.php");
		}
	}
}


if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	session_destroy();
	session_start();
	$_SESSION['do'] = 'logout';
	header("Location: login.php");
}

if (isset($_GET['from']) and $_GET['from'] == 'login-first') {
	session_destroy();
	session_start();
	$_SESSION['do'] = 'login-first';
	header("Location: login.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-walk-in-customer') {

	mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, contactNumber, province, city, barangay, street, buildingNumber) values ('" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['contactNumber'] . "','" . $_POST['province'] . "', '" . $_POST['city'] . "', '" . $_POST['barangay'] . "', '" . $_POST['street'] . "', '" . $_POST['buildingNumber'] . "')");
	$profileId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into customer_table (profileId, accountId, customerType) values ('" . $profileId . "', 6, 'Walk-in')");

	$_SESSION['do'] = 'added';
	header("Location: list-of-walk-in-customers.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'update-walk-in-customer') {
	



	mysqli_query($connection, "update profile_table set firstName = '" . $_POST['firstName'] . "', middleName = '" . $_POST['middleName'] . "', lastName = '" . $_POST['lastName'] . "', contactNumber = '" . $_POST['contactNumber'] . "',province = '" . $_POST['province'] . "',city = '" . $_POST['city'] . "', barangay = '" . $_POST['barangay'] . "', street = '" . $_POST['street'] . "', buildingNumber = '" . $_POST['buildingNumber'] . "' where profileId = '" . $_POST['profileId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: list-of-walk-in-customers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-walk-in-customer') {
	
	mysqli_query($connection, "delete from profile_table where profileId = '" . $_POST['profileId'] . "'");

	mysqli_query($connection, "delete from customer_table where customerId = '" . $_POST['customerId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: list-of-walk-in-customers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-van') {
	mysqli_query($connection, "insert into van_table (make, model, modelYear, plateNumber) values ('" . $_POST['make'] . "', '" . $_POST['model'] . "', '" . $_POST['modelYear'] . "', '" . $_POST['plateNumber'] . "')");
	$_SESSION['do'] = 'added';
	header("Location: list-of-vans.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-van') {
	mysqli_query($connection, "update van_table set make = '" . $_POST['make'] . "', model = '" . $_POST['model'] . "', modelYear = '" . $_POST['modelYear'] . "', plateNumber = '" . $_POST['plateNumber'] . "' where vanId = '" . $_POST['vanId'] . "'");
	$_SESSION['do'] = 'updated';
	header("Location: list-of-vans.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-van') {
	mysqli_query($connection, "delete from van_table where vanId = '" . $_POST['vanId'] . "'");
	$_SESSION['do'] = 'deleted';
	header("Location: list-of-vans.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-place') {
	mysqli_query($connection, "insert into place_table (placeName, longtitude, latitude) values ('" . $_POST['placeName'] . "', '" . $_POST['longtitude'] . "', '" . $_POST['latitude'] . "')");
	$_SESSION['do'] = 'added';
	header("Location: list-of-destinations.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-place') {
	mysqli_query($connection, "update place_table set placeName = '" . $_POST['placeName'] . "', longtitude = '" . $_POST['longtitude'] . "', latitude = '" . $_POST['latitude'] . "' where placeId = '" . $_POST['placeId'] . "'");
	$_SESSION['do'] = 'updated' ;
	header("Location: list-of-destinations.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-place') {
	mysqli_query($connection, "delete from place_table where placeId = '" . $_POST['placeId'] . "'");
	$_SESSION['do'] = 'delete';
	header("Location: list-of-destinations.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-package') {


	mysqli_query($connection, "insert into departure_and_return_date_table (departureDate, returnDate) values ('" . $_POST['departureDate'] . "', '" . $_POST['returnDate'] . "')");
	$departureAndReturnDateId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into package_table (packageName, pax, packageDetails, price, inclusion, exclusion, departureAndReturnDateId,packageStatus,datePosted) values ('" . $_POST['packageName'] . "', '" . $_POST['pax'] . "', '" . $_POST['packageDetails'] . "', '" . $_POST['price'] . "', '" . $_POST['inclusion'] . "', '" . $_POST['exclusion'] . "', '" . $departureAndReturnDateId . "', 'open', '" . date("Y-m-d") . "')");
	$packageId = mysqli_insert_id($connection);

	foreach ($_POST['places'] as $placeId)
	{	
		mysqli_query($connection, "insert into destination_table (packageId, placeId) values ('" . $packageId . "', '" . $placeId . "')");
	  
	}

	$_SESSION['do'] = 'added';
	header("Location: list-of-packages.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-package') {

	mysqli_query($connection, "update departure_and_return_date_table set departureDate = '" . $_POST['departureDate'] . "', returnDate = '" . $_POST['returnDate'] . "' where departureAndReturnDateId = '" . $_POST['departureAndReturnDateId'] . "'");

	mysqli_query($connection, "update package_table set packageName = '" . $_POST['packageName'] . "', pax = '" . $_POST['pax'] . "', packageDetails = '" . $_POST['packageDetails'] . "',price = '" . $_POST['price'] . "', inclusion = '" . $_POST['inclusion'] . "', exclusion = '" . $_POST['exclusion'] . "' where packageId = '" . $_POST['packageId'] . "'");

	mysqli_query($connection, "delete from destination_table where packageId = '" . $_POST['packageId'] . "'");

	foreach ($_POST['places'] as $placeId)
	{	
		mysqli_query($connection, "insert into destination_table (packageId, placeId) values ('" . $_POST['packageId'] . "', '" . $placeId . "')");
	}

	$_SESSION['do'] = 'updated';
	header("Location: list-of-packages.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'delete-package') {
	mysqli_query($connection, "delete from departure_and_return_date_table where departureAndReturnDateId = '" . $_POST['departureAndReturnDateId'] . "'");
	mysqli_query($connection, "delete from destination_table where packageId = '" . $_POST['packageId'] . "'");
	mysqli_query($connection, "delete from package_table where packageId = '" . $_POST['packageId'] . "'");
	$_SESSION['do'] = 'deleted';
	header("Location: list-of-packages.php");
}


if (isset($_POST['from']) and $_POST['from'] == 'add-package-image') {


	$target_dir = "package_media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);



	mysqli_query($connection, "insert into package_media_table (mediaLocation, packageId) values ('" . $target_file . "', '" . $_POST['packageId'] . "')");


	$_SESSION['do'] = 'added';
	header("Location: list-of-package-images.php?packageId=".$_POST['packageId']."&packageName=".$_POST['packageName']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'update-package-image') {


	$target_dir = "package_media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);

	mysqli_query($connection, "update package_media_table set mediaLocation = '" . $target_file . "' where packageMediaId = '" . $_POST['packageMediaId'] . "'");
	

	$_SESSION['do'] = 'updated';
	header("Location: list-of-package-images.php?packageId=".$_POST['packageId']."&packageName=".$_POST['packageName']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'delete-package-image') {

	mysqli_query($connection, "delete from package_media_table where packageMediaId = '" . $_POST['packageMediaId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: list-of-package-images.php?packageId=".$_POST['packageId']."&packageName=".$_POST['packageName']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'update-profile') {

	mysqli_query($connection, "update profile_table set firstName = '" . $_POST['firstName'] . "',middleName = '" . $_POST['middleName'] . "', lastName = '" . $_POST['lastName'] . "',buildingNumber = '" . $_POST['buildingNumber'] . "', street = '" . $_POST['street'] . "', barangay = '" . $_POST['barangay'] . "', city = '" . $_POST['city'] . "', province = '" . $_POST['province'] . "', contactNumber = '" . $_POST['contactNumber'] . "' where profileId = '" . $_POST['profileId'] . "' ");

	$_SESSION['do'] = 'updated';
	header("Location: profile.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'update-password-profile') {
	if ($_POST['passWord'] == md5($_POST['oldPassword']) and $_POST['newPassword'] == $_POST['confirmNewPassword']) {
		mysqli_query($connection, "update account_table set passWord = '" . md5($_POST['newPassword']) . "' where accountId = '" . $_POST['accountId'] . "' ");
		$_SESSION['do'] = 'updated';
	}
	else
	{
		$_SESSION['do'] = 'updated-password-failed';
	}
	header("Location: profile.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'add-employee') {
	$qry = mysqli_query($connection,"select * from account_table where userName = '" . $_POST['userName'] . "'");
	if (mysqli_num_rows($qry) == 0) {
		mysqli_query($connection, "insert into profile_table (firstName, middleName, lastName, contactNumber, province, city, barangay, street, buildingNumber) values ('" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['contactNumber'] . "','" . $_POST['province'] . "', '" . $_POST['city'] . "', '" . $_POST['barangay'] . "', '" . $_POST['street'] . "', '" . $_POST['buildingNumber'] . "')");
		$profileId = mysqli_insert_id($connection);

		mysqli_query($connection, "insert into account_table (userName, passWord) values ('" . $_POST['userName'] . "', '" . md5($_POST['passWord']) . "')");

		$accountId = mysqli_insert_id($connection);

		mysqli_query($connection, "insert into employee_table (profileId, accountId) values ('" . $profileId . "', '" . $accountId . "')");

		$_SESSION['do'] = 'added';
	}
	else
	{
		$_SESSION['do'] = 'username-taken';
	}

	header("Location: list-of-employees.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'update-employee') {
	



	mysqli_query($connection, "update profile_table set firstName = '" . $_POST['firstName'] . "', middleName = '" . $_POST['middleName'] . "', lastName = '" . $_POST['lastName'] . "', contactNumber = '" . $_POST['contactNumber'] . "',province = '" . $_POST['province'] . "',city = '" . $_POST['city'] . "', barangay = '" . $_POST['barangay'] . "', street = '" . $_POST['street'] . "', buildingNumber = '" . $_POST['buildingNumber'] . "' where profileId = '" . $_POST['profileId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: list-of-employees.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-employee') {
	
	mysqli_query($connection, "delete from profile_table where profileId = '" . $_POST['profileId'] . "'");

	mysqli_query($connection, "delete from employee_table where employeeId = '" . $_POST['employeeId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: list-of-walk-in-customers.php");
}

 ?>