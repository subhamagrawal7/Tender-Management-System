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
                        <ul class="res">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="tenders.php">Tenders</a></li>
                            <li><a href="myBiddings.php">My Biddings</a></li>
                            <li><a class="active" href="viewConfirmedBiddings.php">Confirm Biddings</a></li>
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
                    <form class="search" action="searchConfirmedBiddings.php" method="GET">
                        <input type="text" name="query" value="Site search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Site search';}" />
                        <input type="submit" value="" />
                    </form>
                    <div class="clearfix"></div>
                </div>
                <!--header end here-->

                <h4 class="heading-4 text-center mb-4 text-white bg-danger">MY BIDDINGS</h4>
                <?php
                require 'includes/dbh.inc.php';

                $Orgid = $_SESSION['userId'];
                $sql = "SELECT T.TenderNo, T.Department, T.Description, T.filename, B.Charge, B.Months, T.DueDate FROM tender AS T JOIN bids AS B ON B.TenderID=T.TenderID AND B.OrgID='$Orgid' AND T.OrgID='$Orgid'";
                //$sql = "SELECT c.car_id, m.make, c.price FROM cars AS c JOIN makers AS m ON c.make_id = m.make_id ORDER BY c.car_id";
                $query = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                        <thead class="thead-light">
                            <tr>
                                <th>Tender No.</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>Charge</th>
                                <th>No. of Months Taken</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['TenderNo'] ?></td>
                                        <td><?php echo $row['Department'] ?></td>
                                        <td><?php echo $row['Description'] ?></td>
                                        <td>
                                            <!-- <button class="btn btn-success" onclick="open_script()">Download</button> -->
                                            <?php $name = $row['filename']; ?>
                                            <a href="download.php?name=<?php echo $name; ?>" class="btn btn-success">Download</a>
                                        </td>
                                        <td><?php echo $row['Charge'] ?></td>
                                        <td><?php echo $row['Months'] ?></td>
                                        <td><?php echo $row['DueDate'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="mb-8"></div>
            </div>
        </div>
    </div>
</body>

</html>