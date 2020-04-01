<?php
    include 'header.php';
?>

<section>
    <h1>Signup Form</h1>
    <form action="config/signup.php" method="POST">
        <input type="text" name="first" placeholder="Firstname">
        <br>
        <input type="text" name="last" placeholder="Lastname">
        <br>
        <input type="text" name="email" placeholder="E-mail">
        <br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="text" name="password" placeholder="Password">
        <br>
        <button type="submit" name="submit">Sign Up</button>
    </form>
</section>