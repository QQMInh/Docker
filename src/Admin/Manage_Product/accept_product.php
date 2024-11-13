<?php
if (!defined('level')) {
    die('Lỗi đăng nhập');
}  
?>
<?php 
include_once('config/config.php');

// Kiểm tra nếu có thông báo từ hành động duyệt hoặc xóa
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'approve') {
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: 'Tin đăng đã được duyệt thành công!',
            });
        </script>";
    } elseif ($action === 'delete') {
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Thất bại',
                text: 'Tin đăng đã bị xóa!',
            });
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  </head>
  <body class="app sidebar-mini">
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Danh sách tin đăng chờ duyệt</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <form method="POST">      
                  <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Địa chỉ</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Diện tích</th>
                        <th>Người đăng</th>
                        <th>Tiêu đề</th>
                        <th>Thông tin</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM prd_info 
                              INNER JOIN district ON prd_info.district_id=district.district_id 
                              INNER JOIN ward ON prd_info.ward_id=ward.ward_id 
                              WHERE prd_status = 1";
                      $query = mysqli_query($conn, $sql);
                      
                      while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                          <td><?php echo $row['prd_id'] ?></td>
                          <td><?php echo $row['district_name'] ?>, <?php echo $row['ward'] ?></td>
                          <td><?php echo $row['price'] ?> VNĐ</td>
                          <td style="text-align: center"><img width="150" src="img/Products/<?php echo $row['img'];?>" /></td>
                          <td><?php echo $row['area'] ?> m<sup>2</sup></td>
                          <td><?php echo $row['user_id'] ?></td>
                          <td><?php echo $row['prd_title'] ?></td>
                          <td><?php echo $row['prd_detail'] ?></td>
                          <td class="form-group">
                            <p><a href="index.php?page_layout=acp_controller&id=<?php echo $row['prd_id']; ?>&action=approve" class="btn btn-primary">Duyệt</a></p>
                            <a onclick="$('#dialog-example_<?php echo $row['prd_id'] ?>').modal('show');" href="#" class="btn btn-danger">Xóa</a>
                          </td>
                          <!-- Modal -->
                          <div id="dialog-example_<?php echo $row['prd_id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Bạn thực sự muốn xóa bài viết có mã là <span style="color:red"><?php echo $row['prd_id']?></span> không?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                  <a href="index.php?page_layout=del_product&id=<?php echo $row['prd_id']; ?>&action=delete" class="btn btn-danger">Xóa</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>
