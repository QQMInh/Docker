<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
include_once('config/config.php');

if (isset($_SESSION['email'])) {
    $id_prd = $_GET['id'];

    // Thực hiện câu lệnh xóa
    $sql = "DELETE FROM prd_info WHERE prd_id='$id_prd'";
    if (mysqli_query($conn, $sql)) {
        // Thông báo thành công
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: 'Sản phẩm đã được xóa thành công.',
            }).then(() => {
                window.location.href = 'index.php?page_layout=product';
            });
        </script>";
    } else {
        // Thông báo lỗi
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Không thể xóa sản phẩm.',
            });
        </script>";
    }
} else {
    die("Bạn không có quyền");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Xóa sản phẩm</title>
    <meta charset="utf-8">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <!-- Essential javascripts for application to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
