<?php
session_start();
require 'includes/dbh.inc.php';

$TenderID = $_SESSION['TenderID'];
$OrgID = $_SESSION['OrgID'];
$OrgName = $_SESSION['OrgName'];
$email = $_SESSION['EmailID'];
$msg = $OrgName . "\n" . $OrgID . "\n\nOn behalf of our Institute,it gives us immense pleasure to let you know that your tender has been accepted.\n\nIn case of any query feel free to contact.\nMr. Rakesh Sharma\nEstate Section Incharge\nSVNIT,Surat\nContact no. 9876543210\nEmail-estate@svnit.ac.in";
mail($email, "Tender Confirmation", $msg);
$sql = "UPDATE tender SET OrgID='$OrgID' WHERE TenderID='$TenderID'";
$query = mysqli_query($conn, $sql);
echo "<script type='text/javascript'>alert('TENDER CONFIRMED!');
    window.location.href='adminmainpage.php';
    </script>";
