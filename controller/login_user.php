<?php
include '../backend/include/env.php';
session_start();
if (isset($_POST['login'])) {

    //*VALIDATION
    $email_psk =  $_POST['email_phone'];
    $password = $_POST['password'];
    $query = "SELECT * from users WHERE email = '$email_psk' OR phone = '$email_psk'";
    $isExists = mysqli_query($conn, $query);

    if (mysqli_num_rows($isExists) > 0) {

        $query = "SELECT * from users WHERE email = '$email_psk' OR phone = '$email_psk'  AND password = '$password'";
        $isExists = mysqli_query($conn, $query);

        if (mysqli_num_rows($isExists) > 0) {

            $auth_user = mysqli_fetch_assoc($isExists);
            $_SESSION['auth'] = $auth_user;
            header("location: ../backend/dashboard.php");
        } else {
            $_SESSION['psk_error'] = "Your Password did not match!";
            header("location: ../backend/login.php");
        }
    } else {
        $_SESSION['email_error'] = "Your Email Address did not match!";
        header("location: ../backend/login.php");
    }
}
