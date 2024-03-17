<?php
 
 include "db_conn.php";
 
// Nếu người dùng submit form
if (!empty($_POST['add_user']))
{
    // Lay data
    $data['fname'] = isset($_POST['fname']) ? $_POST['fname'] : '';
    $data['uname'] = isset($_POST['uname']) ? $_POST['uname'] : '';
    $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
    $data['email']  = isset($_POST['email']) ? $_POST['email'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['fname'])){
        $errors['fname'] = 'Chưa nhập tên user';
    }
     
    if (empty($data['uname'])){
        $errors['uname'] = 'Chưa nhập user name';
    }

    if (empty($data['password'])){
        $errors['password'] = 'Chưa nhập password';
    }

    if (empty($data['email'])){
        $errors['email'] = 'Chưa nhập email';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        add_user($data['fname'], $data['uname'], $data['password'], $data['email']);
        // Trở về trang danh sách
        header("location: user_list.php");
    }
}
 
disconn_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>ADD USER</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>ADD USER </h1>
        <a href="user_list.php">Back</a> <br/> <br/>
        <form method="post" action="user_add.php">
            <table width="50%" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="fname" value="<?php echo !empty($data['fname']) ? $data['fname'] : ''; ?>"/>
                        <?php if (!empty($errors['fname'])) echo $errors['fname']; ?>
                    </td>
                </tr>
                <tr>
                    <td>User name</td>
                    <td>
                        <input type="text" name="uname" value="<?php echo !empty($data['uname']) ? $data['uname'] : ''; ?>"/>
                        <?php if (!empty($errors['uname'])) echo $errors['uname']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text" name="password" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>"/>
                        <?php if (!empty($errors['password'])) echo $errors['password']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>"/>
                        <?php if (!empty($errors['email'])) echo $errors['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_user" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>