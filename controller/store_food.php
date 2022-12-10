<?php

if (isset($_POST['store_banner'])) {

    //*ASSINGING VARIABLES
    $request = $_POST;
    $title = $request['title'];
    $detail = $request['detail'];
    $price = $request['price'];
    $category_id = $request['category_id'];
    $food_img = $_FILES['food_img'];

    $extension = pathinfo($food_img['name'])['extension'];

    $acceptedTypes = ['png', 'jpg', 'webp'];
    if (!in_array($extension, $acceptedTypes)) {
        echo "not match";
    }
    if ($food_img['size'] !== 0) {

        //*IMAGE NAME
        $unique_name = 'Banner-' . uniqid() . '.' . $extension;
        $upload_file = move_uploaded_file($food_img['tmp_name'], "../uploads/foods/$unique_name");

        if ($upload_file) {
            include "../backend/include/env.php";
            $query = "INSERT INTO foods (category_id, title, detail, price, food_img) VALUES ('$category_id', '$title', '$detail', '$price', '$unique_name')";

            $store = mysqli_query($conn, $query);
            header("Location:../backend/add_food.php");
        }
    }
}
