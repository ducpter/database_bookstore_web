<?php 
  $quantity = str_replace("\n",", ",$data['cart']['SoLuong']);
  $product = explode("\n", $data['cart']['Ma_SP']);
  $price = explode("\n", $data['cart']['GiaTien']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa thông tin trong giỏ hàng</title>
  <link rel="apple-touch-icon" href="./public/theme-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="./public/logo/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="./public/theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="./public/theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="./public/theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="./public/theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="./public/theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="./public/theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>
<body>
  <?php include "./views/masterLayout/MasterLayout.php"?>
  <div class="app-content content content-wrap">
    <div class="content-body">
      <div class="main-menu-content">
        <div class="col-xl-6 col-md-12 mx-auto">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h3 class="card-title text-center text-muted light">Sửa thông tin giỏ hàng</h3>
                <h6 class="card-subtitle text-muted text-center">Nhập thông tin cần sửa bên dưới</h6>
               
              </div>
              <div class="card-body">
                <form class="form" method="post" enctype="multipart/form-data">
                  
                    <div class="card-body">
                        <p class="text-muted">Mã giỏ hàng</p>
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?php echo $data['cart']['ID']?>">
                        </fieldset>
                    </div>
                  
                  <div class="form-body">
                    <div class="form-group">
                      <label for="donationinput1" class="pl-2 h5">Khách hàng</label>
                      <input type="text" name="customer" id="donationinput1" class="form-control" readonly="readonly" value="<?php echo $data['cart']['Ma_KH']?>">
                    </div>
                    <div class="form-group">
                      <label class="pl-2 h5 float-left">Mã sản phẩm</label>
                      <label class="pl-2 h5 float-right">Giá sản phẩm</label>
                    </div>
                    <div class="form-group">
                      <?php for($i = 0; $i < count($product); $i++):?>
                        <input type="text" name="productname[]" class="form-control col-md-9 float-left my-1" readonly="readonly" value="<?php echo $product[$i]?>">
                        <input type="text" name="productprice[]" class="form-control col-md-3 float-right my-1" readonly="readonly" value="<?php echo $price[$i]?>">
                      <?php endfor;?>
                      </div>
                      <label for="donationinput3" class="pl-2 h5">Số lượng sản phẩm</label>
                    <div class="form-group">
                      <?php for($i = 0; $i < count($product); $i++):?>
                        <input type="text" name="quantity[]" id="donationinput3" class="form-control my-1" placeholder="Số lượng của sản phẩm <?php echo $product[$i]?>">
                      <?php endfor;?>
                      </div>
                  </div>
                  <div class="form-actions center">
                    <button type="submit" name="update" class="btn btn-info">Xác nhận</button>
                    <a href="index.php?controller=cart&action=index&page=1">
                    <button type="button" class="btn btn-danger">Hủy</button>
                    </a>
                  </div>
                  <p class="danger text-center text-muted"><?php if(isset($data['error'])) echo $data['error']?></p>
                </form>
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