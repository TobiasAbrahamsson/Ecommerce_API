<?php
    include 'header.php';
    include_once 'config/database_handler.php';
?>

<section>

    <h1>Home</h1>

    <?php
        if (isset($_SESSION['user_id'])) {
            echo '<p class="login-status">You are logged IN</p>';
        }
        elseif (isset($_SESSION['admin'])) {
            echo '<p class="login-status">You are logged IN as Admin</p>';
        }
        else {
            echo '<p class="logout-status">You are logged OUT</p>';
        }
    ?>

    <hr>

    <?php

        $sql = "SELECT * FROM products;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <form method="POST" action="index.php>">
                    <div id="products">
                        <img src="images/<?php echo $row['product_image']; ?>">
                        <h3><?php echo $row['product_name']; ?></h3>
                        <h3><?php echo $row['product_price']; ?></h3>
                        <p><?php echo $row['product_description']; ?></p>
                        <input type="hidden" name="hidden_name" value="<?php echo $row['product_name']; ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row['product_price']; ?>">
                        <?php
                            if ($row['product_quantity'] > 0) {
                                echo '
                                <input type="text" name="selectQuantity" value="1">
                                <br>
                                <button type="submit" name="cart-submit">Add to cart</button>
                                ';
                            }
                            else {
                                echo "Out of stock";
                            }
                        ?>
                    </div>
                </form>
                <?php
            }
        }
    ?>

</section>
    
</body>
</html>