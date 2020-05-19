<?php
if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';

    $id = $_POST['OrgID'];
    $name = $_POST['OrgName'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($id) || empty($name) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("location: ../signup.php?error=emptyfields&uid=" . $id . "&mail=" . $email);
        exit(); //Stop the script from running if there are any empty fields inside
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/([A-Z]{2})([A-Z0-9]{10})/", $id)) { //Check if both email and username are invalid
        header("location: ../signup.php?error=invalidmailuid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  //Check if it is a valid email
        header("location: ../signup.php?error=invalidmail&uid=" . $id);
        exit();
    } else if (!preg_match("/([A-Z]{2})([A-Z0-9]{10})/", $id)) {  //Check if it is a vaild username using RegEx pattern
        header("location: ../signup.php?error=invaliduid&mail=" . $email);
        exit();
    } else if ($password !== $passwordRepeat) { //Check if both the passwords are entered are the same or not
        header("location: ../signup.php?error=passwordcheck&uid=" . $id . "&mail=" . $email);
        exit();
    } else { //Check if a user already exists inside the database
        $sql = "SELECT OrgID from organization WHERE OrgID=?"; //Use prepared statements to prevent user from writing SQL code in Input field
        $stmt =  mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) { //Check if the statement has been prepared or not
            header("location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $id); //bind the parameters - the username and the datatype to $stmt
            mysqli_execute($stmt); //Execute the statement onto the database
            mysqli_stmt_store_result($stmt); //If a match has been then store that value in $stmt
            $resultCheck = mysqli_stmt_num_rows($stmt); //$stmt contains the number of rows where a match is found
            if ($resultCheck > 0) {
                header("location: ../signup.php?error=usertaken&mail=" . $email);
                exit();
            } else { //If there are no errors and user does not exist previously then insert into database
                $sql = "INSERT INTO organization (OrgID, OrgName, OrgEmail, OrgPass) VALUES (?, ?, ?, ?)";
                $stmt =  mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $id, $name, $email, $hashedPwd); //Instead of inserting the password directly insert the hashed password
                    mysqli_execute($stmt);
                    header("location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("location: ../signup.php");
    exit();
}