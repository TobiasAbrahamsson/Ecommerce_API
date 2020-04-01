<?php
    include 'header.php';
?>

<section>
    <h1>Signup Form</h1>
    <form action="config/signup.php" method="POST">
        <?php
            if (isset($_GET['first'])) {
                $first = $_GET['first'];
                echo '<input type="text" name="first" placeholder="Firstname" value="'.$first.'">';
            } else {
                echo '<input type="text" name="first" placeholder="Firstname">';
            }

            echo "<br>";

            if (isset($_GET['last'])) {
                $last = $_GET['last'];
                echo '<input type="text" name="last" placeholder="Lastname" value="'.$last.'">';
            } else {
                echo '<input type="text" name="last" placeholder="Lastname">';
            }

            echo "<br>";

            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                echo '<input type="text" name="email" placeholder="E-mail" value="'.$email.'">';
            } else {
                echo '<input type="text" name="email" placeholder="E-mail">';
            }

            echo "<br>";

            if (isset($_GET['username'])) {
                $username = $_GET['username'];
                echo '<input type="text" name="username" placeholder="Username" value="'.$username.'">';
            } else {
                echo '<input type="text" name="username" placeholder="Username">';
            }
        ?>
        <br>
        <input type="text" name="password" placeholder="Password">
        <br>
        <button type="submit" name="submit">Sign Up</button>
    </form>

    <?php
        if (!isset($_GET['signup'])) {
            exit();
        } else {
            $signupCheck = $_GET['signup'];

            if ($signupCheck == "empty") {
                echo "<p class='error'>You did not fill in all the fields!</p>";
                exit();
            } elseif ($signupCheck == "char") {
                echo "<p class='error'>You used invalid characters!</p>";
                exit();
            } elseif ($signupCheck == "email") {
                echo "<p class='error'>You used invalid email!</p>";
                exit();
            } elseif ($signupCheck == "success") {
                echo "<p class='success'>You have signed up! </p><a href='loginForm.php'>Login</a>";
                exit();
            }
        }
    ?>
</section>