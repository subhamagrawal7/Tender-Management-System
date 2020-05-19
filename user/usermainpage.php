<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: login.php');
}
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
                        <?php
                        if (isset($_SESSION['userId'])) {
                            echo '<ul class="res">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="tenders.php">Tenders</a></li>
                            <li><a href="myBiddings.php">My Biddings</a></li>
                            <li><a href="viewConfirmedBiddings.php">Confirm Biddings</a></li>
                            <li><a href="includes/logout.inc.php">Logout</a></li>
                            </ul>';
                        } else {
                            echo '<ul class="res">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="tenders.php">Tenders</a></li>
                            <li><a href="signup.php">Register</a></li>
                            <li><a href="login.php">Login</a></li>
                            </ul>';
                        }
                        ?>

                        <script>
                            $("span.menu").click(function() {
                                $("ul.res").slideToggle("slow", function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                    </div>
                    <!-- <div class="search">
                        <input type="text" value="Site search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Site search';}" />
                        <input type="submit" value="" />
                    </div> -->
                    <div class="clearfix"></div>
                </div>
                <!--header end here-->

                <h3 class="heading-3 text-uppercase text-center bg-success text-white">WELCOME <?php echo $_SESSION['userUid'] ?>!!!</h3>
                <br><br>
            </div>
        </div>
    </div>
</body>

</html>