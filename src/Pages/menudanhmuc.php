<?php
include_once('config/config.php');
    $sql_danhmuc = "SELECT * FROM district ORDER BY district_id";       // Lay danh sach danh muc
    $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
?>

<?php 
  if (isset($_GET['id'])) {                       //Lay tin dang
    $id_danhmuc = $_GET['id'];
    $sql_prd = "SELECT * FROM prd_info inner join district ON prd_info.district_id=district.district_id 
    inner join ward ON prd_info.ward_id=ward.ward_id WHERE prd_status = 2 AND prd_info.district_id = $id_danhmuc";
    $query_prd =  mysqli_query($conn, $sql_prd);
  }else {
    $sql_prd = "SELECT * FROM prd_info inner join district ON prd_info.district_id=district.district_id 
    inner join ward ON prd_info.ward_id=ward.ward_id WHERE prd_status = 2";
    $query_prd =  mysqli_query($conn, $sql_prd);
  }
?>
<body>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?page_layout=home">Trang chủ</a></li>
          <li><a href="index.php?page_layout=list">Danh sách tin đăng</a></li>
    
        </ol>
        <h2>Tin đăng</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Danh sách ======= -->
    <section class="blog">
      <div class="container">

        <div class="row">


        <div class="col-lg-4">
            <div class="sidebar">

              <h3 class="sidebar-title">Tìm kiếm</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="search" class="form-control" name="keyword" required>
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Khu vực</h3>
              <div class="sidebar-item categories">
                <ul>
                   <li><a href="index.php?page_layout=list">Tất cả <span>(<?php echo mysqli_num_rows($query_danhmuc) ?>) </span></a></li> 
                  <?php
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                  ?>
                  <li><a href="index.php?page_layout=list&id=<?php echo $row_danhmuc['district_id'] ?>"><?php echo $row_danhmuc['district_name'] ?></a></li> <!--<span>(12)</span>-->
                 
                  <?php
                    }
                    ?>
                </ul>
              </div><!-- End sidebar categories-->

              

              <h3 class="sidebar-title">Tìm theo khoảng giá</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">Dưới 1tr</a></li>
                  <li><a href="#">1tr-1.5tr</a></li>
                  <li><a href="#">1.5tr-2tr</a></li>
                  <li><a href="#">2tr-2.5tr</a></li>
                  <li><a href="#">Trên 2.5tr</a></li>
                 
                </ul>
              </div>
              

            </div>

          </div><!-- End Menu sidebar --> 
          
          
      <div class="col-lg-8 entries"> <!--Tin Dang-->
      <?php
      while($row_prd = mysqli_fetch_array($query_prd)){
      ?>
  
      <div class="blog-author">
        <div class="row">
        <div class="col-md-5"><a href="index.php?page_layout=detail&id=<?php echo $row_prd['prd_id']?>"><img style="width: 300px; max-height: 400px;" src="img/Products/<?php echo $row_prd['img']?>" class="rounded float-left"></a></div>
        <div class="col-md-7">
          <a href="index.php?page_layout=detail&id=<?php echo $row_prd['prd_id']?>"><h4><?php echo $row_prd['prd_title']?></h4></a>
          <hr>
          <div class="row">
              <div class="col-md-8">
                 <p><strong>Khu vực: <?php echo $row_prd['district_name'] ?> - <?php echo $row_prd['ward'] ?></strong></p>
                 <p><strong>Giá    :     <?php echo $row_prd['price']?></strong></p>
              </div>
              <div class="col-md-4">
                
              <!-- <a href="" name="SaveNew" class="btn-get-started">Lưu</a> -->
              </div>
          </div>
        </div>
        </div>
      </div>
    
        <?php
      }
      ?>
          <!-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">Next</a></li>
              </ul>
            </div> -->
          </div><!--Tin Dang-->
        </div>
      </div>
    </section><!--  -->

  </main><!-- End #main -->
</body>
</html>