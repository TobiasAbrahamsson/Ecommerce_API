<?php
//Checks if the user clicked on the login button
if (isset($_POST['login-submit'])) {
    //Require the database conection
    require '../../config/database_handler.php';
    //Get the data from the login form
    $emailUsername = $_POST['emailUsername'];
    $password = $_POST['password'];
    //Checks if any fields are empty
    if (empty($emailUsername) || empty($password)) {
        header("Location: ../../loginForm.php?login=empty");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE user_username=? OR user_email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../loginForm.php?login=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $emailUsername, $emailUsername);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //Checks if we got any result from the database (is $result empty or not)
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['user_password']);
                if ($passwordCheck == false) {
                    header("Location: ../../loginForm.php?login=wrongPassword");
                    exit();
                }
                elseif ($passwordCheck == true) {
                    $userRole = $row['user_role'];
                    if ($userRole == 'admin') {
                        session_start();
                        $_SESSION['admin'] = $row['user_role'];

                        header("Location: ../../index.php?login=successAdmin");
                        exit();
                    }
                    else {
                        session_start();
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_username'] = $row['user_username'];

                    header("Location: ../../index.php?login=success");
                    exit();
                    }
                }
                else {
                    header("Location: ../../loginForm.php?login=wrongPassword");
                    exit();
                }
            }
            else {
                header("Location: ../../loginForm.php?login=nouser");
                exit(); 
            }
        }
    }
}
else {
    header("Location: ../../loginForm.php");
    exit();
}