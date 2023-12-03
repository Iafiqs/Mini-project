<?php
// Start the session
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
            WonderRehlah | About Us
        </title>
        <link rel="stylesheet" href="../CSS/styles.css">
        <link rel="stylesheet" href="../CSS/stylesimg.css">
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
                <ul>
                    <li><a href="My Profile.php">My profile</a></li>
                    <li><a href="Login.php">Logout</a></li>
                </ul>
                </li>
            </ul>
        </header>
        <!--/header-->

        <div class="container" style="height: 100%;">

            <div class="about1">
                <h1 style="align-items: center;">About us</h1>
                <img src="../img/icon.png" alt="logo" style="width:100%">

                <p class="title">Read Reviews, Compare & Book Deals! Things to do on your vacation.<br><br>
              Find Hotels<br>Set a timetable to help keep track of your activites<br>Reminder for praying<br>Nearby Mosques<br>Find halal restaurants in the area.<br>
              Incredible Attractions</p>

                <button id="myButton1" class="btn4" onclick="scrollToContact()">Contact</button>

                <script>
                  function scrollToContact() {
                      // Scroll to the footer
                      document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
                  }
                </script>


              </div>

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
                    <div class="contact" id="contact">
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
                    <form action="index-php" method="post">
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
