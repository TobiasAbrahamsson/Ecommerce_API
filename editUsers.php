<?php
    include 'header.php';
    echo "<h1>Admin Page</h1>";
    include 'adminHeader.php';
    require 'config/database_handler.php';
?>

<section>
    <h1>Edit Users</h1>

    <table>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Registered</th>
            <th>Select</th>

        </tr>

        <?php
            $sql = "SELECT * FROM users WHERE user_role='user';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_first']; ?></td>
                        <td><?php echo $row['user_last']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['user_username']; ?></td>
                        <td><?php echo $row['user_registered']; ?></td>
                        <td><a href=v1/users/deleteUser.php?id=<?php echo $row['user_id']; ?>>Delete</a></td>
                    </tr>
                    <?php
                }
            }

            if (!isset($_GET['editUser'])) {
                exit();
            } else {
                $signupCheck = $_GET['editUser'];

                if ($signupCheck == "userDeleted") {
                    echo "<p class='success'>User successfuly removed!</p>";
                    exit();
                } elseif ($signupCheck == "userNotDeleted") {
                    echo "<p class='error'>User did not get removed!</p>";
                    exit();
                }
            }
        ?>
        
    </table>
</section>