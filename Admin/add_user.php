<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Guest</title>
	<link rel="stylesheet" href="../Admin/adminstyle.css">
</head>

<body>
	<?php
    include('../includes/headerAdmin.html');
    ?>
	<?php
	$fullname = $_POST["fullname"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$age = $_POST["age"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$userlevel = $_POST["userlevel"];

	require_once("../config.php");

	//Input all fieldnames into table
	$sql1 = "INSERT INTO users(email, name, address, age, phone) VALUES ('$email', '$fullname', '$address', '$age', '$phone')";
	mysqli_query($conn, $sql1) or die(mysqli_connect_error());
	
	$id = mysqli_insert_id($conn);
	$sql2 = "INSERT INTO login(username, password, userlevel, fk_userid) VALUES ('$username', '$password', '$userlevel' , '$id')";
	mysqli_query($conn, $sql2) or die(mysqli_connect_error());
	
	if (mysqli_affected_rows($conn) == 1) {
		echo "<a id='echo'>New user created successfully &#9745</a>";
	} else {
		echo "User cannot be created\n";
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
	?>

	<br>
	<!-- Need to add UI for this updated page and error checking -->
	<BR><BR><BR><BR><BR><BR>
	<section id="updatelist">
	<a href="user_list.php" id="updatelist">Click here to see the updated user list</a>
</body>

</html>