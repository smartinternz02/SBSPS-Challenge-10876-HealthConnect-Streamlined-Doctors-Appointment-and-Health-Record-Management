<?php
 $showAlert = false;
    $showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include 'partials/_dbconnect.php';

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $conoass = $_POST['cpass'];
    
    // Check if the username or email already exists in the database
    $sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email'";
    $result = mysqli_query($con, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        $exists = true;
        $showError = "Username or email already exists.";
    } else {
        if ($password == $conoass) {
            // Passwords match, so proceed with registration
            $sql = "INSERT INTO `users` (`username`, `email`, `password`, `date`) VALUES ('$username', '$email', '$password', current_timestamp())";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $showAlert = true;
            } else {
                $showError = "Error inserting data into the database.";
            }
        } else {
            $showError = "Passwords do not match.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">

    <title>Signup Page</title>
</head>
<body>
<?php require 'partials/_nav.php' ?>
 <?php
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successful!</strong> Your account has been successfully created.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?> 

<div class="container">
    <h1 class="text-center">Signup to Our Website</h1>
    <form action="/IBM-project/signup.php" method="post">
        <div class="mb-3">
            <label for="uname" class="form-label">Username</label>
            <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="mb-3">
            <label for="cpass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass">
        </div>

        <button type="submit" class="btn btn-primary">Signup</button>
    </form>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
-->
</body>
</html>
