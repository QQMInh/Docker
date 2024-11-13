<?php
include_once('config/config.php');
    $sql_danhmuc = "SELECT * FROM district ORDER BY district_id";       // Lay danh sach danh muc
    $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
?>

<?php
    $id_prd = $_GET['id'];
    $sql_detail = "SELECT * FROM `prd_info` INNER JOIN district ON prd_info.district_id = district.district_id
                                            INNER JOIN ward ON prd_info.ward_id = ward.ward_id
                                            INNER JOIN user ON prd_info.user_id = user.user_id WHERE prd_id =  $id_prd";
    $detail_data= mysqli_query($conn,$sql_detail);                                        
?>

<?php
  if (isset($_POST['SaveNew'])) {
    $prd_id = $_GET['id'];
      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cart_new WHERE user_id = $user_id AND id_prd = $prd_id")) == 0) {
        $sql_save ="INSERT INTO cart_new (user_id, id_prd)  VALUE ($user_id, $prd_id)";
        $query=mysqli_query($conn, $sql_save);
      } else {
        echo '<script> alert("Tin đăng này đã được bạn lưu rồi");</script>';
      }
  }
?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

    <ol>
        <li><a href="index.php?page_layout=home">Trang chủ</a></li>
        <li><a href="index.php?page_layout=list">Danh sách tin đăng</a></li>
        <li><a href="index.php?page_layout=detail">...</a></li>
    </ol>
    </div>
</section><!-- End Breadcrumbs -->

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
        <?php while($row=mysqli_fetch_assoc($detail_data)) {?>
            <div class="blog-author">
                <div class="row">
                    <div class="row">
                    <a href="img/Products/<?php echo $row['img'];?>"><div class="col-md-12"><img style="width: 100%" src="img/Products/<?php echo $row['img'];?>" class="rounded float-left"></div></a>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-12"><h4><?php echo $row['prd_title'];?></h4></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <p><strong>Giá: <?php echo $row['price'];?></strong></p>
                            </div>
                            <div class="col-md-3">
                                <p><strong>Diện tích: <?php echo $row['area'];?></strong></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Khu vực: <?php echo $row['district_name'];?> - <?php echo $row['ward'];?></strong></p>
                            </div>
                        </div>
                        <div class="col-md-12">    
                        
                        <a href="index.php?page_layout=save_controller&id=<?php echo $id_prd;?>" class="btn-get-started">Lưu</a>
                    </div>
                </div>
            </div>


            <div class="blog-author">
                <div class="row">
                    <div class="col-md-12"><h4>Thông tin mô tả</h4></div>
                </div><hr>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong><?php echo $row['prd_detail'];?></strong></p>
                    </div>
                </div>
                
            </div>
            
            <div class="blog-author">
                <div class="row">
                    <div class="col-md-12"><h4>Thông tin người đăng</h4></div>
                </div><hr>
                           
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Tên tài khoản: <?php echo $row['username'];?></strong></p>
                        <img style="border-radius:50%; width: 120px;" src="img/Avatars/<?php echo $row['avatar'];?>">       
                    </div>
                    <div class="col-md-4">
                        <p><strong>Email: <?php echo $row['email'];?></strong></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Số điện thoại: <?php echo $row['phone'];?></strong></p>
                    </div>
                </div>
                
            </div>
          <?php }?>  
        </div><!--Tin Dang-->
    </div>
    </div>
</section><!--  -->