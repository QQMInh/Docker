<?php

// Kết nối cơ sở dữ liệu
$servername = "db"; // Thay bằng tên service trong docker-compose.yml
$username = "root";
$password = "minhdeptrai"; // Đảm bảo đồng bộ với giá trị trong docker-compose.yml
$database = "dn2ndhome2";

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Thiết lập mã hóa ký tự
if (!mysqli_set_charset($conn, "utf8")) {
    echo "Error loading character set utf8: " . mysqli_error($conn);
}

?>
