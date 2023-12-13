<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/2.png" type="image/x-icon">
</head>

<body>
    <?php
    include('../includes/headerAdmin.html');
    ?>

    <div class="industry-background">
        <img src="../img/background-img3.jpg" style="width: 100%;">
    </div>

    <br><br>

    <form action="search_user.php" method="post">
        <div class="admin-links">
            <b> <a href="user_list.php"><label class="ad-homepage-btn">View All Users</label></a>
                <a href="../Coordinator/application_list.php"><label class="ad-homepage-btn">View Student Applications</label></a>
            </b>
        </div>
    </form>

    <br> <br>
    
    <form action="search_user.php" method="POST">
        <div class="co-homepage-table">
            <span class="profile">Search User:</span>
            <input type="text" class="co-homepage-input" name="search" />
            <br>

            <span class="profile">Column: </span>
            <select class="select" name="column">
                <option value="userid">User ID</option>
                <option value="name">Name</option>
                <option value="phone">Phone Number</option>
            </select>
            <br>
            <input class="co-homepage-submit" type="submit" value="Search">
        </div>
    </form>
    <?php
    include('../includes/footer.html');
    ?>
</body>
    
</html>