<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application List</title>
    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container my-5">
        <h2>Student Application List</h2>
        <p><i>Students Can Only View their own Applications</i></p>
        <a class="btn btn-danger" href="../login.html" role="button">LOGOUT</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Date Applied</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php

                session_start();

                // Retrieve data for the logged-in student
                $studentId = $_SESSION['USER_ID']; 

                  // Check if the student ID is set
                  if (isset($studentId)) {
                    require_once("../config.php");
                    require_once("../functions.php");

                    // Retrieve data from the table
                    $array = array();
                    $select = "SELECT * FROM practical_training WHERE fk_userid = $studentId WHERE applicationstatus = 'Approved'";
                    $sql = mysqli_query($GLOBALS['conn'], $select);

                    // Check if the query executed successfully
                    if ($sql) {
                        if (mysqli_num_rows($sql) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_array($sql)) {
                              $array['userid'] = $row['fk_userid'];
                              $profile = getUsersData($array['userid']);
                              echo "
                              <tr>
                                  <td>$row[applicationid]</td>
                                  <td>$profile[name]</td>
                                  <td>$row[applicationdate]</td>  
                                  <td>$row[applicationtitle]</td>
                                  <td>$row[applicationstatus]</td>  
                              </tr> 
                              ";
                            }
                        } else {
                            echo "0 results";
                        }

                        mysqli_close($conn);
                    } else {
                        echo "Query execution failed.";
                    }
                  } else {
                    echo "Student ID is not set.";
                  }

                ?>
            </tbody>
        </table>
</body>

</html>