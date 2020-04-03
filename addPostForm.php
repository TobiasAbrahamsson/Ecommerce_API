<?php
    include 'header.php';
?>

<section>
    <h1>Add Products</h1>
    <form action="v1/posts/addPost.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" placeholder="Image">
        <br>
        <input type="text" name="name" placeholder="Name">
        <br>
        <input type="text" name="description" placeholder="Description">
        <br>
        <input type="text" name="price" placeholder="Price">
        <br>
        <input type="text" name="quantity" placeholder="Quantity">
        <br>
        <select name="color">
            <option value="green">Green</option>
            <option value="yellow">Yellow</option>
            <option value="blue">Blue</option>
        </select>
        <br>
        <button type="submit" name="submit">Add Post</button>
    </form>
    
</section>