<?php
include "db_conn.php";

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    delete_product($id);
}
 
// Trở về trang danh sách
header("Location: product_list.php");