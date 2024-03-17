<?php 
include "db_conn.php";

$users = get_all_users();
disconn_db();
 ?>

<!DOCTYPE html>
<html>

    <head>
        <title>Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Users</h1>

        <a href="dashboard.php">Back</a><br/><br/>

        <a href="user_add.php">Add</a><br/><br/>

        <!-- Bảng chứa thông tin các user -->
        <table width="100%" cellspacing="0" cellpadding="10">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>User name</td>
                <td>Password</td>
                <td>Email</td>
                <td>Note</td>
            </tr>

            <?php foreach ($users as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['user_name']; ?></td>
                <td><?php echo $item['password']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td>
                    <form method="POST" action="user_delete.php">
                        <input onclick="window.location = 'user_edit.php?id=<?php echo $item['id']; ?>'" type="button" value="Edit"/>
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input onclick="return confirm('Are you sure you want to delete?');" type="submit" name="delete" value="Delete"/>
                    </form>
                </td>
            </tr>
            <?php } ?>

        </table>
    </body>
</html>