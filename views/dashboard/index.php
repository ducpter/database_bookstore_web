<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" type="text/css" href="./public/fontawesome-5.13.1/css/all.min.css">
  </head>
<body>
  <?php include "./views/masterLayout/MasterLayout.php";?>
  <div class="app-content content content-wrap">
    <div class="content-body">
      <div class="main-menu-content">
        <div class="row my-5">
          <div class="col-xl-4 col-lg-6 col-md-12" style="position:relative;">
                  <div class="card pull-up ecom-card-1 bg-white">
                      <div class="card-content ecom-card2 height-180">
                          <h5 class="text-muted danger position-absolute p-1 display-4"><?php echo $data['customers'];?></h5>
                          <div>
                              <i class="la la-user danger font-large-4 float-right p-1"></i>
                          </div>
                          
                          <h4 class="text-muted danger position-absolute pl-1" style="top:90px;">Khách hàng</h4>
                          
                          <div class="text-muted position-absolute" style="bottom:5px;left:35%;">
                          <span class="">
                            <a href="index.php?controller=customer&action=index&page=1" class="card-link">Xem chi tiết
                              <i class="la la-angle-right" style="font-size:1rem;"></i>
                            </a>
                          </span>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white">
                    <div class="card-content ecom-card2 height-180">
                        <h5 class="text-muted info position-absolute p-1 display-4"><?php echo $data['products']?></h5>
                        <div>
                            <i class="la la-cube info font-large-4 float-right p-1"></i>
                        </div>
                        <h4 class="text-muted info position-absolute pl-1" style="top:90px;">Sản phẩm</h4>
                          
                          <div class="text-muted position-absolute" style="bottom:5px;left:35%;">
                          <span class="">
                            <a href="index.php?controller=product&action=index&page=1" class="card-link">Xem chi tiết
                              <i class="la la-angle-right" style="font-size:1rem;"></i>
                            </a>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
                  <!-- ./col -->
              <div class="col-xl-4 col-lg-12">
                <div class="card pull-up ecom-card-1 bg-white">
                    <div class="card-content ecom-card2 height-180">
                        <h5 class="text-muted warning position-absolute p-1 display-4"><?php echo $data['orders'];?></h5>
                        <div>
                            <i class="la la-list-alt warning font-large-4 float-right p-1"></i>
                        </div>
                        <h4 class="text-muted warning position-absolute pl-1" style="top:90px;">Hóa đơn bán hàng</h4>
                          
                          <div class="text-muted position-absolute" style="bottom:5px;left:35%;">
                          <span class="">
                            <a href="index.php?controller=order&action=index&page=1" class="card-link">Xem chi tiết
                              <i class="la la-angle-right" style="font-size:1rem;"></i>
                            </a>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
                  <!-- ./col -->
              <div class="col-xl-4 col-lg-12">
                <div class="card pull-up ecom-card-1 bg-white">
                    <div class="card-content ecom-card2 height-180">
                        <h5 class="text-muted success position-absolute p-1 display-4"><?php echo $data['accounts'];?></h5>
                        <div>
                            <i class="la la-key success font-large-4 float-right p-1"></i>
                        </div>
                        <h4 class="text-muted success position-absolute pl-1" style="top:90px;">Tài khoản</h4>
                          
                          <div class="text-muted position-absolute" style="bottom:5px;left:35%;">
                          <span class="">
                            <a href="index.php?controller=account&action=index&page=1" class="card-link">Xem chi tiết
                              <i class="la la-angle-right" style="font-size:1rem;"></i>
                            </a>
                          </span>
                        </div>
                    </div>
                </div>
              </div>
                  <!-- ./col -->
                  <div class="col-xl-4 col-lg-12">
              <div class="card pull-up ecom-card-1 bg-white">
                    <div class="card-content ecom-card2 height-180">
                        <h5 class="text-muted primary position-absolute p-1 display-4"><?php echo $data['categories'];?></h5>
                        <div>
                            <i class="fa fa-list-alt primary font-large-4 float-right p-1"></i>
                        </div>
                        <h4 class="text-muted primary position-absolute pl-1" style="top:90px;">Danh mục sản phẩm</h4>
                          
                          <div class="text-muted position-absolute" style="bottom:5px;left:35%;">
                          <span class="">
                            <a href="index.php?controller=category&action=index&page=1" class="card-link">Xem chi tiết
                              <i class="la la-angle-right" style="font-size:1rem;"></i>
                            </a>
                          </span>
                        </div>
                    </div>
                </div>
              </div>
                  <!-- ./col -->
              <div class="col-xl-4 col-lg-12">
                <div class="card pull-up ecom-card-1 bg-white">
                    <div class="card-content ecom-card2 height-180">
                        <h5 class="text-muted light position-absolute p-1 display-4"><?php echo $data['carts'];?></h5>
                        <div>
                            <i class="la la-shopping-cart light font-large-3 float-right p-1"></i>
                        </div>
                        <h4 class="text-muted light position-absolute pl-1" style="top:90px;">Giỏ hàng</h4>
                          
                          <div class="text-muted position-absolute" style="bottom:5px;left:35%;">
                          <span class="">
                            <a href="index.php?controller=cart&action=index&page=1" class="card-link">Xem chi tiết
                              <i class="la la-angle-right" style="font-size:1rem;"></i>
                            </a>
                          </span>
                        </div>
                    </div>
                </div>
              </div>
                  <!-- ./col -->
        </div>
      </div>
    </div>
  </div>
<?php require_once "./views/masterLayout/footer.php"?>
</body>
</html>
