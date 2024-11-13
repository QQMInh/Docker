
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once('config/config.php');

$prd_id = $_GET['id'];    
$sql_del_my_news = "DELETE FROM `prd_info` WHERE `prd_info`.`prd_id` = $prd_id";
$query = mysqli_query($conn, $sql_del_my_news);

// Kiểm tra xem truy vấn có thành công hay không
if ($query) {
    // Thông báo thành công
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Done',
            text: 'Cập nhật thành công!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?page_layout=my_news';
            }
        });
    </script>";
} else {
    // Thông báo lỗi
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Có lỗi xảy ra khi xóa sản phẩm.',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?page_layout=my_news';
            }
        });
    </script>";
}
?>
