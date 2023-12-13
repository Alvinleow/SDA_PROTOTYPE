<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search All Users</title>
    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Admin/adminstyle.css">
</head>

<body>
    <link rel="stylesheet" href="../Admin/adminstyle.css"><?php
    include('../includes/headerAdmin.html');
    ?>
    <div class="container" style="padding-top: 183px; margin-bottom: 48px;">
        <h2 style="text-align:center; font-weight:bold">Search All Users</h2>
        <p style="text-align:center; font-weight:bold"><i>Accessible to Admins</i></p>
        <!-- <a class="btn btn-primary" href="user_form.php" role="button">Add User</a> -->
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $search = $_POST['search'];
                $column = $_POST['column'];

                require_once("../config.php");
                require_once("../functions.php");

                $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE $column LIKE '%$search%'") or die(mysqli_connect_error());
                $count = 1;

                if (mysqli_num_rows($sql1) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_array($sql1)) {
                        $sql2 = mysqli_query($conn, "SELECT * FROM login where fk_userid = $row[userid]");
                        $row2 = mysqli_fetch_array($sql2);
                        echo "
                        <tr>
                            <td>$count</td>
                            <td>$row[userid]</td>
                            <td>$row[name]</td>
                            <td>$row2[username]</td>
                            <td>$row[email]</td>
                            <td>";
                        if ($row2['userlevel'] == 1) {
                            echo 'Admin';
                        } else if ($row2['userlevel'] == 2) {
                            echo 'Coordinator';
                        } else if ($row2['userlevel'] == 3) {
                            echo 'Student';
                        }
                        // Still thinking whether the view button is necessary
                        echo "
                            </td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit_user_form.php?id=$row[userid]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='delete_user.php?id=$row[userid]'>Delete</a>
                                <a class='btn btn-dark btn-sm' href='view_user.php?id=$row[userid]'>View</a>
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
    <?php
    include('../includes/footer.html');
    ?>
</body>

</html>