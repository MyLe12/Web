<?php 
include "db_conn.php";

$product = get_all_product();
disconn_db();
 ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Product</h1>

        <a href="dashboard.php">Back</a> <br/> <br/>

        <a href="product_add.php">Add</a> <br/> <br/>

        <table width="100%" cellspacing="0" cellpadding="10">
            <tr>
                <td>ID</td>
                <td>Category</td>
                <td>Title</td>
                <td>Price</td>
                <td>Description</td>
                <td>Releas</td>
                <td>Note</td>
            </tr>

            <?php foreach ($product as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['category']; ?></td>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['description']; ?></td>
                <td><?php echo $item['releas']; ?></td>
                <td>
                    <form method="post" action="product_delete.php">
                        <input onclick="window.location = 'product_edit.php?id=<?php echo $item['id']; ?>'" type="button" value="Edit"/>
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Delete"/>
                    </form>
                </td>
            </tr>
            <?php } ?>

        </table>
    </body>
</html>