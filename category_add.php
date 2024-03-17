<?php
 
 include "db_conn.php";
 
// Nếu người dùng submit form
if (!empty($_POST['add_category']))
{
    // Lay data
    $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
     
   // Validate thong tin
   $errors = array();
   if (empty($data['name'])){
       $errors['name'] = 'Chưa nhập tên category';
   }
    
   // Neu ko co loi thi insert
   if (!$errors){
       add_category($data['name']);
       // Trở về trang danh sách
       header("location: category_list.php");
   }
}
 
disconn_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>ADD category</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>ADD category </h1>
        <a href="category_list.php">Back</a> <br/> <br/>
        <form method="post" action="category_add.php">
            <table width="50%" cellspacing="0" cellpadding="10">
            <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>"/>
                        <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_category" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>