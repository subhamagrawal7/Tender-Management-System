<?php
session_start();

$inactive = 10; //10 seconds
if (!isset($_SESSION['timeout'])) {
    $_SESSION['timeout'] = time() + $inactive;
}

$session_life = time() - $_SESSION['timeout'];
$message = "Session Timed Out!!Login Again!!";

if ($session_life > $inactive) {
    echo "<script type='text/javascript'>alert('$message');</script>";
    session_destroy();
    //header(); //Redirect to some page
}
//Include when user has already logged in
