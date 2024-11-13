<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?page_layout=home">Trang chủ</a></li>
          <li><a href="#">Đăng tin</a></li>
        </ol>
    </div>
    </section><!-- End Breadcrumbs -->
    <?php  
   include_once('config/config.php');
   if (isset($_POST['submit'])) {
     $title = $_POST['title'];
     $district_id = $_POST['district_id'];
     $ward_id = $_POST['ward_id'];
     $area = $_POST['area'];
     $price = $_POST['price'];
     $description = $_POST['description'];
     $status = 1;

     $date=date("d-m-Y");
     if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'],'img/Products/'.$file_name);
     }

     $sql = "INSERT INTO prd_info(user_id,district_id,ward_id,prd_title,area,price,prd_detail,img,prd_status,create_day) VALUE 
     ('$user_id', '$district_id','$ward_id','$title','$area','$price','$description','$file_name','$status','$date')";
     $query = mysqli_query($conn,$sql);
    //  echo $sql; 
     if($query){
      echo '<script>
      Swal.fire({
          icon: "done",
          title: "Done",
          text: "Bạn đã đăng bài viết thành công"
      });
  </script>';
       
      
     }else {
      echo '<script>
      Swal.fire({
          icon: "error",
          title: "Lỗi",
          text: "Đăng bài thất bại! Lỗi:"
      });
  </script>';
      
     }
   }
  ?>



    <div class="container">
      <h3>ĐĂNG TIN MỚI</h3>
       <!-- --------------------------- -->
      <form method="POST" role="form" enctype="multipart/form-data">

      <div class="row">
        <div class="form-group col-md-12">
              <label for="title" >Tiêu đề</label>
              <textarea type="text-area"rows="1" name="title" class="form-control" placeholder="Tiêu đề tin đăng" required=""></textarea>
         </div> 
      </div><br>

      <div class="row">
        
        <div class="col-md-6">
        <label>Quận/Huyện</label>
            <select class="form-control" id="sel_district" name="district_id">
              <option value="">Chọn Quận/Huyện</option>
            <?php 
                $sql_district="SELECT * FROM district";  
                $kt_type=mysqli_query($conn,$sql_district);
                while($row_type= mysqli_fetch_assoc($kt_type)){ ?>
                  <option value="<?php echo $row_type['district_id'];?>"><?php echo $row_type['district_name'];?></option>
            <?php }?>
            </select>
         </div>  


        <div class="col-md-6">
        <label>Phường/Xã</label>
            <select class="form-control" id="sel_ward" name="ward_id">
            <option value="0">Chọn Phường/Xã</option>
            </select>
        </div>
      </div> <br>
      <!-- ---------------------- -->
      <div class="row">
          <div class="form-group col-md-6">
                    <label for="">Diện tích (m <sup>2</sup>)</label>
                    <input type="number" name="area" class="form-control" min="1" required="">
           </div>
           <div class="form-group col-md-6">
                    <label for="">Giá thuê</label>
                    <input type="number" name="price" class="form-control" min="1" required="">
           </div>
      </div>
      <br>
  
      
      <div class="row">
        <div class="col-md-6">
          <label for="image"><h4>Chọn ảnh cho tin đăng của bạn</h4></label>
        </div>
        <div class="col-md-6">
          <!-- <label for="file" >Chọn 1 ảnh bìa</label> -->
          <input type="file" name="image" required multiple>
          
        </div>
        <!-- <div class="col-md-4">
          <label for="file" >Chọn ảnh phụ</label>
          <input type="file" name="image_2" required multiple>
        </div>
        <div class="col-md-4">
          <label for="file" >Chọn ảnh phụ</label>
          <input type="file" name="image_3" required multiple>
        </div> -->
      </div>
     
      <div class="row">
        <div class="form-group col-md-12">
              <label for="" >Mô tả</label>
              <textarea type="text-area"rows="3" name="description" class="form-control" placeholder="Nhập thông tin chi tiết về phòng trọ của bạn" required=""></textarea>
         </div> 
      </div>
     
      <div class="row">
        <div class="col-md-12">
            <p><strong>Lưu ý: </strong><i>Vui lòng cập nhập đầy đủ số điện thoại và email.Bài đăng có thông tin không đúng sự thật sẽ không được xét duyệt</i></p>
        </div>
      </div>
      <button type="submit" name="submit" class="btn-get-started">Đăng tin</button>
      <button class="btn-get-started" type="reset" onclick="submit()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Xoá</button>
      <!-- <a href="" class="btn-get-started">Lưu</a> -->
      </form>
    </div>
     