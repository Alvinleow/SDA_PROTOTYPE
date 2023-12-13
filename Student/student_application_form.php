<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>


<?php
require_once("../config.php");
session_start();
$id = $_SESSION['USER_ID'];
$query = mysqli_query($conn, "SELECT * FROM users where userid = '$id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
?>

<body>
    <?php
    include('../includes/headerStudent.html');
    ?>

      <div class="container" style="padding-top: 183px; margin-bottom: 48px;">
      <h1 style="text-align: center;">Application of Internship Session</h1>
      <label style="display: block; text-align: end;">
        <b>Date :</b>
        <input id="remove-border" style="font-size:15px; font-weight: bold;" type="text" name="applicationdate" value="<?php date_default_timezone_set("Asia/Kuala_Lumpur");																																echo date("d-M-Y"); ?>" readonly />
      </label>
      <br><br>
        <h2>Personal Information</h2>
        <form method="post" action="add_application.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fullname" value="<?php if (isset($row['name']))
                        echo htmlspecialchars($row['name']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Matric Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="matricnumber" value="<?php if (isset($row['matricnumber']))
                        echo htmlspecialchars($row['matricnumber']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="age" value="<?php if (isset($row['age']))
                        echo htmlspecialchars($row['age']); ?>" required>
                </div>
            </div>
            <!-- maybe add a password confirmation field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phoneNumber" size="30" maxlength="60" value="<?php if (isset($row['phoneNumber']))
                        echo htmlspecialchars($row['phone']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <select class="form-select" name="gender">
                        <option value="Male" <?php if (isset($row['gender']) && $row['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if (isset($row['gender']) && $row['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" size="30" maxlength="60" value="<?php if (isset($row['email']))
                        echo htmlspecialchars($row['email']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php if (isset($row['address']))
                        echo htmlspecialchars($row['address']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nationality" value="<?php if (isset($row['nationality']))
                        echo htmlspecialchars($row['nationality']); ?>" required>
                </div>
            </div>

        <h2>Company Information</h2>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="companyName" value="<?php if (isset($row['companyName']))
                        echo htmlspecialchars($row['companyName']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="companyContact" value="<?php if (isset($row['companyContact']))
                        echo htmlspecialchars($row['companyContact']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="companyEmail" value="<?php if (isset($row['companyEmail']))
                        echo htmlspecialchars($row['companyEmail']); ?>" required>
                </div>
            </div>        
        <h2>Internship Information</h2>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Department Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="depName" value="<?php if (isset($row['depName']))
                        echo htmlspecialchars($row['depName']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Job Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jobTitle" value="<?php if (isset($row['jobTitle']))
                        echo htmlspecialchars($row['jobTitle']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="startDate" value="<?php if (isset($row['startDate']))
                        echo htmlspecialchars($row['startDate']); ?>" onkeyup="check1()" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="endDate" value="<?php if (isset($row['endDate']))
                        echo htmlspecialchars($row['endDate']); ?>" onkeyup="check2()" required>
                </div>
            </div>
            
            </div>
            <div style="margin-bottom: 30px;">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-success" onclick="return Validate()">Submit</button>
                </div>

                <script type="text/javascript">
					function Validate() {
						if(check1() === true && check2() === true) {
							return true;
						} 
						else if (check1() === true && check2() === false) {
							alert("The end date is invalid!");
							return false;
						}
						else if (check1() === false && check2() === true) {
							alert("The start date is invalid!");
							return false;
						}
						else {
							alert("The start and end date is invalid!");
							return false;
						}
					}

					function check1() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var now = new Date();
						if(now > Startdate) {
							return false;
						}
						else {
							return true;
						}
					}

					function check2() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var Enddate = new Date(document.getElementById('end_date').value);
						if(Enddate < Startdate) {
							return false;
						}
						else {
							return true;
						}
					}

					var check1 = function() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var now = new Date();
						if(now > Startdate) {
							document.getElementById('message1').style.color = 'red';
							document.getElementById('message1').innerHTML = 'Start date should be later than application date.';
							return false;
						}
						else {
							return true;
						}
					}

					var check2 = function() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var Enddate = new Date(document.getElementById('end_date').value);
						if(Enddate < Startdate) {
							document.getElementById('message2').style.color = 'red';
							document.getElementById('message2').innerHTML = 'End date should be later than start date.';
							return false;
						}
						else {
							return true;
						}
					}
				</script>
            </div>
        </form>
    </div>

    <?php
    include('../includes/footer.html');
    ?>
</body>

</html>