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

if (isset($_POST['sbm'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_pass = $_POST['user_pass'];
    $user_re_pass = $_POST['user_re_pass'];
    $user_level = $_POST['user_level'];
    $date = date("d-m-Y");

    // Kiểm tra mật khẩu
    if ($user_pass !== $user_re_pass) {
        $error_pass = '<div class="alert alert-danger">Mật khẩu không khớp, hãy thử mật khẩu khác</div>';
    } else {
        // Kiểm tra email đã tồn tại
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'")) == 0) {
            $sql_user = "INSERT INTO user (username, pass, email, user_level, created_at) VALUES ('$username', '$user_pass', '$email', '$user_level', '$date')";
            if (mysqli_query($conn, $sql_user)) {
                // Thông báo thành công
                echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm thành viên thành công!',
                        text: 'Người dùng đã được thêm vào hệ thống.',
                    }).then(() => {
                        window.location.href = 'index.php?page_layout=user';
                    });
                </script>";
            } else {
                // Thông báo lỗi khi thêm
                echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Không thể thêm người dùng.',
                    });
                </script>";
            }
        } else {
            $error = '<div class="alert alert-danger">Đã tồn tại email ' . $email . ', hãy thử email khác</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADD user</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
                <li class="breadcrumb-item"><a href="#">Thêm thành viên</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Thêm thành viên</h3>
                    <div class="tile-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên người dùng</label>             
                                <input name="username" required class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <?php if (isset($error)) { echo $error; } ?>
                                <input name="email" required type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <?php if (isset($error_pass)) { echo $error_pass; } ?>
                                <input name="user_pass" required type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input name="user_re_pass" required type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="user_level" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="2">Member</option>
                                </select>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" name="sbm" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm</button>
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
