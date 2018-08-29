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
		$_SESSION['do'] = 'failed';
		header("Location: login.php");
	}
}


if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	session_destroy();
	session_start();
	$_SESSION['do'] = 'logout';
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
	
	$qry = mysqli_query($connection, "select * from customer_view where customerId = '" . $_POST['customerId'] . "'");
	$res = mysqli_fetch_assoc($qry);

	mysqli_query($connection, "update address_table set province = '" . $_POST['province'] . "',city = '" . $_POST['city'] . "', barangay = '" . $_POST['barangay'] . "', street = '" . $_POST['street'] . "', buildingNumber = '" . $_POST['buildingNumber'] . "' where addressId = '" . $res['addressId'] . "'");

	mysqli_query($connection, "update profile_table set firstName = '" . $_POST['firstName'] . "', middleName = '" . $_POST['middleName'] . "', lastName = '" . $_POST['lastName'] . "', contactNumber = '" . $_POST['contactNumber'] . "' where profileId = '" . $res['profileId'] . "'");

	$_SESSION['do'] = 'updated';
	header("Location: list-of-walk-in-customers.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-walk-in-customer') {
	
	$qry = mysqli_query($connection, "select * from customer_view where customerId = '" . $_POST['customerId'] . "'");
	$res = mysqli_fetch_assoc($qry);

	mysqli_query($connection, "delete from address_table where addressId = '" . $res['addressId'] . "'");

	mysqli_query($connection, "delete from profile_table where profileId = '" . $res['profileId'] . "'");

	mysqli_query($connection, "delete from customer_table where customerId = '" . $res['customerId'] . "'");

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


	mysqli_query($connection, "insert into package_table (packageName, pax, packageDetails, price, inclusion, exclusion) values ('" . $_POST['packageName'] . "', '" . $_POST['pax'] . "', '" . $_POST['packageDetails'] . "', '" . $_POST['price'] . "', '" . $_POST['inclusion'] . "', '" . $_POST['exclusion'] . "')");
	$packageId = mysqli_insert_id($connection);

	foreach ($_POST['places'] as $placeId)
	{	
		mysqli_query($connection, "insert into destination_table (packageId, placeId) values ('" . $packageId . "', '" . $placeId . "')");
	  
	}

	$_SESSION['do'] = 'added';
	header("Location: list-of-packages.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'update-package') {

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

	mysqli_query($connection, "insert into media_location_table (mediaLocation) values ('" . $target_file . "')");
	$mediaLocationId = mysqli_insert_id($connection);

	mysqli_query($connection, "insert into package_media_table (mediaLocationId, packageId) values ('" . $mediaLocationId . "', '" . $_POST['packageId'] . "')");


	$_SESSION['do'] = 'added';
	header("Location: list-of-package-images.php?packageId=".$_POST['packageId']."&packageName=".$_POST['packageName']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'update-package-image') {


	$target_dir = "package_media/";
	$target_file = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["mediaLocation"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["mediaLocation"]["tmp_name"], $target_file);

	mysqli_query($connection, "update media_location_table set mediaLocation = '" . $target_file . "' where mediaLocationId = '" . $_POST['mediaLocationId'] . "'");
	$mediaLocationId = mysqli_insert_id($connection);

	$_SESSION['do'] = 'updated';
	header("Location: list-of-package-images.php?packageId=".$_POST['packageId']."&packageName=".$_POST['packageName']."");

}

if (isset($_POST['from']) and $_POST['from'] == 'delete-package-image') {

	mysqli_query($connection, "delete from media_location_table where mediaLocationId = '" . $_POST['mediaLocationId'] . "'");

	$_SESSION['do'] = 'deleted';
	header("Location: list-of-package-images.php?packageId=".$_POST['packageId']."&packageName=".$_POST['packageName']."");

}
 ?>