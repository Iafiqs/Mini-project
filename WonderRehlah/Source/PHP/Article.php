<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page or any other desired page
    header('Location: Login.php');
    exit;
}

// Read the JSON file
$jsonData = file_get_contents('../JS/article.json');

// Parse the JSON data
$data = json_decode($jsonData);

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
            WonderRehlah | Articles
        </title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" href="../img/icon_black_2.png" type="image/x-icon">

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
                    <li><a href="Logout.php">Logout</a></li>
                </ul>
                </li>
            </ul>
        </header>
        <!--/header-->

        <div class="container">

            <!--Slider-->
            <div class="page-wrapper">

                <div class="post-slider">
                    <h1 class="slider-title">Feauterd Articles</h1>

                    <i class="fa fa-arrow-left prev"></i>

                    <i class="fa fa-arrow-right next"></i>

                    <div class="post-wrapper">

                      <?php foreach ($data->articles as $article): ?>
                        <div class="post">
                            <img src="<?php echo $article->image; ?>" alt="Article 1" class="slider-image">
                            <div class="post-info">
                                <h3>
                                    <a href="<?php echo $article->url; ?>"><?php echo $article->name; ?></a></h3>
                                    <i class="far fa-marker">&nbsp;<?php echo $article->location; ?></i>
                                    &nbsp;&nbsp;
                                    <i class="far fa-clock">&nbsp;<?php echo $article->time; ?></i>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
            <!--/Slider-->

             <div class="content clearflix">

                <div class="main-content">
                <h1 class="recent-post-title">Recent Articles</h1>

                <!--Articles-->
                <?php foreach ($data->articles as $article): ?>
                <div class="article">
                    <img src="<?php echo $article->image; ?>" alt="article-image" class="article-image">
                    <div class="article-preview">
                        <h2><a href="<?php echo $article->url; ?>"><?php echo $article->name; ?></a></h2>
                        <i class="far fa-pin">&nbsp; &nbsp;<?php echo $article->location; ?></i>
                        &nbsp;
                        <i class="far fa-clock">&nbsp; &nbsp;<?php echo $article->time; ?></i>
                        <p class="preview-text">
                            <?php echo $article->overview; ?>
                        </p>
                        <a href="<?php echo $article->url; ?>" class="btn1 read-more">Read More</a>
                    </div>
                </div>
                <?php endforeach; ?>

                </div>

            </div>
            <!--/Articles-->

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
