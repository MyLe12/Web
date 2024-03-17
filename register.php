<?php 
session_start(); 

//Nhúng file kết nối với database
include "db_conn.php";

if (isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['password1']) && isset($_POST['email']) && isset($_POST['password2']) ) {

	// Xử lý dữ liệu đầu vào
	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	 }

	//Lấy dữ liệu từ file index_register.php
	$fname = validate($_POST['fname']);
	$uname = validate($_POST['uname']);
	$pass1 = validate($_POST['password1']);
	$pass2 = validate($_POST['password2']);
	$email = validate($_POST['email']);

	//Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (empty($fname) || empty($pass1) || empty($email) || empty($uname) || empty($pass2)) {
        header("Location: index_register.php?error=Please complete all information!");
	    exit();
    }
    
	//Kiểm tra tên đăng nhập này đã có người dùng chưa
	$sql= "SELECT user_name FROM users WHERE user_name='$uname'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		header("Location:index_register.php?error=Username is already in use!");
		exit();
    }

	//Kiểm tra email có đúng định dạng hay không
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location:index_register.php?error=Invalid email!");
		exit();
    }

	//kiểm tra xem 2 mật khẩu có giống nhau hay không
	if($pass1 != $pass2) {
		header("Location:index_register.php?error=Re-fill password!");
		exit();
	}
	else {
		$pass = $pass1; // dùng md5

		// Lưu thông tin người dùng vào database
		$sql = "INSERT INTO users (user_name, password, name, email) values ('$uname','$pass','$fname','$email')";
		mysqli_query($conn, $sql);

        header("Location:index_login.php");
		exit();
	}
}
else{
	header("Location: index_register.php?error=Registration failed!");
	exit();
}