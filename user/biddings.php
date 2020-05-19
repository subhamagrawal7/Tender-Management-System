<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Bidding
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
                            <li><a href="myBiddings.php">My Biddings</a></li>
                            <li><a href="viewConfirmedBiddings.php">Confirm Biddings</a></li>
                            <li><a href="includes/logout.inc.php">Logout</a></li>
                        </ul>
                        <script>
                            $("span.menu").click(function() {
                                $("ul.res").slideToggle("slow", function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                    </div>
                    <div class="search">
                        <input type="text" value="Site search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Site search';}" />
                        <input type="submit" value="" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--header end here-->


                <h4 class="heading-4 text-center mb-4 text-white bg-danger">BIDDING</h4>
                <?php
                require 'includes/dbh.inc.php';

                $Orgid = $_SESSION['userId'];
                $id = $_GET['id'];
                $sql = "SELECT * FROM organization where OrgID='$Orgid'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>
                <div class="container d-flex align-items center justify-content-center">
                    <form class="form-horizontal" action="insertIntoTable.php" method="POST">
                        <div class="form-group mt-3 row">
                            <label class="control-label col-sm-4" for="OrgID">Org ID</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="text" name="OrgID" id="OrgID" value="<?php echo $row['OrgID'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4" for="Name">Org Name</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="text" name="Name" id="Name" value="<?php echo $row['OrgName'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4" for="Email">Email ID</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="email" name="Email" id="Email" value="<?php echo $row['OrgEmail'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4" for="TenderID">Tender ID</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="number" name="TenderID" id="TenderID" value="<?php echo $id ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4" for="Charge">Charge</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="float" name="Charge" id="Charge" placeholder="Amount(in Rs.)" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4" for="Months">No. of months taken</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="number" name="Months" id="Months" placeholder="No. of months taken" required>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary" type="submit" name="bid-submit">Submit</button>
                        <div class="mb-4"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>