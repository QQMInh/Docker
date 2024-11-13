
<?php
include_once('config/config.php');
    $prd_id = $_GET['id'];
      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cart_new WHERE user_id = $user_id AND id_prd = $prd_id")) == 0) {
        $sql_save ="INSERT INTO cart_new (user_id, id_prd)  VALUE ($user_id, $prd_id)";
        $query=mysqli_query($conn, $sql_save);
        echo '<script> alert("Lưu tin đăng thành công");</script>';
        header("location: index.php?page_layout=save");
      } else {
        echo '<script> alert("Tin đăng này đã được bạn lưu rồi");</script>';
        include_once('menudanhmuc.php');
      }
  
?>
