<?php
    include 'header.php';
?>

<section>
    <h1>Login</h1>
    <form action="v1/users/login.php" method="POST">
        <input type="text" name="emailUsername" placeholder="Email/Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login-submit">Login</button>
        
    </form>

    <?php
        if (!isset($_GET['login'])) {
            exit();
        } else {
            $signupCheck = $_GET['login'];

            if ($signupCheck == "empty") {
                echo "<p class='error'>You did not fill in all the fields!</p>";
                exit();
            } elseif ($signupCheck == "wrongPassword") {
                echo "<p class='error'>Username or password is incorct!</p>";
                exit();
            } elseif ($signupCheck == "nouser") {
                echo "<p class='error'>Username or password is incorct!</p>";
                exit();
            } 
        }
    ?>
</section>