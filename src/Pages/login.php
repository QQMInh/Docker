
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JavaScript kiểm tra độ dài -->
<script>
  function validateForm(form) {
    const username = form.username.value.trim();
    const email = form.email.value.trim();
    const pass = form.pass.value.trim();
    const re_pass = form.re_pass.value.trim();

    if (username === "" || email === "" || pass === "" || re_pass === "") {
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Vui lòng không để trống bất kỳ trường nào!'
      });
      return false;
    }

    if (username.length > 50 || email.length > 50 || pass.length > 50 || re_pass.length > 50) {
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Các trường nhập liệu không được vượt quá 50 ký tự!'
      });
      return false;
    }

    return true;
  }
</script>
<?php 
include_once('config/config.php');
if(isset($_POST['submitSignup'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $re_pass=$_POST['re_pass'];
    $date=date("d-m-Y");
    if ($pass == $re_pass) {
        $pass = $_POST["pass"];
    } else {
      echo '<script>
    Swal.fire({
        icon: "error",
        title: "Lỗi",
        text: "Mật khẩu không khớp, vui lòng đăng ký lại"
    });
</script>';
    }
      //  echo '<script> alert("Mật khẩu không khớp, vui lòng đăng ký lại");</script>';
 
    

        if (mysqli_num_rows(mysqli_query($conn, "SELECT*FROM user WHERE email = '$email'")) == 0) {
            if ($pass == $re_pass) {
                $email = $_POST["email"];
                $sql_user = "INSERT INTO user(username, pass, email, avatar, user_level, created_at) value( '$username', '$pass', '$email','DefaultAvt.jpg', '2','$date')";
                 mysqli_query($conn, $sql_user);
                 
               // echo'<script> alert("Tạo tại khoản thành công");</script>';
                $_SESSION['email'] = $email;
                header('location: index.php');
    
            }
        } else {
          echo '<script>
    Swal.fire({
        icon: "error",
        title: "Lỗi",
        text: "Email đã tồn tại, vui lòng đăng ký lại"
    });
</script>';
    }
        //     echo '<script> alert("Email đã tồn tại, vui lòng đăng ký lại");</script>';
          
        // }
  
}
?>
<?php
include_once('config/config.php');
  if (isset($_POST['submitLogin'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM user WHERE email='$email' AND pass='$pass'";   //LOGIN
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
      $_SESSION['email'] = $email;
       
      echo '<script language="javascript">alert("Dang nhap thanh cong");</script>';
      header('location: index.php');
      exit(); // Ngăn chặn việc thực hiện mã tiếp theo

    } else {
      
      echo '<script>
    Swal.fire({
        icon: "error",
        title: "Lỗi",
        text: "Tài khoản hoặc mật khẩu sai"
    });
</script>';
    }
    
  }
  ?>
	


  

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.html">Blog</a></li>
        </ol>
    

      </div>
    </section><!-- End Breadcrumbs -->

 <div class="login-logout ">
 <div class="container" data-aos="fade-up">

<div class="login-form">  	
  <input type="checkbox" id="chk" aria-hidden="true">
    <div class="signup">
      <form method="POST">
        <label for="chk" aria-hidden="true">ĐĂNG KÍ</label>
        <input type="text" name="username" placeholder="Tên người dùng" maxlength="50" required="">
        <input type="email" name="email" placeholder="Email" maxlength="50" required=""> 
      
        <input type="password" name="pass" placeholder="Mật khẩu" maxlength="50" required="">
        <input type="password" name="re_pass" placeholder="Nhập lại mất khẩu"maxlength="50" required="">
        <button name="submitSignup">ĐĂNG KÍ</button>
      </form>
    </div>

    <div class="login">
      <form method="POST">
        <label for="chk" aria-hidden="true">ĐĂNG NHẬP</label>
        <input name="email" placeholder="Email" maxlength="50">
        <input type="password" name="pass" placeholder="Mật khẩu" maxlength="50" required="">
        <button name="submitLogin">ĐĂNG NHẬP</button>
      </form>
    </div>
</div>
</div>
 </div>
<br><br>  

  


