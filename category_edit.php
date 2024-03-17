<?php
 
include "db_conn.php";
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_category($id);
}
 
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("Location: category_list.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_category']))
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
       edit_category($data['id'],$data['name']);
       // Trở về trang danh sách
       header("location: category_list.php");
   }
}
 
disconn_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm Category </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm Category </h1>
        <a href="category_list.php">Back</a> <br/> <br/>
        <form method="post" action="category_edit.php?id=<?php echo $data['id']; ?>">
            <table width="50%"  cellspacing="0" cellpadding="10">
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
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                        <input type="submit" name="edit_category" value="Save"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>