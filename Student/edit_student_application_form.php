<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>


<?php
require_once("../config.php");
session_start();
$column= false;
$app_id = $_GET["app_id"];
$userlevel = $_GET["userlevel"];
$id = $_SESSION['USER_ID'];
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_GET["column"])) {
    $column= true;  
}

$query = mysqli_query($conn, "SELECT * FROM users where userid = '$id'") or die(mysqli_connect_error());

$query2 = mysqli_query($conn, "SELECT * FROM company where fk_applicationid = '$app_id'") or die(mysqli_connect_error());


$query3 = mysqli_query($conn, "SELECT * FROM user_detail where fk_applicationid = '$app_id'") or die(mysqli_connect_error());


$query4 = mysqli_query($conn, "SELECT * FROM practical_training where fk_userid = '$app_id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
$row2 = mysqli_fetch_array($query2);
$row3 = mysqli_fetch_array($query3);
$row4 = mysqli_fetch_array($query4);

$fullname = $row["name"];
$age = $row["age"];
$phone = $row["phone"];
$email = $row["email"];
$address = $row["address"];


?>

<body>
    <?php
    if ($userlevel == 1) {
        include('../includes/headerAdmin.html');
    } else if ($userlevel == 2) {
        include('../includes/headerCoordinator.html');
    } else if ($userlevel == 3) {
        include('../includes/headerStudent.html');

    }
    ?>

    <div class="container" style="padding-top: 183px; margin-bottom: 48px;">
    <h1 style="text-align: center;">Edit Application of Internship Session</h1>
    <label style="display: block; text-align: end;">
        <b>Date :</b>
        <input id="remove-border" style="font-size:15px; font-weight: bold;" type="text" name="applicationdate"
            value="<?php date_default_timezone_set("Asia/Kuala_Lumpur");
            echo date("d-M-Y"); ?>"
            readonly />
    </label>
    <br><br>
        <h2>Personal Information</h2>
        <form method="post"
            action="edit_student_application.php?app_id=<?php echo $app_id; ?>&userlevel=<?php echo $userlevel; ?>&column=<?php echo $column; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-6">
                    <?php echo $fullname; ?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Matric Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="matricnumber" value="<?php if (isset($row3['matricnumber']))
                        echo htmlspecialchars($row3['matricnumber']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                    <?php echo $age; ?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <?php echo $phone; ?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <select class="form-select" name="gender">
                        <option value="Male" <?php if (isset($row3['gender']) && $row3['gender'] === 'Male')
                            echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if (isset($row3['gender']) && $row3['gender'] === 'Female')
                            echo 'selected'; ?>>Female</option>
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
                    <?php echo $address; ?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nationality" value="<?php if (isset($row3['nationality']))
                        echo htmlspecialchars($row3['nationality']); ?>" required>
                </div>
            </div>

            <h2>Company Information</h2>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="companyName" value="<?php if (isset($row2['companyname']))
                        echo htmlspecialchars($row2['companyname']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="companyContact" value="<?php if (isset($row2['companycontactno']))
                        echo htmlspecialchars($row2['companycontactno']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="companyEmail" value="<?php if (isset($row2['companyemail']))
                        echo htmlspecialchars($row2['companyemail']); ?>" required>
                </div>
            </div>
            <h2>Internship Information</h2>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Department Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="depName" value="<?php if (isset($row2['department']))
                        echo htmlspecialchars($row2['department']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Job Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jobTitle" value="<?php if (isset($row2['jobtitle']))
                        echo htmlspecialchars($row2['jobtitle']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="startDate" value="<?php if (isset($row2['startdate']))
                        echo htmlspecialchars($row2['startdate']); ?>" onkeyup="check1()" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="endDate" value="<?php if (isset($row2['enddate']))
                        echo htmlspecialchars($row2['enddate']); ?>" onkeyup="check2()" required>
                </div>
            </div>

    </div>
    <div class="row mb-3">

        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary" onclick="return Validate()">Save</button>
        </div>

        <script type="text/javascript">
            function Validate() {
                if (check1() === true && check2() === true) {
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
                if (now > Startdate) {
                    return false;
                }
                else {
                    return true;
                }
            }

            function check2() {
                var Startdate = new Date(document.getElementById('start_date').value);
                var Enddate = new Date(document.getElementById('end_date').value);
                if (Enddate < Startdate) {
                    return false;
                }
                else {
                    return true;
                }
            }

            var check1 = function () {
                var Startdate = new Date(document.getElementById('start_date').value);
                var now = new Date();
                if (now > Startdate) {
                    document.getElementById('message1').style.color = 'red';
                    document.getElementById('message1').innerHTML = 'Start date should be later than application date.';
                    return false;
                }
                else {
                    return true;
                }
            }

            var check2 = function () {
                var Startdate = new Date(document.getElementById('start_date').value);
                var Enddate = new Date(document.getElementById('end_date').value);
                if (Enddate < Startdate) {
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