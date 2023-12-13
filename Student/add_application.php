<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Guest</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
  <?php
  include('../includes/headerStudent.html');
  ?>

  
  <?php
  session_start();
	require_once("../config.php");

	// if(isset($_POST['submit'])) {
    $id = $_SESSION['USER_ID'];
    $application_title = $_POST['companyName']. "/" .$_POST['jobTitle'];
    $application_date = date("d-M-Y");
    $status = "Submitted";
    $fullname = $_POST["fullname"];
    $matricnumber = $_POST["matricnumber"];
    $age = $_POST["age"];
    $phoneNumber = $_POST["phoneNumber"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $nationality = $_POST["nationality"];
    $companyName = $_POST["companyName"];
    $companyContact = $_POST["companyContact"];
    $companyEmail = $_POST["companyEmail"];
    $depName = $_POST["depName"];
    $jobTitle = $_POST["jobTitle"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    require_once("../config.php");

  $application_id = mysqli_insert_id($conn); 
  echo $application_id;

	//Input all fieldnames into table

  $query = "INSERT INTO practical_training 
  (applicationtitle, applicationdate, applicationstatus, fk_userid) VALUES
   ('$application_title', '$application_date', '$status', '$id')"; 
   $result = mysqli_query($conn, $query) or die(mysqli_connect_error());

  $application_id = mysqli_insert_id($conn); 
  echo $application_id;

  $query2 = "INSERT INTO company 
  (companyname, companycontactno, companyemail, department, jobtitle, startdate, enddate, fk_applicationid) VALUES
   ('$companyName', '$companyContact', '$companyEmail', '$depName', '$jobTitle', '$startDate', '$endDate', '$application_id')"; 
  $result2 = mysqli_query($conn, $query2) or die(mysqli_connect_error());

  $query3 = "INSERT INTO user_detail 
  (gender, matricnumber, nationality, fk_applicationid) VALUES
   ('$gender', '$matricnumber', '$nationality', '$application_id')"; 
  $result3 = mysqli_query($conn, $query3) or die(mysqli_connect_error());

  if($result && $result2 && $result3) {
		header('location:student_application_list.php');
	}
	else {
		header('location:student_application_form.php');
	}
	
	// mysqli_close($conn);
  // }
	?>

	<!-- <br> -->
	<!-- Need to add UI for this updated page and error checking -->
  <BR><BR><BR><BR><BR><BR>
	<a href="student_application_list.php">Click here to see the updated application list</a>
</body>

</html>