<?php
    include 'header.php';
    include_once 'config/database_handler.php';
?>

<section>
    <?php
        if (isset($_SESSION['user_id'])) {
            echo '<p class="login-status">You are logged IN</p>';
        }
        else {
            echo '<p class="logout-status">You are logged OUT</p>';
        }
    ?>

    <hr>

    <h1>Home</h1>

    <hr>

    <form method="GET">
        <select name="colorSorter">
            <option value="green">Green</option>
            <option value="yellow">Yellow</option>
            <option value="blue">Blue</option>
        </select>
        <button type="submit" name="submit">Sort</button>
    </form>

    <h3>Brand</h3>

    <hr>

    <?php

        if (!isset($_GET['submit'])) {
            $sql = "SELECT * FROM products;";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div id='products'>";
                    echo "<img src='images/".$row['product_image']."' alt='product'>";
                    echo "<p>".$row['product_name']."</p>";
                    echo "<p>".$row['product_price']."</p>";
                    echo "<p>".$row['product_description']."</p>";
                    echo "<p>".$row['product_color']."</p>";
                echo "</div>";
            }
        }
        else {
            $color = $_GET['colorSorter'];

            $sql = "SELECT * FROM products WHERE product_color = '$color';";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div id='products'>";
                    echo "<img src='images/".$row['product_image']."' alt='product'>";
                    echo "<p>".$row['product_name']."</p>";
                    echo "<p>".$row['product_price']."</p>";
                    echo "<p>".$row['product_description']."</p>";
                    echo "<p>".$row['product_color']."</p>";
                echo "</div>";
            }
        }
    ?>

</section>
    
</body>
</html>