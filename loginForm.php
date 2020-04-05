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
</section>