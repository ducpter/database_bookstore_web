<?php
    $urlIndex = "index.php?controller=cart&action=index&page=";
    $urlDelete = "index.php?controller=cart&action=delete&id=";
    $urlUpdate = "index.php?controller=cart&action=update&id=";
    $srcImg = "./public/image/";

    $prevPage = $urlIndex . $data['prePage'];
    $nextPage = $urlIndex . $data['nextPage'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./public/logo/favicon.ico">
  </head>
<body>
  <?php include "./views/masterLayout/MasterLayout.php"?>
  <div class="app-content content content-wrap">
    <div class="content-body">
      <div class="main-menu-content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title h3 light text-center">Trang danh sách giỏ hàng</h3>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close" href="index.php?controller=dashboard&action=index"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <p>
                  <?php if(isset($_SESSION['success'])){
                          echo $_SESSION['success'];
                          unset($_SESSION['success']);
                  }
                  if(isset($_SESSION['error'])){
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                  }?>
                  </p>
                </div>
                <a href="index.php?controller=cart&action=create" class="pl-1 float-left">
                <button type="button" class="btn btn-success btn-min-width mr-1 mb-1">
                <i class="la la-plus"></i> Thêm giổ hàng
                </button>
                </a>
                <div class="card-body float-right px-1 py-0">
                  <?php if($data['pages'] > 0):?>
                    <ul class="pagination">
                      <li class="page-item ">
                        <a class="page-link" href="<?php echo $prevPage; ?>">&laquo;</a>
                      </li>
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
                      <li class="page-item ">
                        <a class="page-link" href="<?php echo $nextPage;?>">&raquo;</a>
                      </li>
                    </ul>
                  <?php endif?>
                </div>
                <div class="table-responsive px-1">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Mã Giỏ</th>
                        <th scope="col">Mã Khách hàng</th>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Ngày thêm</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($data['carts'])):?>
                      <tr>
                        <td colspan="6" class="danger text-center">Không có giỏ hàng nào</td>
                      </tr>
                      <?php else :?>
                      <?php foreach($data['carts'] AS $key => $value):?>
                        <?php $productArr = explode("\n",$value['Ma_SP']); ?>
                        <?php $Count = count($productArr); ?>

                        <?php $quantityArr = explode("\n",$value['SoLuong']); ?>
                        <?php $priceArr = explode("\n",$value['GiaTien']);?>
                        <tr>
                          <th scope="row"><?php echo $value['ID'];?></th>
                          <td><?php echo $value['Ma_KH'];?></td>
                          <td><?php for($i=0;$i<$Count;$i++) {echo $productArr[$i].'<br>';}?></td>
                          <td><?php for($i=0;$i<$Count;$i++) {echo $priceArr[$i].'<br>';}?></td>
                          <td><?php for($i=0;$i<$Count;$i++) {echo $quantityArr[$i].'<br>';}?></td>
                          <td><?php echo $value['NgayTao'];?></td>
                          
                          <td>
                            <a href="<?php echo $urlUpdate.$value['ID'];?>" data-toggle="tooltip" data-placement="top" title="Sửa giỏ hàng">
                                  <i class="la la-edit warning font-large-2" >
                                  </i>
                            </a>
                            <a href="<?php echo $urlDelete.$value['ID'];?>" data-toggle="tooltip" data-placement="top" title="Xóa giỏ hàng" onclick="return confirm('Bạn có chắc muốn xóa giỏ hàng này?')">
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
  <?php include "./views/masterLayout/footer.php"?>
</body>
</html>
