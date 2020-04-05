<?php
//Checks if the user clicked the add post button
if (isset($_POST['submit'])) {
    //The path to store the image
    $target = "../../images/".basename($_FILES['image']['name']);
    //Then include the database connection
    include_once '../../config/database_handler.php';
    //Get the data from the add post form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);

    //Checks if inputs are empty
    if (empty($name) || empty($description) || empty($price) || empty($quantity) || empty($color) || empty($brand)) {
        header("Location: ../../addPostForm.php?addPost=empty");
        exit();
    } else {
        //Inserts the data into the database
        $sql = "INSERT INTO products (product_name, product_description, product_price, product_image, product_quantity, product_color, product_brand) 
        VALUES ('$name', '$description', '$price', '$image', '$quantity', '$color', '$brand');";

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            header("Location: ../../addPostForm.php?addPost=error");
            exit();
        }
        else {
            mysqli_query($conn, $sql);
            header("Location: ../../addPostForm.php?addPost=success");
            exit();
        }
       
    }
}
else {
    header("Location: ../../addPostForm.php");
    exit();
}