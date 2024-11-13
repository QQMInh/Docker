
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
include_once('config/config.php');

if (isset($_POST['submitUpdate'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];

    if ($_FILES['avatar']['name'] == "") {
        $avatar = $row['avatar'];
    } else {
        $avatar = $_FILES['avatar']['name'];
        $image_tmp = $_FILES['avatar']['tmp_name'];
        move_uploaded_file($image_tmp, 'img/Avatars/' . $avatar);
    }

    $sql = "UPDATE user SET username='$username', pass='$pass', avatar='$avatar', phone='$phone' WHERE email='$email'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      echo '<script>
      Swal.fire({
          icon: "done",
          title: "Done",
          text: "Cập nhật thành công!"
      });
  </script>';
      
    } else {
      echo '<script>
      Swal.fire({
          icon: "error",
          title: "Lỗi",
          text: "Có lỗi xảy ra, vui lòng thử lại!"
      });
  </script>';
      
    }

    // Điều hướng sau khi thông báo
    echo "<script>window.location.href='index.php?page_layout=update_account';</script>";
}
?>


<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?page_layout=home">Trang chủ</a></li>
          <li><a href="#">Quản lý tài khoản</a></li>
        </ol>
        <h2>Người dùng: <?php echo $row['username']; ?></h2>

      </div>
    </section><!-- End Breadcrumbs -->


  <!--/ Intro Single star /-->

<div class="container">
<br>
    <form method="POST" enctype="multipart/form-data">
         <div class="form-row">
      <br>
         <div class="row">
         <div class="form-group col-md-6">
             <label>Tên người dùng</label>             
             <input type="text" name="username" required class="form-control" value="<?php echo $row['username'];?>">
         </div>

         <div class="form-group col-md-6">
            <label>Email</label>
            <input type="text" value="<?php echo $row['email'];?>" class="form-control" disabled>
         </div>
         </div>
      <br>  
         <div class="row">
            <div class="col-md-6">
               <div class="form-group col-md-12">
                  <label>Số điện thoại</label>
                  <input type="text" name="phone" value="<?php echo $row['phone'];?>" class="form-control">
               </div>

               <div class="form-group col-md-12">

      <br>         
                  <div class="row">

                  <div class="col-md-2">
                        <img height="100px" width="100px" style="border-radius:50%" src="img/Avatars/<?php echo $row['avatar'];?>">
                     </div>
                     <div class="col-md-10">
                        <br><br>
                        <label>Ảnh đại diện</label><br>
                        <input type="file" name="avatar"> <br><br>
                     </div>
                     
                  </div>
               </div>
            </div>

            <div class="col-md-6">
               <div class="form-group col-md-12">
                  <label> Đặt mật khẩu mới</label>
                  <input type="text" name="pass" required  class="form-control">
               </div>

               <div class="form-group col-md-12">
                  <label>Nhập lại mật khẩu</label>
                  <input type="text" name="re_pass" required  class="form-control">
               </div>
            </div>
         </div>

         <input type="submit" name="submitUpdate" class="btn-get-started"></input>
         <input class="btn-get-started" type="reset" onclick="submit()"><i class="fa fa-fw fa-lg fa-times-circle"></i></input>

            </div>
      </form>     
</div>