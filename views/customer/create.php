<?php
     require_once "./views/masterLayout/MasterLayout.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm mới khách hàng</title>
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
  
<?php ?>
<div class="app-content content content-wrap">
    <div class="content-body">
        <div class="main-menu-content">
            <div class="col-xl-6 col-md-12 mx-auto">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="card-title text-center text-muted danger">Thêm mới khách hàng</h3>
                            <h6 class="card-subtitle text-muted text-center">Nhập thông tin khách hàng bên dưới</h6>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post" >
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="basicSelect" class="pl-2 h5">Tên tài khoản</label>
                                        <select class="form-control" id="basicSelect" name="username">
                                            <?php if(empty($data['accounts'])):?>
                                                <option >Không có tài khoản nào</option>
                                            <?php else:?>
                                                <?php foreach($data['accounts'] AS $key => $value) :?>
                                                    <option value="<?php echo $value['TenTaiKhoan']?>"><?php echo $value['TenTaiKhoan'];?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput1" class="sr-only">Tên khách hàng</label>
                                        <input type="text" name="customername" id="donationinput1" class="form-control" placeholder="Tên khách hàng" >
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput2" class="sr-only">Số điện thoại</label>
                                        <input type="number" name="phonenumber" id="donationinput2" class="form-control" placeholder="Số điện thoại" >
                                    </div>
                                    <fieldset class="form-group">
                                        <small class="text-muted">VD.<i>someone@example.com</i></small>
                                        <input type="text" name="email"class="form-control" placeholder="Địa chỉ Email" id="helpInputTop">
                                    </fieldset>
                    
                                    <div class="form-group">
                                        <label for="donationinput3" class="sr-only">Địa chỉ</label>
                                        <input type="text" name="address" id="donationinput3" class="form-control" placeholder="Địa chỉ" >
                                    </div>
                                </div>
                                <div class="form-actions center">
                                    <button type="submit" name="submit" class="btn btn-info">Thêm mới</button>
                                    <a href="index.php?controller=customer&action=index&page=1">
                                    <button type="button" class="btn btn-danger">Hủy</button>
                                    </a>
                                </div>
                                <p class="text-center danger text-muted"><?php if(isset($data['error'])) echo $data['error']?></p>
                            </form>
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