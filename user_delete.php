<?php
include "db_conn.php";

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    delete_user($id);
}
 
// Trở về trang danh sách
header("Location: user_list.php");