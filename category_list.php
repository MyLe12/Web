<?php 
include "db_conn.php";

$cate = get_all_category();
disconn_db();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Category</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>CATEGORY</h1>
        <a href="dashboard.php">Back</a> <br/> <br/>
        <a href="category_add.php">Thêm danh mục</a> <br/> <br/>
        <table width="100%" cellspacing="0" cellpadding="10">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Note</td>
            </tr>
            <?php foreach ($cate as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td>
                    <form method="post" action="category_delete.php">
                        <input onclick="window.location = 'category_edit.php?id=<?php echo $item['id']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>