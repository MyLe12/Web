<?php 
session_start(); 

//Nhúng file kết nối với database
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	// Xử lý dữ liệu đầu vào
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	//Lấy dữ liệu từ file index_login.php
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	//Kiểm tra người dùng đã nhập liệu đầy đủ chưa
	if (empty($uname)) {
		header("Location: index_login.php?error=User Name is required");
	    exit();

	}else if(empty($pass)){
        header("Location: index_login.php?error=Password is required");
	    exit();

	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['email'] = $row['email'];

				// Kiểm tra xem user có phải là admin không
				if($row['user_name'] == 'admin')
					header("Location: dashboard.php");
				else
            		header("Location: home.php");
		        exit();

            }else{
				header("Location: index_login.php?error=Incorect User name or password");
		        exit();
			}
			
		}else{
			header("Location: index_login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index_login.php");
	exit();
}
