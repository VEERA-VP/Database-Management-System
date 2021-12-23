<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $gender = $_POST['gender'];	
    $bloodgrp = $_POST['bloodgrp'];	
	$age = isset($_GET['age']) ? $_GET['age'] : '';

	// Database connection
	$conn = new mysqli('localhost','root','','testd');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into request(username, email, password, gender, bloodgrp, age) values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $username,$email,$password,$gender,$bloodgrp,$age);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>