<?php
    include 'header.php';
    include_once 'config/database_handler.php';
?>

<section>
    <h1>Home</h1>

    <?php
        $sql = "SELECT * FROM products;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<div id='products'>";
                echo "<img src='images/".$row['product_image']."' alt='product'>";
                echo "<p>".$row['product_name']."</p>";
            echo "</div>";
        }
    ?>
</section>
    
</body>
</html>