<?php

require_once("../config.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$sql = "DELETE FROM practical_training WHERE applicationid = $id LIMIT 1";

if (mysqli_query($conn, $sql)) {
    echo "User deleted successfully";
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <BR><BR>
    <a href="student_application_list.php">Click here to view updated application list</a>
</body>

</html>