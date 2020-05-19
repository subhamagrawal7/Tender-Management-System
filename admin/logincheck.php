<?php

session_start();

$conn = mysqli_connect('localhost', 'root');

if ($conn) {
    echo "connection successful";
} else {
    echo "no connection";
}

$db = mysqli_select_db($conn, 'tms'); //DATABASE NAME TO BE PUT HERE

if (isset($_POST['submit'])) {
    $username = $_POST['user'];     //THIS SHOULD BE SAME AS name='user' field in adminlogin.php page
    $password = $_POST['pass'];     //THIS SHOULD BE SAME AS name='pass' field in adminlogin.php page

    $sql = " select * from admin where user = '$username' and pass = '$password' "; // user column same as in table and pass column same as in table

    $query = mysqli_query($conn, $sql); //MYSQLi command to fire the query

    $row = mysqli_num_rows($query);  //Get the number of rows in table obtained from query
    if ($row == 1) {
        echo "Login Successfull";
        $_SESSION['user'] = $username;  //This is a SESSION VARIABLE that can be used anywhere
        header('location:adminmainpage.php');
    } else {
        $msg = "Login Failed!!!";
        echo "<script type='text/javascript'>alert('$msg');
    window.location.href='index.php';
    </script>";
    }
}
