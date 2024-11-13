<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once('config/config.php');

$prd_id = $_GET['id'];
$sql = "UPDATE prd_info SET prd_status='2' WHERE prd_id='$prd_id'";

if (mysqli_query($conn, $sql)) {
    // Thông báo thành công
    echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: 'Trạng thái sản phẩm đã được cập nhật thành công.',
        }).then(() => {
            window.location.href = 'index.php?page_layout=acp_product';
        });
    </script>";
} else {
    // Thông báo lỗi
    echo "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Không thể cập nhật trạng thái sản phẩm.',
        });
    </script>";
}