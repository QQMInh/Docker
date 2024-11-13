
<?php 
    $sql_cart = "SELECT * FROM `prd_info`   INNER JOIN district ON prd_info.district_id = district.district_id
                                            INNER JOIN ward ON prd_info.ward_id = ward.ward_id
                                            WHERE prd_info.user_id = $user_id";
    $query_cart =  mysqli_query($conn, $sql_cart);
?>

<body>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?page_layout=home">Trang chủ</a></li>
          <li><a href="index.php?page_layout=list">Tin đăng của tôi</a></li>
          
        </ol>
        <h2>Tin đăng của tôi. Tổng cộng: <?php echo mysqli_num_rows(mysqli_query($conn, $sql_cart)) ?></h2> 
      </div>
    </section><!-- End Breadcrumbs -->
    
    
   <section class="blog">
   <div class="container">
     
   <?php
      while($row_prd = mysqli_fetch_array($query_cart)){
      ?>
  
      <div class="blog-author">
        <div class="row">
        <div class="col-md-3"><a href="index.php?page_layout=detail&id=<?php echo $row_prd['prd_id']?>"><img style="width: 200px; max-height: 400px;" src="img/Products/<?php echo $row_prd['img']?>" class="rounded float-left"></a></div>
        <div class="col-md-9">
          <div class="row">
              <div class="col-md-12">
              <a href="index.php?page_layout=detail&id=<?php echo $row_prd['prd_id']?>"><h4><?php echo $row_prd['prd_title']?></h4><hr></a>    
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                <p><strong>Khu vực: <?php echo $row_prd['district_name'] ?> - <?php echo $row_prd['ward'] ?></strong></p>
              </div>
              <div class="col-md-2">
                <p><strong>Giá    :     <?php echo $row_prd['price']?></strong></p>
              </div>
              <div class="col-md-4">
                <h4 style="color: <?php if($row_prd['prd_status'] == 2){echo '#18d26e';}else if($row_prd['prd_status'] == 1){echo '#dc3545';}?>;"><strong><?php if($row_prd['prd_status'] == 2){echo 'Đã duyệt';}else if($row_prd['prd_status'] == 1){echo 'Chưa được duyệt';}?></strong></h4>
              </div>
              <div class="col-md-2">
                <a href="index.php?page_layout=del_my_news&id=<?php echo $row_prd['prd_id']?>" class="btn-get-started" style="background-color: rgb(234, 67, 53);">Xóa</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    <br>
        <?php
      }
      ?>
      <?php if (mysqli_num_rows(mysqli_query($conn, $sql_cart)) == 0) {?>
        <div class="blog-author" style="min-height: 550px">
          <h1 style="text-align: center; margin-top: 200px;">Bạn chưa có tin đăng nào</h1>
        </div>
    <?php  }?>
   </div>
   </section>

</body>