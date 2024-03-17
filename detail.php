<?php
session_start();

include "db_conn.php";

$item = array();
// Kiểm tra xem tham số "act" có tồn tại không
if(isset($_GET['act'])) {
    // Lấy giá trị của tham số "act"
    $action = $_GET['act'];
    if($action == 'select') {
        $title = $_GET['product'];
        $item = get_product_title($title);
    }
}
disconn_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
    <header>
            <section>
                <a href="home.php">Home</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="myaccount.php">My account</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if($_SESSION['user_name'] == 'admin') {?>
                        <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php }?>
                <a href="logout.php">Log out</a>
            </section>
        </header>

        <br></br>
        <h2><?php echo $item['title'];?></h2>
        <h3><?php echo $item['price'];?></h3>
        <p><?php echo $item['description'];?></p>

</body>
</html>