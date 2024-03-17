<?php 
session_start();
include "db_conn.php";

$cate = get_all_category();
$pro = get_all_product();

disconn_db();

 ?>


<!DOCTYPE html>
<html>
     <head>
	<title>HOME</title>
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

          <h3>Category</h3>
          <div>
          <ul>
               <li><a href="home.php?act=selectall">All</a></li>
               &nbsp;
               <?php foreach ($cate as $item){ 
                    $url = "home.php?act=select&category=" . urlencode($item['name']);?> 
                    <li><a href="<?php echo $url; ?>"><?php echo $item['name']; ?></a></li>
                    &nbsp;
               <?php } ?>
          </ul>
          </div>

          <br></br>

          <h3>Product</h3>
          <div>
          <?php if(isset($_GET['act'])) {
               $action = $_GET['act'];
               switch($action) {
                    case 'selectall':
                         foreach ($pro as $item) {
                              if($item['releas'] == 1) {
                                   $url = "detail.php?act=select&category=" . urlencode($item['category'])."&product=".urlencode($item['title']);?> 
                                   <li><a href="<?php echo $url; ?>"><?php echo $item['title']; ?></a></li>&nbsp;
                         <?php }
                         }
                         break; // Thêm break để kết thúc mỗi trường hợp trong switch
                    case 'select': 
                         if(isset($_GET['category'])) {
                              $category = $_GET['category'];
                              foreach ($pro as $item) {
                              if($item['releas'] == 1 && $item['category'] == $category) {
                                   $url = "detail.php?act=select&category=" . urlencode($item['category'])."&product=".urlencode($item['title']);?> 
                                   <li><a href="<?php echo $url; ?>"><?php echo $item['title']; ?></a></li>&nbsp;
                         <?php }
                              }
                         }
                         break; // Thêm break để kết thúc mỗi trường hợp trong switch
               }
          }?>
          </div>
     </body>
</html>