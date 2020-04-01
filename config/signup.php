<?php
//Checks if the user clicked the signup button
if (isset($_POST['submit'])) {
    //Then include the database connection
    include_once 'database_handler.php';
    //Get the data from the signup form
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Checks if inputs are empty
    if (empty($first) || empty($last) || empty($email) || empty($username) || empty($password)) {
        header("Location: ../signupForm.php?signup=empty");
        exit();
    } else {
        //Checks if input caracters are not valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signupForm.php?signup=char");
            exit();
        } else {
            //Checks if the eamil is not vaild
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signupForm.php?signup=email");
                exit();
            } else {
                //Inserts the data into the database
                $sql = "INSERT INTO users (user_first, user_last, user_email, user_username, user_password) 
                VALUES (?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL error";
                } else {
                    mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $username, $password);
                    mysqli_stmt_execute($stmt);
                }

                header("Location: ../index.php?signup=success");
            }
        }
    }
}