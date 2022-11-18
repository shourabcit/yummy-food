<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location: ./login.php");
}
if (isset($_SESSION['auth'])) {
    $auth = $_SESSION['auth'];
}

if (isset($_POST['profile_update'])) {

    //*ASSIGNING VARIABLES
    $request = $_POST;
    $profileImg = $_FILES['profile_img'];
    $f_name = $request['f_name'];
    $l_name = $request['l_name'];
    $email = $request['email'];
    $phone = $request['phone'];
    // print_r($profileImg);
    // exit();
    //* VALIDATION RULES
    $errors = [];
    if (empty($f_name)) {
        $errors['f_name'] = "First Name can't be empty";
    }

    if (empty($l_name)) {
        $errors['l_name'] = "Last Name can't be empty";
    }
    if (empty($email)) {
        $errors['email'] = "Email can't be empty";
    }
    if (empty($phone)) {
        $errors['phone'] = "Phone Number can't be empty";
    }


    //* REDIRECTION IF ERRORS FOUND
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header("location: ../backend/profile.php");
    }


    //*PROCEDING IF NO ERRORS FOUND
    else {

        //* IF PROFILE PIC FOUND

        if ($profileImg['size'] > 0) {
            //*REMOVE PREVIOUS IMAGE
            $path = '../uploads/users/' . $auth['profile_img'];
            if (file_exists($path)) {
                unlink($path);
            }
            //*IMAGE PROCESSING
            $extention = pathinfo($profileImg['name'])['extension'];
            $imageName = $_SESSION['auth']['first_name'] . '-' . uniqid()  . '.' . $extention;
            $path = '../uploads/users/';
            if (!file_exists($path)) {
                mkdir($path);
            }
            $uploadFile = move_uploaded_file($profileImg['tmp_name'], '../uploads/users/' . $imageName);
            //* UPLOAD FILE SUCCESSFULLY
            if ($uploadFile) {
                require '../backend/include/env.php';
                $userId = $_SESSION['auth']['id'];
                $query = "UPDATE users SET profile_img='$imageName',first_name='$f_name',last_name='$l_name',email='$email',phone='$phone' WHERE '$userId'";
                $update = mysqli_query($conn, $query);
                if ($update) {
                    $_SESSION['auth']['first_name'] =
                        $_SESSION['auth']['first_name'] = $f_name;
                    $_SESSION['auth']['last_name'] = $l_name;
                    $_SESSION['auth']['email'] = $email;
                    $_SESSION['auth']['phone'] = $phone;
                    $_SESSION['auth']['profile_img'] = $imageName;
                }
                header('location: ../backend/profile.php');
            }
            //* COULD NOT UPLOAD FILE
            else {
                $_SESSION['errors']['f_name'] = "Something Went Wrong 😭";
                header('location: ../backend/profile.php');
            }
        }

        //* IF PROFILE PIC NOT FOUND
        else {
            require '../backend/include/env.php';
            $userId = $_SESSION['auth']['id'];
            $query = "UPDATE users SET first_name='$f_name',last_name='$l_name',email='$email',phone='$phone' WHERE '$userId'";
            $update = mysqli_query($conn, $query);
            if ($update) {
                $_SESSION['auth']['first_name'] = $f_name;
                $_SESSION['auth']['last_name'] = $l_name;
                $_SESSION['auth']['email'] = $email;
                $_SESSION['auth']['phone'] = $phone;
            }
            header('location: ../backend/profile.php');
        }
    }
}
