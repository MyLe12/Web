<?php
 
include "db_conn.php";

$cate = get_all_category();
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_product($id);
}
 
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("Location: product_list.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_product']))
{
    // Lay data
    $data['category'] = isset($_POST['category']) ? $_POST['category'] : '';
    $data['title'] = isset($_POST['title']) ? $_POST['title'] : '';
    $data['price'] = isset($_POST['price']) ? $_POST['price'] : '';
    $data['description']  = isset($_POST['description']) ? $_POST['description'] : '';
    $data['releas'] = isset($_POST['releas']) ? $_POST['releas'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['category'])){
        $errors['category'] = 'Chưa nhập tên category';
    }

    if (empty($data['title'])){
        $errors['title'] = 'Chưa nhập title';
    }

    if (empty($data['price'])){
        $errors['price'] = 'Chưa nhập price';
    }

    if (empty($data['description'])){
        $errors['description'] = 'Chưa nhập description';
    }

    if (empty($data['releas'])){
        $errors['releas'] = 'Chưa nhập releas';
    }
    
   // Neu ko co loi thi insert
   if (!$errors){
       edit_product($data['id'], $data['category'], $data['title'], $data['price'], $data['description'], $data['releas']);
       // Trở về trang danh sách
       header("location: product_list.php");
   }
}
 
disconn_db();
?>
 
<!DOCTYPE html>
<html>

    <head>
        <title>Edit</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Edit </h1>

        <a href="product_list.php">Back</a> <br/> <br/>

        <form method="post" action="product_edit.php?id=<?php echo $data['id']; ?>">
            <table width="50%"  cellspacing="0" cellpadding="10">
                <tr>
                    <td>Category</td>
                    <td>
                        <input type="text" name="category" value="<?php echo !empty($data['category']) ? $data['category'] : ''; ?>"/>
                        <?php if (!empty($errors['category'])) echo $errors['category']; ?>
                    </td>
                </tr>

                <?php foreach ($cate as $item){ ?>
                    <tr>
                        <td></td>
                        <td><?php echo $item['name']; ?></td>
                    </tr>
                <?php } ?>

                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo !empty($data['title']) ? $data['title'] : ''; ?>"/>
                        <?php if (!empty($errors['title'])) echo $errors['title']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <input type="text" name="price" value="<?php echo !empty($data['price']) ? $data['price'] : ''; ?>"/>
                        <?php if (!empty($errors['price'])) echo $errors['price']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                        <input type="text" name="description" value="<?php echo !empty($data['description']) ? $data['description'] : ''; ?>"/>
                        <?php if (!empty($errors['description'])) echo $errors['description']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Releas</td>
                    <td>
                        <input type="text" name="releas" value="<?php echo !empty($data['releas']) ? $data['releas'] : ''; ?>"/>
                        <?php if (!empty($errors['releas'])) echo $errors['releas']; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                        <input type="submit" name="edit_product" value="Save"/>
                    </td>
                </tr>

            </table>
            
        </form>
    </body>
</html>