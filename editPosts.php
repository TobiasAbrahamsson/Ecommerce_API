<?php
    include 'header.php';
    echo "<h1>Admin Page</h1>";
    include 'adminHeader.php';
    require 'config/database_handler.php';
?>

<section>
    <h1>Edit Products</h1>

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
                                echo "In stock:", $row['product_quantity'];
                            }
                            else {
                                echo "Out of stock";
                            }
                        ?>
                        <br>
                        <button>Edit</button>
                    </div>
                </form>
                <?php
            }
        }
    ?>
</section>