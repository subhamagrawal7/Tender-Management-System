<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("location: ../login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM organization where OrgEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['OrgPass']);
                if ($pwdCheck == false) {
                    header("location: ../login.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['OrgID'];
                    $_SESSION['userUid'] = $row['OrgName']; //Not storing password in the session variable as it is not secure
                    header('location: ../usermainpage.php');
                    exit();
                } else {
                    header("location: ../login.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("location: ../login.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("location: ../login.php");
    exit();
}
