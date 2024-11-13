
<?php 
include_once('config/config.php');


// if(isset($_SESSION['email'] )){
// 		unset($_SESSION['email']);

       
//         }else{
// 			header('location: ?page_layout=login');
       
//     }
?>

<body>
<!-- ======= Carousel ======= -->
<section id="hero">
	<div class="hero-container">
	  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
  
		<ol id="hero-carousel-indicators" class="carousel-indicators"></ol>
  
		<div class="carousel-inner" role="listbox">
  
		  <div class="carousel-item active" style="background-image: url(img/Carousel/1.jpg)">
			<div class="carousel-container">
			  <div class="container">
				<h2 class="animate__animated animate__fadeInDown">DN2ndHome - Tìm kiếm và cho thuê phòng trọ Đà Nẵng</h2> 
			  </div>
			</div>
		  </div>
  
		  <div class="carousel-item" style="background-image: url(img/Carousel/2.jpg)">
			<div class="carousel-container">
			  <div class="container">
				<h2 class="animate__animated animate__fadeInDown">Hơn 1000+ phòng trọ đang cho thuê</h2>
			  </div>
			</div>
		  </div>
  
		</div>
  
		<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
		</a>
  
		<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
		  <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
		</a>
  
	  </div>
	</div>
  </section><!-- end carousel -->

  <section id="about">
	<div class="container" data-aos="fade-up">

	  <header class="section-header">
		<h3>Giới thiệu</h3>
		<p><b>DN2ndHome</b> là kênh thông tin về phòng trọ, nhà trọ hàng đầu Việt Nam.
		   Website được thành lập vào tháng 5/2021 - là website mới nhất hỗ trợ riêng biệt cho người muốn đăng tin cho tuê phòng
			trọ cũng như người muốn tìm phòng trọ một cách nhanh nhất và chính xác nhất</p>
		
	  </header>
	  
	  <div class="row about-cols">

		<div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
		  <div class="about-col">
			<div class="img">
			  <img src="assets/img/about-mission.jpg" alt="" class="img-fluid">
			  <div class="icon"><i class="bi bi-bar-chart"></i></div>
			</div>
			<h2 class="title"><a href="#">Hỗ trợ tìm kiếm</a></h2>
			<p>
			  Nếu bạn có nhu cầu tìm phòng trọ, website của chúng tôi sẽ hỗ trợ bạn tim được phòng trọ ưng ý nhất.
			</p>
		  </div>
		</div>

		<div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
		  <div class="about-col">
			<div class="img">
			  <img src="assets/img/about-plan.jpg" alt="" class="img-fluid">
			  <div class="icon"><i class="bi bi-brightness-high"></i></div>
			</div>
			<h2 class="title"><a href="#">Hỗ trợ cho thuê</a></h2>
			<p>
			  Bạn cũng có thể tự mình đăng tải các tin đăng về phòng trọ mà bạn đang cho thuê chỉ với vài bước đơn giản.
		  </p>
		  </div>
		</div>

		<div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
		  <div class="about-col">
			<div class="img">
			  <img src="assets/img/about-vision.jpg" alt="" class="img-fluid">
			  <div class="icon"><i class="bi bi-calendar4-week"></i></div>
			</div>
			<h2 class="title"><a href="#">Liên hệ tư vấn</a></h2>
			<p>
			  Bạn có thể đóng góp ý kiên cá nhân dưới phần bình luận hoặc liên hệ chúng tôi đã cung cấp để được hỗ trợ. 
		  </p>
		  </div>
		</div>

	  </div>

	</div>
  </section><!-- End About Us Section -->
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="section-bg">
	<div class="container" data-aos="fade-up">

	  <header class="section-header">
		<h3 class="section-title">Danh sách khu vực</h3>
	  </header>

	  <div class="row" data-aos="fade-up" data-aos-delay="100">
	<div class=" col-lg-12">
		<ul id="portfolio-flters">
		  <li data-filter="*" class="filter-active">Tất cả</li>
		  <li data-filter=".filter-quan">Quận</li>
		  <li data-filter=".filter-huyen">Huyện</li>
		</ul>
	  </div>
	</div>

	<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

	  <div class="col-lg-4 col-md-6 portfolio-item filter-quan">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=2"><img src="img/Filter/camle.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=2">Quận Cẩm Lệ</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div> <!--Cam le-->

	  <div class="col-lg-4 col-md-6 portfolio-item filter-quan">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=1"><img src="img/Filter/quanhaichau.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=1">Quận Hải Châu</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div> <!--Hai chau-->

	  <div class="col-lg-4 col-md-6 portfolio-item filter-quan">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=3"><img src="img/Filter/thanhkhe.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=3">Quận Thanh Khê</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div> <!--Thanh Khê-->

	  <div class="col-lg-4 col-md-6 portfolio-item filter-quan">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=6"><img src="img/Filter/thanhkhe.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=6">Quận Sơn Trà</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div>  <!--Sơn Trà-->

	  <div class="col-lg-4 col-md-6 portfolio-item filter-quan">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=4"><img src="img/Filter/lienchieu.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=4">Quận Liên Chiểu</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div> <!--Lien Chieu-->

	  <div class="col-lg-4 col-md-6 portfolio-item filter-quan">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=5"><img src="img/Filter/quannhs.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=5">Quận Ngũ Hành Sơn</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div> <!--Ngu HANH sON-->

	  <div class="col-lg-4 col-md-6 portfolio-item filter-huyen">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=7"><img src="img/Filter/hoavang.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=7">Huyện Hòa Vang</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div> <!--Hoa vang -->

	  <div class="col-lg-4 col-md-6 portfolio-item filter-huyen">
		<div class="portfolio-wrap">
		  <figure>
			<a href="index.php?page_layout=list&id=8"><img src="img/Filter/huyenhoangsa.jpg" class="img-fluid" alt=""></a>
		  </figure>

		  <div class="portfolio-info">
			<h4><a href="index.php?page_layout=list&id=8">Huyện Hoàng Sa</a></h4>
			<p>Đà Nẵng</p>
		  </div>
		</div>
	  </div>

	</div>

	</div>
  </section><!-- End Portfolio Section -->    


</body>


