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
            <th>Delete User</th>

        </tr>

        <?php
            $sql = "SELECT * FROM users;";
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
                    </tr>
                    <?php
                }
            }
        ?>
        
    </table>
</section>