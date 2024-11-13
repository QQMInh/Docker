<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
include_once('config/config.php');

if (isset($_SESSION['email'])) {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $user_id = $_GET['id'];

        // Bước 1: Xóa dữ liệu liên quan trong bảng contact
        $sql_contact = "DELETE FROM contact WHERE user_id='$user_id'";
        mysqli_query($conn, $sql_contact); // Xóa dữ liệu trong bảng contact trước

        // Bước 2: Xóa dữ liệu liên quan trong bảng cart_new
        $sql_cart = "DELETE FROM cart_new WHERE user_id='$user_id'";
        mysqli_query($conn, $sql_cart); // Xóa dữ liệu trong bảng cart_new

        // Bước 3: Xóa người dùng từ bảng user
        $sql_user = "DELETE FROM user WHERE user_id='$user_id'";
        if (mysqli_query($conn, $sql_user)) {
            // Hiển thị thông báo thành công
            echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: 'Xóa người dùng thành công.',
                }).then(() => {
                    window.location.href = 'index.php?page_layout=user';
                });
            </script>";
        } else {
            // Hiển thị thông báo lỗi
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Không thể xóa người dùng.',
                }).then(() => {
                    window.location.href = 'index.php?page_layout=user';
                });
            </script>";
        }
    } else {
        // Hiển thị thông báo lỗi cho ID không hợp lệ
        echo "
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Cảnh báo',
                text: 'ID không hợp lệ.',
            }).then(() => {
                window.location.href = 'index.php?page_layout=user';
            });
        </script>";
    }
} else {
    die('Bạn cần đăng nhập trước!');
}
?>
