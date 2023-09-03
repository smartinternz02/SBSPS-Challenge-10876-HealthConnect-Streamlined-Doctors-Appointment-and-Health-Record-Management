
<?php
$showError = false;
$showAlert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];

    // Check if an appointment with the same details already exists
    $checkSql = "SELECT * FROM `booking` WHERE `username` = '$username' AND `email` = '$email' AND `phone` = '$phone' AND `doctor` = '$doctor' AND `date` = '$date'";
    $checkResult = mysqli_query($con, $checkSql);
    
    if (mysqli_num_rows($checkResult) == 0) {
        // No duplicate appointment found, insert the new appointment
        $sql = "INSERT INTO `booking` (`username`, `email`, `phone`, `doctor`, `date`) VALUES ('$username', '$email', '$phone', '$doctor', '$date')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $showAlert = true;
        } else {
            $showError = "Error inserting data into the database.";
        }
    } else {
        $showError = "Appointment with the same details already exists.";
    }
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="ibm-project-styles.css" >

    <title>welcome</title>
  </head>
  <body>
<?php require 'partials/_nav.php' ?>

      <?php
    if ($showAlert) {
         
         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull</strong> Your booking has been successfully recorder.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           echo '<script>
           window.alert("Your booking has been successfully recorder");
           
           window.location.href = "welcome.php";</script>'; // Reload the page after displaying the alert
        exit;
    }
    if ($showError) {
        // echo '<div class="alert alert-danger" role="alert">' . $showError . '</div>';
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> ' . $showError . '
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
    } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  
  <header>
        <img src="IMG_20230903_105623.jpg" style="position:relative;display:flex;flex-direction:column;"alt="landing page">
      </header>

    <section class="landing">
        <div class="quote">
            <h1>Quality Healthcare</h1>
            <p>“Your health is our priority. We're here to serve you with care and compassion.”</p>
        </div>
        <img src="https://th.bing.com/th/id/OIP.cH5_1OqG_N9p8_4gnXRRCgHaKa?pid=ImgDet&rs=1" alt="Doctor Image" class="doctor-side-image">
    </section>


    <section id="saline-bottel" style="    display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
height:500px;
      background-color:rgba(140, 222, 249, 0.979);">
      <img src="https://now.tufts.edu/sites/default/files/uploaded-assets/images/2022-12/221206_fluid_stewardship.jpg" alt="saline image" width="500px" height="400px">
    <div class="quote1" style="flex: 5;
      padding: 20px;">
            <h1 style="font-size: 36px;
      margin-bottom: 10px;">Saline Safety Assurance</h1>
            <p style="font-size: 18px;
      line-height: 1.5;">“A Smart solution for Monitoring Patient Infusions ”
      <a href="#">read more....</a></p>
        </div>
    </section>

    <section class="appointment-form" id="appointment-form">
        <h2>Book an Appointment</h2>
    
    
 <form action="/IBM-project/welcome.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            
            <label for="doctor">Select Doctor:</label>
            <select id="doctor" name="doctor">
                <option value="dr-smith">Dr. Smith</option>
                <option value="dr-jones">Dr. Jones</option>
                <option value="dr-ram">Dr. Ram</option>
                <option value="dr-Raju">Dr. Raju</option>
     
            </select>
            
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" required>
            
            <button type="submit" id="book" >Book Now</button>
        </form>
    </section>
   

    <footer>
        <p>“Your health is an investment, not an expense.”</p>
        <h1>Thank you for Visiting our Hospital Page</h1>
    </footer>

  </body>
</html>
