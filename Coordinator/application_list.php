<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Application List</title>
    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>

<body>
    <?php
    require_once("../config.php");
    require_once("../functions.php");

    session_start();
    $userID = $_SESSION['USER_ID'];
    $array = array();
    $query = mysqli_query($conn, "SELECT * FROM login WHERE fk_userid = $userID") or die(mysqli_connect_error());
    $row2 = mysqli_fetch_assoc($query);
    $userlevel = $row2['userlevel'];

    if ($userlevel == 1) {
        include('../includes/headerAdmin.html');
    } else if ($userlevel == 2) {
        include('../includes/headerCoordinator.html');
    } else if ($userlevel == 3) {
        include('../includes/headerStudent.html');
    }
    ?>
    <div class="container" style="padding-top: 183px; margin-bottom: 48px;">
        <h2 style="text-align:center; font-weight:bold">Full Application List</h2>
        <p style="text-align:center; font-weight:bold"><i>Full List Only Accessible to Admins and Coordinators</i></p>
        <p><i>Sorted by User ID</i></p>
        <!-- <a class="btn btn-primary" href="user_form.php" role="button">Add User</a> -->
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Application ID</th>
                    <th>User ID</th>
                    <th>Applicant</th>
                    <th>Date Applied</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $select = "SELECT * from practical_training ORDER BY fk_userid ASC";
                $sql = mysqli_query($GLOBALS['conn'], $select);
                $count = 1;
                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_array($sql)) {
                        $array['userid'] = $row['fk_userid'];
                        $profile = getUsersData($array['userid']);
                        echo "
                        <tr>
                            <td>$count</td>
                            <td>$row[applicationid]</td>
                            <td>$profile[id]</td>
                            <td>$profile[name]</td>
                            <td>$row[applicationdate]</td>
                            <td>$row[applicationtitle]</td>
                            <td>$row[applicationstatus]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='../Student/edit_student_application_form.php?app_id=$row[applicationid]&id=$array[userid]&userlevel=$userlevel'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='../Student/delete_student_application.php?app_id=$row[applicationid]'>Delete</a>
                                <a class='btn btn-dark btn-sm' href='../Student/view_student_application.php?app_id=$row[applicationid]&id=$array[userid]&userlevel=$userlevel'>View</a>
                            </td>
                        </tr> 
                        ";
                        $count++;
                    }
                } else {
                    echo "<a id='echo' style='color:black; text-align:left;'>0 results</a>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <?php include('../includes/footer.html'); ?>
</body>

</html>