
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DN2ndHome</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
 -->
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="css/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="css/vendor/aos/aos.css" rel="stylesheet">
  <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="css/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="css/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <h1 class="logo"><a href="index.html">DN2ndHome</a></h1>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="index.php?page_layout=home">Trang chủ</a></li>
              <li><a class="nav-link scrollto" href="index.php?page_layout=home#about">Giới thiệu</a></li>
              <li class="dropdown"><a href="index.php?page_layout=list"><span>Dach sách</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="index.php?page_layout=list&id=1">Hải Châu</a></li>
                  <li><a href="index.php?page_layout=list&id=2">Cẩm Lệ</a></li>
                  <li><a href="index.php?page_layout=list&id=3">Thanh Khê</a></li>
                  <li><a href="index.php?page_layout=list&id=6">Sơn Trà</a></li>
                  <li><a href="index.php?page_layout=list&id=4">Liên Chiểu</a></li>
                  <li><a href="index.php?page_layout=list&id=5">Ngũ Hành Sơn</a></li>
                  <li><a href="index.php?page_layout=list&id=7">Hòa Vang</a></li>
                  <li><a href="index.php?page_layout=list&id=8">Trường Sa</a></li>
                </ul>
              </li> 
             
              <li><a class="nav-link scrollto" href="index.php?page_layout=contact">Liên hệ</a></li>
              <!-- <li><a class="nav-link scrollto" href="index.php?page_layout=login">Đăng nhập</a></li> -->
              <?php if (defined("user")){ ?>
                <li><a class="nav-link scrollto" href="index.php?page_layout=save">Đã lưu</a></li>
                <li class="dropdown"><a href=""><span> 
                <?php
                $sql = "SELECT*FROM user WHERE email='$email'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                ?>
                <img height="30px" width="30px" style="border-radius:50%" src="img/Avatars/<?php echo $row['avatar'];?>">                 
                <?php
                echo $row['username']; 
                $user_id=$row['user_id'];// khai báo user_id để lưu cho trang đăng tin và quan lí tin
               ?>
                </span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="index.php?page_layout=update_account">Quản lý tài khoản</a></li>
                  <li><a href="index.php?page_layout=postnew">Đăng tin</a></li>
                  <li><a href="index.php?page_layout=my_news">Tin đăng của tôi</a></li>
                  <li><a href="index.php?page_layout=logout">Đăng xuất</a></li>
                  
                </ul>
              </li> 
            <?php } 
              
              else { ?>
                  <li><a class="nav-link scrollto" href="index.php?page_layout=login">Đăng nhập</a></li>
                <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->
  

  <?php
  if (isset($_GET['page_layout'])) {
    switch ($_GET['page_layout']) {
      case 'login':
        include_once('login.php');
        break;
      case 'home':
        include_once('home.php');
        break;
      case 'update_account':
        include_once('edit_account.php');
        break;
      case 'my_news':
        include_once('myNews.php');
        break;
      case 'del_my_news':
        include_once('del_my_news.php');
        break;
      case 'logout':
        include_once('logout.php');
        break;
      case 'postnew':
        include_once('post_new.php');
        break;
      case 'list':
        include_once('menudanhmuc.php');
        break;
      case 'detail':
        include_once('detail.php');
        break;
      case 'save':
        include_once('save-View.php');
        break;
      case 'save_controller':
        include_once('saveController.php');
        break;
      case 'del_saved_new':
          include_once('del_saved_new.php');
          break;  
      case 'contact':
        include_once('contact.php');
        break;
    }
  } else {
    include_once('home.php');
  }

  ?>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>DN2ndHome</h3>
            <p><b>DN2ndHome</b> là kênh thông tin về phòng trọ, nhà trọ hàng đầu Việt Nam. Website được thành lập vào tháng 5/2021 - là 
              website mới nhất hỗ trợ riêng biệt cho người muốn đăng tin cho tuê phòng trọ cũng như người muốn tìm phòng trọ một cách nhanh nhất avf chính xác nhất</p>
            
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Trang chủ</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Giới thiệu</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Dịch vụ</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Điều khoản sử dụng</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Chính sách bảo mật</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              18 Lê Thiện Trị,Hòa Hải, <br>
              Ngũ Hành Sơn, Đà Nẵng<br>
              Việt Nam <br>
              <strong>Phone:</strong> +840354775580 <br>
              <strong>Email:</strong> nguyenquangminh78py@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Dịch vụ</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Hỗ trợ tìm kiếm</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Hỗ trợ cho thuê</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Tìm bạn ở ghép</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Tư vấn hỗ trợ </a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>DN2ndHome</strong>
      </div>
      <div class="credits">
        Designed by <a href="">Minh</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="css/vendor/aos/aos.js"></script>
  <script src="css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="css/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="css/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="css/vendor/php-email-form/validate.js"></script>
  <script src="css/vendor/purecounter/purecounter.js"></script>
  <script src="css/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="css/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function(){

            $("#sel_district").change(function(){
                var district_id = $(this).val();

                $.ajax({
                    url: 'getWard.php',
                    type: 'post',
                    data: {district:district_id},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_ward").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];

                            $("#sel_ward").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
    </script>
</body>