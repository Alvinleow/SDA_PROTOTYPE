<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>


<?php
require_once("../config.php");
session_start();
$app_id = $_GET["app_id"];
$column= false;

$userlevel= $_GET["userlevel"];
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


$query4 = mysqli_query($conn, "SELECT * FROM practical_training where applicationid = '$app_id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
$row2 = mysqli_fetch_array($query2);
$row3 = mysqli_fetch_array($query3);
$row4 = mysqli_fetch_array($query4);

$fullname = $row["name"];
$age = $row["age"];
$phone = $row["phone"];
$email = $row["email"];
$address = $row["address"];

$companyname = $row2["companyname"];
$companycontactno = $row2["companycontactno"];
$companyemail = $row2["companyemail"];
$department = $row2["department"];
$jobtitle = $row2["jobtitle"];
$startdate = $row2["startdate"];
$enddate = $row2["enddate"];

$matricnumber = $row3["matricnumber"];
$gender = $row3["gender"];
$nationality = $row3["nationality"];

$applicationstatus = $row4["applicationstatus"]

?>

<body>
    <?php

    if ($userlevel == 1) {
        include('../includes/headerAdmin.html');
    } 
    else if($userlevel == 2) {
        include('../includes/headerCoordinator.html');
    }else if ($userlevel == 3) {
        include('../includes/headerStudent.html');
        
    }
    // include('../includes/headerStudent.html');
    ?>

      <div class="container" style="padding-top: 183px; margin-bottom: 48px;">
      <h1 style="text-align: center;">View Application of Internship Session</h1>
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
                  <?php echo $fullname;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Matric Number</label>
                <div class="col-sm-6">
                <?php echo $matricnumber;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-6">
                  <?php echo $age;?>
                </div>
            </div>
            <!-- maybe add a password confirmation field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                  <?php echo $phone;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                <?php echo $gender;?>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                <?php echo $email;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                  <?php echo $address;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-6">
                <?php echo $nationality;?>
                </div>
            </div>

        <h2>Company Information</h2>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-6">
                <?php echo $companyname;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-6">
                <?php echo $companycontactno;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                <?php echo $companyemail;?>
                </div>
            </div>        
        <h2>Internship Information</h2>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Department Name</label>
                <div class="col-sm-6">
                <?php echo $department;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Job Title</label>
                <div class="col-sm-6">
                <?php echo $jobtitle;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-6">
                <?php echo $startdate;?>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-6">
                <?php echo $enddate;?>
                </div>
            </div>
            
            <?php if ($userlevel == 3): ?>
                
                <div>
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <?php if ($applicationstatus == 'Approved' || $applicationstatus == 'Rejected'): ?>
                            <a href="report_approved.php" class="btn btn-primary">Return</a>
                        <?php else: ?>
                            <a href="student_application_list.php" class="btn btn-primary">Return</a>
                        <?php endif; ?>
                    </div>
                    </div>
                <?php elseif ($userlevel == 1): ?>
                    <div>
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <a href="../Coordinator/application_list.php" class="btn btn-primary">Return</a>
                    </div>
                    </div>
                <?php elseif ( $userlevel == 2): ?>
                    <div>
                    <div class="offset-sm-3 col-sm-3 d-grid">
                    <?php if ($column == true): ?>
                            <a href="../Coordinator/coordinator_page.php" class="btn btn-primary">Return</a>
                        <?php else: ?>
                            <a href="../Coordinator/application_list.php" class="btn btn-primary">Return</a>
                        <?php endif; ?>
                    </div>
                    </div>

            <?php endif; ?>

            </div>

        </form>
    </div>
    <?php
    include('../includes/footer.html');
    ?>
</body>

</html>