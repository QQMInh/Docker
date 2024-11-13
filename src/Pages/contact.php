
	<!-- // include_once("config/config.php");
	// if (isset($_POST['submitContact'])) {
	// 	$ctname = $_POST['ct_name'];
	// 	$ctemail = $_POST['ct_email'];
	// 	$ctsubject = $_POST['ct_subject'];
	// 	$ctmessage = $_POST['ct_message'];
	// 	$ctdate=date("d-m-Y");
	// 	$sqlct="INSERT INTO contact(username,email,ct_subject,ct_message,created_at) 
  //       VALUE('$ctname','$ctemail','$ctsubject','$ctmessage','$ctdate')";
	// 	$contact_query=mysqli_query($conn,$sqlct);
        // $success = '<div class="alert alert-success" style="color:red">Bạn đã gửi tin thành công, vui lòng chờ để chúng tôi xem !</div>';
        
	// } -->

  <?php  
   include_once('config/config.php');

   if (defined("user")){ 
    if(isset($_POST['submit'])){
        // $name=$_POST['name'];
        // $email=$_POST['email'];
        $subject = $_POST['ct_subject'];
        $message=$_POST['ct_message'];
        $date=date("d-m-Y");
        $sql="INSERT INTO contact(ct_subject,ct_message,user_id,created_at) 
        VALUE('$subject','$message','$user_id','$date')";//$user_id lấy từ index.php
        $query=mysqli_query($conn,$sql);
        $success = '<div class="alert alert-success" style="color:red">Bạn đã gửi tin thành công, vui lòng chờ để chúng tôi xem !</div>';
      
      }
    }
      else{
         
         $error = '<div class="alert alert-danger" style="color:red">Bạn phải đăng nhập trước khi để lại lời nhắn !</div>';
    }

?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

    <ol>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="">Liên hệ</a></li>
    </ol>


    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="section-bg">
<div class="container" data-aos="fade-up">

<div class="section-header">
  <h3>Liên hệ</h3>
  <p>Vui lòng phản hồi ý kiến của bạn trong form bên dưới để được hỗ trợ hoặc giải đáp thắc mắc.</p>
</div>

<div class="row contact-info">

  <div class="col-md-4">
    <div class="contact-address">
      <i class="bi bi-geo-alt"></i>
      <h3>Địa chỉ</h3>
      <address>18 Lê Thiện Trị, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng 550000, Vietnam</address>
    </div>
  </div>

  <div class="col-md-4">
    <div class="contact-phone">
      <i class="bi bi-phone"></i>
      <h3>Số điện thoại</h3>
      <p><a href="tel:+84364956400">+</a>84364956400</p>
    </div>
  </div>

  <div class="col-md-4">
    <div class="contact-email">
      <i class="bi bi-envelope"></i>
      <h3>Email</h3>
      <p><a href="mailto:nguyenquangminh78py@gmail.com">nguyenquangminh78py@gmail.com</a></p>
    </div>
  </div>

</div>

<div class="form">
    

<form class="" action="" method="post" role="form">

   <div class="loading"></div>
   <div class="error-message"></div>
   <div class="sent-message"></div>
    <div class="form-group">
      <input type="text" class="form-control" name="ct_subject" placeholder="Tiêu đề" required>
    </div>
    <div class="form-group">
      <textarea class="form-control" name="ct_message" rows="5" placeholder="Nội dung" required></textarea>
    </div>
    <button type="submit" name="submit">Gửi tin nhắn</button>
  </form>
</div>
<!-- <form class="" action="" method="post" role="form">
  <input name="hhhh">
  <button type="submit">hhh</button>
</form> -->
</div>
</section><!-- End Contact Section -->