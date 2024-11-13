<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (!defined('level')) {
    die('Lỗi');
}  
?>
<?php
session_start();
include_once('config/config.php');
if(isset($_SESSION['email'])){
    $contact_id=$_GET['id'];
    $sql="DELETE FROM contact WHERE contact_id=$contact_id";
    if (mysqli_query($conn, $sql)) {
        // Nếu xóa thành công, hiển thị thông báo
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: 'Xóa liên hệ thành công!',
            }).then(() => {
                window.location.href = 'index.php?page_layout=contact';
            });
        </script>";
    } else {
        // Nếu có lỗi xảy ra
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Có lỗi xảy ra trong quá trình xóa liên hệ!',
            });
        </script>";
    }
} else {
    die("Bạn không có quyền");
}
?>
