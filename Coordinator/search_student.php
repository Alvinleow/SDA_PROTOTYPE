<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Student Profile</title>
    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container my-5">
        <h2>Search Student Profile</h2>
        <p><i>Accessible to Coordinators</i></p>
        <!-- <a class="btn btn-primary" href="user_form.php" role="button">Add User</a> -->
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $search = $_POST['search'];
                $column = $_POST['column'];

                require_once("../config.php");
                require_once("../functions.php");

                // Retrieve data from table
                $array = array();
                $select = "SELECT * from users u JOIN login l ON u.userid = l.fk_userid where l.userlevel=3 AND $column like '%$search%'";
                $sql = mysqli_query($GLOBALS['conn'], $select);
                $count = 1;

                if (mysqli_num_rows($sql) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_array($sql)) {
                        $row = getUsersData($row['userid']);
                        echo "
                        <tr>
                            <td>$count</td>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[phone]</td>
                            <td>$row[email]</td>
                            <td>$row[age]</td>
                            <td>$row[address]</td>
                            <td>
                                <a class='btn btn-dark btn-sm' href='view_user.php?id=$row[id]'>View</a>
                            </td>
                        </tr> 
                        ";
                        $count++;
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
</body>

</html>