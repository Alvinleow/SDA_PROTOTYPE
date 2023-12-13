<html>

<head>
    
</head>

<body>
    <?php
    include('../includes/headerCoordinator.html');
    ?>

    <div class="industry-background">
        <img src="../img/CoordinatorPageBackground2.png" style="width: 100%; ">

    </div>

    <br> <br>

    <div class="coordinator-links">
        <b><a href="application_list.php"><label class="co-homepage-btn">View Sorted Application List</label></a></b>
        <b><a href="sorted_pending_list.php"><label class="co-homepage-btn">View Sorted Pending List</label></a></b>
    </div>

    <br> <br>

    <form action="search_student.php" method="POST">
        <div class="co-homepage-table">
            <span class="profile">Search Student's Profile:</span>
            <input type="text" class="co-homepage-input" name="search" />
            <br>

            <span class="profile">Column: </span>
            <select class="select" name="column">
                <option value="name">Name</option>
                <option value="phone">Phone Number</option>
                <option value="userid">User ID</option>
            </select>
            <br>
            <input class="co-homepage-submit" type="submit" value="Search"> <!--added value-->
    </form>

    <br> <br>

    <form action="search_student_application.php" method="POST">
        <span class="profile">Search Student's Application:</span>
        <input class="co-homepage-input" type="text" name="search"><br>

        <span class="profile">Column:</span>
        <select class="select" name="column">
            <option value="applicationid">Application ID</option>
            <option value="applicationstatus">Application Status</option>
            <option value="fk_userid">User ID</option>
            <option value="applicationtitle">Application Title</option>
            <option value="applicationdate">Application Date</option>
        </select><br>
        <input class="co-homepage-submit" type="submit" value="Search"> <!--added value-->
    </form>
    </div>
    <?php
    include('../includes/footer.html');
    ?>
</body>

</html>