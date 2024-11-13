<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once('config/config.php');
$prd_id = $_GET['id'];
$sql_del_saved_new = "DELETE FROM cart_new WHERE user_id = $user_id AND id_prd = $prd_id";
$query = mysqli_query($conn, $sql_del_saved_new);

if ($query) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Done',
            text: 'Cập nhật thành công!'
        }).then(function() {
            window.location.href = 'index.php?page_layout=save';
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Có lỗi xảy ra!'
        });
    </script>";
}
?>
