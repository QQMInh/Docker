<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
include_once('config/config.php');

if (!defined('level')) {
    die('Lỗi đăng nhập');
}  

$user_id = $_GET['id'];
$sql_user = "SELECT * FROM user WHERE user_id='$user_id'";
$query_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_array($query_user);

if (isset($_POST['sbm'])) {
    $user_level = $_POST['user_level'];
    $date = date("d-m-Y");

    $sql = "UPDATE user SET user_level='$user_level', created_at='$date' WHERE user_id='$user_id'";
    if (mysqli_query($conn, $sql)) {
        // Hiển thị thông báo thành công
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Cập nhật thành công!',
                text: 'Quyền của người dùng đã được cập nhật.',
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
                text: 'Không thể cập nhật quyền người dùng.',
            }).then(() => {
                window.location.href = 'index.php?page_layout=user';
            });
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>edit user</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="app sidebar-mini">
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Quản lý thành viên</li>
                <li class="breadcrumb-item"><a href="#">Sửa thành viên</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Thành viên: <?php echo $row_user['username'];?></h3>
                    <div class="tile-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Họ & Tên</label>             
                                <input type="text" name="user_full" required class="form-control" value="<?php echo $row_user['username'];?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="user_mail" required value="<?php echo $row_user['email'];?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="user_level" class="form-control">
                                    <option <?php if($row_user['user_level'] == 1){ echo 'selected'; } ?> value="1">Admin</option>
                                    <option <?php if($row_user['user_level'] == 2){ echo 'selected'; } ?> value="2">Member</option>
                                </select>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" name="sbm" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật</button>
                                <button class="btn btn-primary" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
