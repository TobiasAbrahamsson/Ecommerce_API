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
    $passwordRepeat = mysqli_real_escape_string($conn, $_POST['passwordRepeat']);

    //Checks if inputs are empty
    if (empty($first) || empty($last) || empty($email) || empty($username) || empty($password)) {
        header("Location: ../signupForm.php?signup=empty");
        exit();
    } 
    else {
        //Checks if input caracters are not valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signupForm.php?signup=char&email=$email&username=$username");
            exit();
        } 
        else {
            //Checks if the eamil is not vaild
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signupForm.php?signup=email&first=$first&last=$last&username=$username");
                exit();
            } 
            else {
                //Checks if the password match with the repeat password
                if ($password !== $passwordRepeat) { 
                    header("Location: ../signupForm.php?signup=password&first=$first&last=$last&email=$email&username=$username");
                    exit();
                } 
                else {
                    //Checks if the username alredy exists in the database
                    $sql = "SELECT user_username FROM users WHERE user_username=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signupForm.php?signup=mysqlerror");
                        exit();
                    } 
                    else {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        if ($resultCheck > 0) {
                            header("Location: ../signupForm.php?signup=usernametaken&first=$first&last=$last&email=$email");
                            exit();
                        } 
                        else {
                            //Checks if the eamil alredy exists in the database
                            $sql = "SELECT user_email FROM users WHERE user_email=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("Location: ../signupForm.php?signup=mysqlerror2");
                                exit();
                            } 
                            else {
                                mysqli_stmt_bind_param($stmt, "s", $email);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_store_result($stmt);
                                $resultCheck = mysqli_stmt_num_rows($stmt);
                                if ($resultCheck > 0) {
                                    header("Location: ../signupForm.php?signup=emailtaken&first=$first&last=$last&username=$username");
                                    exit();
                                }
                                else {
                                    //Inserts the data into the database
                                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_username, user_password) VALUES (?, ?, ?, ?, ?);";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("Location: ../signupForm.php?signup=mysqlerror3");
                                        exit();
                                    } 
                                    else {
                                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                                        mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $username, $hashedPassword);
                                        mysqli_stmt_execute($stmt);
                                        header("Location: ../signupForm.php?signup=success");
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
else {
    header("Location: ../signupForm.php");
    exit();
}