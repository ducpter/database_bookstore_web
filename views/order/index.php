<?php
    $urlDelete = "index.php?controller=order&action=delete&id=";
    $urlUpdate = "index.php?controller=order&action=update&id=";
    $urlIndex = "index.php?controller=order&action=index&page=";
    $prevPage = $urlIndex . $data['prePage'];
    $nextPage = $urlIndex . $data['nextPage'];


?>

<!DOCTYPE html>
<html class="loading"lang="en" data-textdirection="ltr"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./public/logo/favicon.ico">
    
  </head>
<body>
<?php  include "./views/masterLayout/MasterLayout.php";?>
  <div class="app-content content content-wrap">
    <div class="content-body">
      <div class="main-menu-content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title warning h3 text-center">Trang danh sách hóa đơn đặt hàng</h3>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close" href="index.php?controller=dashboard&action=index"><i class="ft-x"></i></a></li>
                  </ul>
                  
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                <?php //print_r($data['data'])?>
                  <p><?php 
                    if(isset($_SESSION['success'])){
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                    }
                    if(isset($_SESSION['error'])){
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                    }
                  ?></p>
                </div>
                <a href="index.php?controller=order&action=create" class="pl-1">
                <button type="button" class="btn btn-success btn-min-width mr-1 mb-1">
                <i class="la la-plus"></i> Thêm hóa đơn
                </button>
                </a>
                <div class="card-body float-right px-1 py-0">
                  <?php if($data['pages'] > 0):?>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="<?php echo $prevPage?>">&laquo;</a></li>
                      <?php for($i = 1; $i <= $data['pages']; $i++):?>
                        <?php if($i == $data['currentPage']) :?>
                          <li class="page-item active">
                            <a class="page-link" href=<?php echo $urlIndex.$i?>><?php echo $i?></a>
                          </li>
                        <?php else:?>
                          <li class="page-item">
                            <a class="page-link" href=<?php echo $urlIndex.$i?>><?php echo $i?></a>
                          </li>
                        <?php endif;?>
                      <?php endfor;?>
                      <li class="page-item">
                        <a class="page-link" href="<?php echo $nextPage?>" >&raquo;</a>
                      </li>
                    </ul>
                  <?php endif;?>
                </div>
                <div class="table-responsive px-1">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Mã khách hàng</th>
                        <th scope="col">Tên người nhận</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Địa chỉ giao hàng</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody id='order'>
                    <?php if(empty($data['orders'])):?>
                      <tr>
                        <td colspan="5" class="danger text-center">Không có đơn hàng nào</td>
                      </tr>
                      <?php else :?>
                      <?php foreach($data['orders'] AS $key => $value):?>
                        <?php $productname = explode("\n",$value['TenSanPham']); $count=count($productname);?>
                        <tr>
                          <th scope="row"><?php echo $value['Ma_HoaDon'];?></th>
                          <td><?php echo $value['MaKhachHang'];?></td>
                          <td><?php echo $value['TenNguoiNhan'];?></td>
                          <td><?php for($i=0;$i<$count;$i++){echo $productname[$i]."<br>";}?></td>
                          <td><?php echo $value['DiaChiGiaoHang'];?></td>
                          <td>
                            <a href="<?php echo $urlUpdate.$value['Ma_HoaDon'];?>" data-toggle="tooltip" data-placement="top" title="Sửa hóa đơn">
                                  <i class="la la-edit warning font-large-2" ></i>
                            </a>
                            <a href="<?php echo $urlDelete.$value['Ma_HoaDon'];?>" data-toggle="tooltip" data-placement="top" title="Xóa hóa đơn" onclick="return confirm('Bạn có chắc muốn xóa hóa đơn này?')">
                                  <i class="la la-trash danger font-large-2" ></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach;?>
                    <?php endif;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php  include "./views/masterLayout/footer.php";?>

</body>
</html>
