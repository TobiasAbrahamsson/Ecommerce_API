<?php
    session_start();
    require 'config/database_handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce API</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shoppingCart.php">Shopping Cart</a></li>
            <?php
                if (isset($_SESSION['admin'])) {
                    echo '<li><a href="adminPage.php">Admin Page</a></li>';
                }
            ?>
        </ul>
        <br>
        <ul>
            <?php
                if (isset($_SESSION['user_id']) || isset($_SESSION['admin'])) {
                    echo '
                        <li>
                            <form action="v1/users/logout.php" method="POST">
                                <button type="submit" name="logout-submit">Logout</button>
                            </form>
                        </li>
                    ';
                }
                else {
                    echo '
                        <li><a href="loginForm.php">Login</a></li>
                        <li><a href="signupForm.php">Signup</a></li>
                    ';
                }
            ?>
        </ul>
    </nav>
</header>