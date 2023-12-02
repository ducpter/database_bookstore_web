
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa sách</title>
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
  
<?php  include "./views/masterLayout/MasterLayout.php";?>

    <div class="col-xl-6 col-md-12 mx-auto">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<h3 class="card-title text-center text-muted danger">Sửa khách hàng</h3>
						<h6 class="card-subtitle text-muted text-center">Nhập thông tin cần sửa bên dưới</h6>
					</div>
					<div class="card-body">
			<form class="form" method="post" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="card-body">
                        <p class="text-muted">Mã khách hàng</p>
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?php echo $data['customer']['Ma_KH']?>">
                        </fieldset>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Tên tài khoản</p>
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?php echo $data['customer']['TenTaiKhoan']?>">
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <label for="donationinput2" class="pl-2 h5">Họ và tên</label>
                        <input type="text" name="customername" id="donationinput2" class="form-control"  value="<?php echo $data['customer']['HoTen']?>">
                    </div>

                    <div class="form-group">
                        <label for="donationinput2" class="pl-2 h5">Địa chỉ Email</label>
                        <input type="text" name="email" id="donationinput2" class="form-control"  value="<?php echo $data['customer']['Email']?>">
                    </div>
                    <div class="form-group">
                        <label for="donationinput2" class="pl-2 h5">Số điện thoại</label>
                        <input type="text" name="phonenumber" id="donationinput2" class="form-control"  value="<?php echo $data['customer']['SoDienThoai']?>">
                    </div>
                    <div class="form-group">
                        <label for="donationinput2" class="pl-2 h5">Địa chỉ</label>
                        <input type="text" name="address" id="donationinput2" class="form-control" value="<?php echo $data['customer']['DiaChi']?>">
                    </div>
				</div>
                <div class="form-actions center">
                    <button type="submit" name="update" class="btn btn-info">Xác nhận</button>
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
          
    <?php  include "./views/masterLayout/MasterLayout.php";?>
</body>
</html>