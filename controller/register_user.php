<?php
session_start();

if (isset($_POST['submit'])) {

    //*DATABASE
    include '../backend/include/env.php';

    $requet = $_POST;
    $first_name = $requet['fName'];
    $last_name = $requet['lName'];
    $password = $requet['password'];
    $con_password = $requet['confirm_password'];
    $email = $requet['email'];
    $phone = $requet['phone'];



    //*VALIDATION RULES
    $errors = [];

    if (empty($first_name)) {
        $errors['fName'] = "Enter Your First Name";
    }

    if (empty($last_name)) {
        $errors['lName'] = "Enter Your Last Name";
    }
    if (empty($email)) {
        $errors['email'] = "Enter Your Email";
    }
    if (empty($phone)) {
        $errors['phone'] = "Enter Your Phone Number";
    }

    if (empty($password)) {
        $errors['password'] = "Enter Your Password";
    }

    if (empty($con_password)) {
        $errors['con_psk'] = "Enter Your Confirm Password";
    } elseif( $password !== $con_password ){
        $errors['con_psk'] = "Confirm Password does not match";
    }




    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header("Location: ../backend/register.php");
    } else {
        //*STORE 
        $query = "INSERT INTO users(first_name, last_name, email, phone, password) VALUES ('$first_name','$last_name',  '$email', '$phone', '$password')";
        $store = mysqli_query($conn, $query);

        header("Location: ../backend/login.php");
    }
}
