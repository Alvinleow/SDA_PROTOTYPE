<html>

<head>
	<title>Internship Application</title>
	<link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<?php
require_once("../config.php");
session_start();
$id = $_SESSION['userid'];
$_SESSION['t_id'] = $_GET['t_id'];
$t_id = $_SESSION['t_id'];
$query = mysqli_query($conn, "SELECT * FROM users INNER JOIN practical_training INNER JOIN company INNER JOIN user_detail on users.userid = practical_training.fk_userid AND practical_training.applicationid = company.fk_applicationid = user_detail.fk_applicationid where userid = '$id' AND applicationid = '$t_id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
?>

<body>
	<?php
		



    include('../includes/headerStudent.html');
    ?>

		<h1 style="text-align: center; margin-top: 50px;">Application of Internship Session</h1>
		<label style="display: block; text-align: end; ">
			<b>Date :</b>
			<input type="text" style="font-size:15px; font-weight:bold;" id="remove-border" name="applicationdate" value="<?php echo $row['applicationdate']; ?>" readonly />
		</label>

		<div class="outer-container">
			<form method="post" action="application_homepage.php">
				<div class="entire-table">
					<div class="tableA">
						<h2>A. Personal Information</h2>
						<table class="tablePracticalTraining">
							<tr>
								<td id="num">1.</td>
								<td class="question">Applicant's Name</td>
								<td><input id="remove-border" type="text" name="name" value="<?php echo $row['name']; ?>" readonly /></td>

								<td id="num">5.</td>
								<td class="question">Matric Number</td>
								<td><input id="remove-border" type="text" name="matric_number" value="<?php echo $row['matricnumber']; ?>" readonly /></td>
							</tr>
							<tr>
								<td id="num">2.</td>
								<td class="question">Age</td>
								<td><input id="remove-border" type="number" name="age" value="<?php echo $row['age']; ?>" readonly /></td>

								<td id="num">6.</td>
								<td class="question">Contact Number</td>
								<td><input id="remove-border" type="text" name="phone_number" value="<?php echo $row['phone']; ?>" readonly /></td>
							</tr>
							<tr>
								<td id="num">3.</td>
								<td class="question">Gender</td>
								<td><input id="remove-border" type="text" name="gender" value="<?php echo $row['gender']; ?>" readonly /></td>

								<td id="num">7.</td>
								<td class="question">Email</td>
								<td><input id="remove-border" type="email" name="email" value="<?php echo $row['email']; ?>" readonly /></td>
							</tr>
							<tr>
								<td id="num">4.</td>
								<td class="question">Nationality</td>
								<td><input id="remove-border" type="text" name="nationality" value="<?php echo $row['nationality']; ?>" readonly /></td>

								<td id="num">8.</td>
								<td class="question">Address</td>
								<td><input id="remove-border" type="text" name="address" value="<?php echo $row['address']; ?>" readonly /></td>
							</tr>
						</table>
					</div>
					<div class="tableB">
						<h2>B. Company Information</h2>
						<table>
							<tr>
								<td id="num">1.</td>
								<td class="question">Company Name</td>
								<td><input id="remove-border" type="text" name="company_name" value="<?php echo $row['companyname']; ?>" readonly /></td>
							</tr>
							<tr>
								<td id="num">2.</td>
								<td class="question">Contact Number</td>
								<td><input id="remove-border" type="text" name="contact_number" value="<?php echo $row['companycontactno']; ?>" readonly /></td>
							</tr>
							<tr>
								<td id="num">3.</td>
								<td class="question">Email</td>
								<td><input id="remove-border" type="email" name="company_email" value="<?php echo $row['companyemail']; ?>" readonly /></td>
							</tr>
						</table>
					</div>
					<div class="tableC">
						<h2>C. Internship Information</h2>
						<table>
							<tr>
								<td id="num">1.</td>
								<td class="question">Department Name</td>
								<td><input id="remove-border" type="text" name="dep_name" value="<?php echo $row['department']; ?>" readonly /></td>

								<td id="num">3.</td>
								<td class="question">Start Date</td>
								<td><input id="remove-border" type="date" name="start_date" value="<?php echo $row['startdate']; ?>" readonly /></td>
							</tr>
							<tr>
								<td id="num">2.</td>
								<td class="question">Job Title</td>
								<td><input id="remove-border" type="text" name="job_title" value="<?php echo $row['jobtitle']; ?>" readonly /></td>

								<td id="num">4.</td>
								<td class="question">End Date</td>
								<td><input id="remove-border" type="date" name="end_date" value="<?php echo $row['enddate']; ?>" readonly /></td>
							</tr>
						</table>
					</div>

					<label>
						<input class="button-training" type="submit" name="submit" value="Back" />
					</label>
				</div>
			</form>
		</div>
		<?php include '../includes/footer.html' ?>
</body>

</html>