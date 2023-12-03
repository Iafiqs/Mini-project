<?php
// Check if the user is already logged in
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page or any other desired page
    header('Location: Login.php');
    exit;
}

// Database connection details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'wonderrehlah';

// Connect to the database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Planning process
if (isset($_POST['plan'])) {
  $destination = $_POST['destination'];
  $startDate = $_POST['startDate'];
  $residence = $_POST['residence'];
  $noOfDays = $_POST['noOfDays'];
  $username = $_SESSION['username'];

  // Check if the user already has a plan in the database
  $checkQuery = "SELECT COUNT(*) as count, noOfDays FROM trip WHERE username = '$username'";
  $result = mysqli_query($conn, $checkQuery);
  $row = mysqli_fetch_assoc($result);
  $planCount = $row['count'];
  $existingNoOfDays = $row['noOfDays'];

  if ($planCount > 0) {
    // If the user already has a plan, perform an UPDATE instead of an INSERT
    $query = "UPDATE trip SET destination = '$destination', startDate = '$startDate', residence = '$residence', noOfDays = '$noOfDays' WHERE username = '$username'";
  } else {
    // If the user doesn't have a plan, perform the usual INSERT
    $query = "INSERT INTO trip (destination, startDate, residence, noOfDays, username) VALUES ('$destination', '$startDate', '$residence', '$noOfDays', '$username')";
  }

  mysqli_query($conn, $query);

  // Store the plan data in session variables
  $_SESSION['destination'] = $destination;
  $_SESSION['startDate'] = $startDate;
  $_SESSION['noOfDays'] = ($planCount > 0) ? $existingNoOfDays : $noOfDays; // Update the session variable accordingly
  $_SESSION['residence'] = $residence;
  header('Location: Schedule.php');
  exit;
}


//Problem mysql_list_processes
if (isset($_POST['problem'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert the new problem into the database
    $query = "INSERT INTO problem (email, message) VALUES ('$email', '$message')";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            WonderRehlah | Trip Planner
        </title>
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="stylesheet" href="../css/ppagestyles.css">
        <link rel="icon" href="../img/icon_black_2.png" type="image/x-icon">

        <script type="text/javascript" src="../js/lightbox-plus-jquery.min.js"></script>

        <!--icons from font awesome.com-->
        <script src="https://kit.fontawesome.com/f658ac2203.js" crossorigin="anonymous"></script>
        <!--fonts from google fonts-->

        <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Piazzolla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap" rel="stylesheet">

    </head>
    <body>

        <!--header-->
        <header>
            <div>
                <img src="../img/icon.png" class="logo">
            </div>
            <ul class="nav">
                <li><a href="../php/Home.php">Home</a></li>
                <li><a href="../php/TripPlanner.php">Trip Planner</a></li>
                <li><a href="../php/Hotel.php">Hotels</a></li>
                <li><a href="../php/Article.php">Things To Do</a></li>
                <li><a href="#">
                    <i class="fa fa-user"></i>  &nbsp;
                    <?php echo $_SESSION['username']; ?>
                </a>
                <ul class="dropdown">
                    <li><a href="My Profile.php">My profile</a></li>
                    <li><a href="Logout.php">Logout</a></li>
                </ul>
                </li>
            </ul>
        </header>
        <!--/header-->

        <div class="container" style="height: 100%;">
            <form class="form" method="post" style="height: 70%;">
                <div class="contain">

                    <label><b>Location of Travel</b></label><br>
                    <select placeholder="Enter your destination of travel" name="destination" required>
                        <option value="Selangor">Selangor</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Johor">Johor</option>
                        <!-- Add more options as needed -->
                    </select><br>

                    <label><b>Date of Travel starting</b></label><br>
                    <input type="date" placeholder="Enter the date of travel starting" name="startDate" required><br>

                    <label><b>Where are you staying?</b></label><br>
                    <input type="text" placeholder="Enter the place where you're staying" name="residence" required><br>

                    <label><b>Number of days travelling?</b></label><br>
                    <input type="number" placeholder="Enter number of days you're travelling" name="noOfDays" required min="1" max="3"><br>

                    <?php if (isset($planError)) { ?>
                        <p><?php echo $planError; ?></p>
                    <?php } ?>
                    <button type="submit" name="plan" class="button">Plan</button>

              </form>
            </div>

        <!--footer-->
        <div class="footer">
            <div class="footer-up">
                <div class="footer-section about">
                    <img src="../img/icon.png" class="logo">


                    <p class="aboutp">
                        WonderRehlah built-up in 2023 by Iman Afiq to allow muslims to plan their vacation while adhearing to their religious beliefs.
                        WonderRehlah is a user-friendly and simple platform which users can plan their vacation.
                    </p>
                    <div class="contact">
                        <i class="fas fa-phone"></i> &nbsp;  +601135602204
                        <br>
                        <i class="fas fa-envelope"></i> &nbsp;  info@WonderRehlah.com
                    </div>
                    <br><br><br>
                    <div class="social">
                        <a href="https://web.facebook.com"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
                        <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                    </div>

                </div>
                <div class="footer-section links">
                    <h2>Quick Links</h2>

                    <ul class="qlinks">
                        <a href="About Us.php">
                            <li>About Us</li>
                        </a>

                        <a href="privacypolicy.php">
                            <li>Policy</li>
                        </a>
                    </ul>
                </div>
                <div class="footer-section contact">
                    <h2>Have a problem?</h2>
                    <form action="" method="post">
                    <input type="email" name="email" class="contact-input" placeholder="Your email address...">
                    <br><br>
                    <textarea name="message" class="text-input" placeholder="Your problem..."></textarea>
                    <br><br><br>
                    <button type="Submit" name="problem" class="btn">
                        <i class="fas fa-paper-plane"></i>
                        send
                    </button>
                </form>

                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2023 WonderRehlah.
            </div>
        </div>
        <!--/footer-->

    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>

    <!--Slick slider-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--custom script-->
    <script src="../js/scripts.js"></script>
    </body>
</html>
