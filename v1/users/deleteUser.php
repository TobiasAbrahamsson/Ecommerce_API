<?php

include_once '../../config/database_handler.php';

$sql = "DELETE FROM users WHERE user_id='$_GET[id]';";

if (!mysqli_query($conn, $sql)) {
    header("Location: ../../editUsers.php?editUser=userNotDeleted");
    exit();
}
else {
    header("Location: ../../editUsers.php?editUser=userDeleted");
    exit();
}