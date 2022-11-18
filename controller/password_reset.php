<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location: ./login.php");
}
if (isset($_SESSION['auth'])) {
    $auth = $_SESSION['auth'];
}


if (isset($_POST['submit'])) {

    //*ASSIGNING VARIABLES
    $request = $_POST;
    $old_psk = $request['old_psk'];
    $new_psk = $request['new_psk'];
    $confirm_psk = $request['confirm_psk'];

    //*VALIDATION RULES
    $errors = [];
    if (empty($old_psk)) {
        $errors['old_psk'] = "Please Enter your Old Password";
    } else {
        require '../backend/include/env.php';
        $auth_email = $auth['email'];
        $query = "SELECT * from users WHERE email = '$auth_email' AND password = '$old_psk'";
        $fetch = mysqli_query($conn, $query);

        if (mysqli_num_rows($fetch) == 0) {
            $errors['old_psk'] = "Old Password didn't match! 😱";
        }
    }


    if (empty($new_psk)) {
        $errors['new_psk'] = "Enter a New Password";
    }
    if (empty($confirm_psk)) {
        $errors['confirm_psk'] = "Enter Confirm Password";
    } elseif ($new_psk !== $confirm_psk) {
        $errors['confirm_psk'] = "Confirm Password didn't match! 😫";
    }


    //*IF ERRORS FOUND
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header("location: ../backend/profile.php");
    } else {
        $authId = $auth['id'];
        $query = "UPDATE users SET password = '$new_psk' WHERE id = '$authId'";
        $update = mysqli_query($conn, $query);
        $_SESSION['auth']['password'] = $new_psk;
        header("location: ../backend/profile.php");
    }
}
