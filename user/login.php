<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        HOMEPAGE
    </title>
    <!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
    <?php
    include 'links.php'
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <meta name="keywords" content="Tender Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <!--Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $("html,body").animate({
                        scrollTop: $(this.hash).offset().top
                    },
                    1000
                );
            });
        });
    </script>
    <!-- //end-smoth-scrolling -->
</head>

<body>
    <!--top nav start here-->
    <div class="mother-grid">
        <div class="container">
            <div class="temp-padd">
                <!--top nav end here-->
                <!--title start here-->
                <div class="title-main">
                    <a href="index.html">
                        <h1>Tender Management System</h1>
                    </a>
                </div>
                <!--title end here-->
                <!--header start here-->
                <div class="header mb-4">
                    <div class="navg">
                        <span class="menu"> <img src="images/icon.png" alt="" /></span>
                        <ul class="res">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="tenders.php">Tenders</a></li>
                            <li><a href="signup.php">Register</a></li>
                            <li><a class="active" href="login.php">Login</a></li>
                        </ul>
                        <script>
                            $("span.menu").click(function() {
                                $("ul.res").slideToggle("slow", function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--header end here-->

                <h4 class="heading-4 text-center mb-4 text-white bg-danger">LOGIN</h4>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                        echo '<p class="text-danger">Fill in all fields!</p>';
                    } else if ($_GET["error"] == "wrongpwd") {
                        echo '<p class="text-danger">Wrong Password!</p>';
                    } else if ($_GET["error"] == "nouser") {
                        echo '<p class="text-danger">Please signup before login!</p>';
                    }
                }
                ?>
                <form class="form-group" action="includes/login.inc.php" method="POST">
                    <input class="form-control mb-2" type="text" name="mailuid" placeholder="Email...">
                    <input class="form-control mb-2" type="password" name="pwd" placeholder="Password...">
                    <button class="btn btn-success mb-2" type="submit" name="login-submit">Login</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>