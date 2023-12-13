<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include('../includes/headerAdmin.html');
    ?>
    <div class="container" style="padding-top: 183px; margin-bottom: 48px;">
        <h2 style="text-align:center; font-weight: bold">New User</h2>
        <form method="post" action="add_user.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fullname" value="<?php if (isset($_POST['name']))
                        echo htmlspecialchars($_POST['name']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php if (isset($_POST['username']))
                        echo htmlspecialchars($_POST['username']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php if (isset($_POST['password']))
                        echo htmlspecialchars($_POST['password']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email']))
                        echo htmlspecialchars($_POST['email']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Age:</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="age" min="1" max="100" value="<?php if (isset($_POST['age']))
                        echo htmlspecialchars($_POST['age']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number:</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="phone" size="30" maxlength="60" value="<?php if (isset($_POST['phone']))
                        echo htmlspecialchars($_POST['phone']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php if (isset($_POST['address']))
                        echo htmlspecialchars($_POST['address']); ?>" required>
                </div>
            </div>
            <!-- dropdown option for the user level -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">User Level:</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="userlevel" min="1" max="3" value="<?php if (isset($_POST['userlevel']))
                        echo htmlspecialchars($_POST['userlevel']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <?php
    include('../includes/footer.html');
    ?>
</body>

</html>