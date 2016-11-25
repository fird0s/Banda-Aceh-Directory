<?php
	include("connection.php");
	// , $_POST["email"], $_POST["latitude"], $_POST["longtitude"],  $_POST["type"], $_POST["description"])
	if ( isset($_POST["directory"] )){
		$sql = "INSERT INTO directory (directory_name, email, website, directory_type, description, date_add, latitude, longtitude)
		VALUES ('".$_POST['directory']."', '".$_POST['email']."', '".$_POST['website']."', '".$_POST['type']."', '".$_POST['description']."', '".date("Y-m-d")."' , '".$_POST['latitude']."', '".$_POST['longtitude']."')";
		mysql_query($sql, $bd);
	}
?>