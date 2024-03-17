<?php
global $conn;

$sname= "localhost:3307";
$unmae= "root";
$password = "";
$db_name = "test_db";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

//Nếu chưa kết nối thì thực hiện kết nối
if (!$conn) {
	echo "Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error();
}



function conn_db()
{
	global $conn;
	$sname= "localhost:3307";
	$unmae= "root";
	$password = "";
	$db_name = "test_db";
	
	
	//Nếu chưa kết nối thì thực hiện kết nối
	if (!$conn) {
		$conn = mysqli_connect($sname, $unmae, $password, $db_name);
	}
}

//Hàm ngắt kết nối
function disconn_db() {
	global $conn;

	//Nếu đã kết nối thì ngắt kết nối
	if($conn) {
		mysqli_close($conn);
	}
}

//Lấy tất cả users
function get_all_users() {
	global $conn;
	conn_db();

	//Truy vấn lấy tất cả các users
	$sql = "SELECT * FROM users";
	$query = mysqli_query($conn, $sql);

	//Mảng chứa kết quả
	$result = array();

	//Lặp qua từng bản ghi và đưa vào biến kết quả

	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	return $result;
}

//Lấy user theo id
function get_user($id) {
	global $conn;
	conn_db();

	$sql = "SELECT * FROM users WHERE id = {$id}";
	$query = mysqli_query($conn, $sql);
	$result = array();

	if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
	return $row;
}

// Thêm sinh viên
function add_user($fname, $uname, $password, $email){
	global $conn;
	conn_db();

	$sql = "INSERT INTO users (name, user_name, password, email) VALUES ('$fname', '$uname', '$password', '$email')";
	$query = mysqli_query($conn, $sql);
	return $query;
}

//Sửa user
function edit_user($id, $fname, $uname, $password, $email){
	global $conn;
	conn_db();
	$sql = "
            UPDATE users SET
            name = '$fname',
            user_name = '$uname',
            password = '$password',
			email = '$email',
            WHERE id = '$id'
    ";
	$query = mysqli_query($conn, $sql);
	return $query;
}

//Xóa sinh viên
function delete_user($id)
{
    global $conn;
    conn_db();
     
    $sql = " DELETE FROM users WHERE id = $id ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}

//Lấy tất cả product
function get_all_product() {
	global $conn;
	conn_db();

	//Truy vấn lấy tất cả các users
	$sql = "SELECT * FROM product";
	$query = mysqli_query($conn, $sql);

	//Mảng chứa kết quả
	$result = array();

	//Lặp qua từng bản ghi và đưa vào biến kết quả
	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}

	return $result;
}

//Lấy product theo id
function get_product($id) {
	global $conn;
	conn_db();

	$sql = "SELECT * FROM product WHERE id = {$id}";
	$query = mysqli_query($conn, $sql);
	$result = array();

	if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }

	return $row;
}

//Lấy product theo title
function get_product_title($title) {
	global $conn;
	conn_db();

	$sql = "SELECT * FROM product WHERE title = '{$title}'";
	$query = mysqli_query($conn, $sql);
	$result = array();

	if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }

	return $row;
}

// Thêm product
function add_product($cate, $title, $price, $des, $releas){
	global $conn;
	conn_db();

	$sql = "INSERT INTO product (category, title, price, description, releas) VALUES ('$cate', '$title', '$price', '$des',  '$releas')";
	$query = mysqli_query($conn, $sql);

	return $query;

}

//Sửa product
function edit_product($id, $cate, $title, $price, $des, $releas){
	global $conn;
	conn_db();

	$sql =  "
		UPDATE product SET
		category = '$cate',
		title = '$title',
		price = '$price',
		description = '$des',
		releas = '$releas'
		WHERE id = '$id'
	";
	$query = mysqli_query($conn, $sql);

	return $query;
}

//Xóa category
function delete_product($id) {
    global $conn;
    conn_db();
     
    $sql = " DELETE FROM product WHERE id = $id ";
    $query = mysqli_query($conn, $sql);
     
    return $query;
}

//Lấy tất cả category
function get_all_category() {
	global $conn;
	conn_db();

	//Truy vấn lấy tất cả các users
	$sql = "SELECT * FROM category";
	$query = mysqli_query($conn, $sql);

	//Mảng chứa kết quả
	$result = array();

	//Lặp qua từng bản ghi và đưa vào biến kết quả
	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	
	return $result;
}

//Lấy category theo id
function get_category($id) {
	global $conn;
	conn_db();

	$sql = "SELECT * FROM category WHERE id = {$id}";
	$query = mysqli_query($conn, $sql);
	$result = array();

	if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }

	return $row;
}

// Thêm category
function add_category($name){
	global $conn;
	conn_db();

	$sql = "INSERT INTO category (name) VALUES ('$name')";
	$query = mysqli_query($conn, $sql);

	return $query;
}

//Sửa category
function edit_category($id, $name){
	global $conn;
	conn_db();

	$sql = "UPDATE category SET name = '$name' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);

	return $query;
}

//Xóa category
function delete_category($id) {
    global $conn;
    conn_db();
     
    $sql = " DELETE FROM category WHERE id = $id ";
    $query = mysqli_query($conn, $sql);
     
    return $query;
}