<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My account</title>
</head>
<body>
    <header>
        <a href="home.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="myaccount.php">My account</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php if($_SESSION['user_name'] == 'admin') {?>
                    <a href="dashboard.php">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php }?>
        <a href="logout.php">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;
    </header>

    <div>
        <h1>My account</h1>
        <h3>Full Name: <?php echo $_SESSION['name']; ?></h3>
        <h3>User name: <?php echo $_SESSION['user_name']; ?></h3>
        <h3>Email: <?php echo $_SESSION['email']; ?></h3>
    </div>

</body>
</html>