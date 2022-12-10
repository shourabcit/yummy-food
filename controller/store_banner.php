<?php

if (isset($_POST['store_banner'])) {

    //*ASSINGING VARIABLES
    $request = $_POST;
    $banner_title = $request['title'];
    $banner_title = $request['detail'];
    $banner_title = $request['video'];
    $banner_img = $_FILES['banner_img'];

    $extension = pathinfo($banner_img['name'])['extension'];

    $acceptedTypes = ['png', 'jpg', 'webp'];
    if (!in_array($extension, $acceptedTypes)) {
        echo "not match";
    }
    if ($banner_img['size'] !== 0) {

        //*IMAGE NAME
        $unique_name = 'Banner-' . uniqid() . '.' . $extension;
        $upload_file = move_uploaded_file($banner_img['tmp_name'], "../uploads/banner/$unique_name");

        if($upload_file){

            


        }

    }
}
