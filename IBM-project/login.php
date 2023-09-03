<?php
$loginSuccess = false;
$loginError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $numRows = mysqli_num_rows($result);

        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                $loginSuccess = true;
            } else {
                $loginError = "Incorrect password.";
            }
        } else {
            $loginError = "Username not found.";
        }
    } else {
        $loginError = "Database error. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
<?php require 'partials/_nav.php' ?>
<?php
if ($loginSuccess) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Logged in successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
if ($loginError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $loginError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>

<div class="container ">
    <h1 class="text-center mb-5">Login to Your Account</h1>
    <form action="/IBM-project/login.php" method="post">
        <div class="mb-3">
            <label for="uname" class="form-label">Username</label>
            <input type="text" class="form-control" id="uname" name="uname">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
