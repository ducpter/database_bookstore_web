<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm mới sách</title>
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
  <div class="card-content content content-wrap">
        <div class="card-content">
        <div class="main-menu-content">
            <div class="col-xl-6 col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h3 class="card-title text-center text-muted warning">Thêm mới một hóa đơn</h3>
                                <h6 class="card-subtitle text-muted text-center">Nhập thông tin hóa đơn bên dưới</h6>
                                <span id="error"></span>
                            </div>
                            <div class="card-body">
                                <form class="form" id="insert_form" method="post" enctype="multipart/form-data">
                                    <div class="form-body" id="form-item">
                                        <div class="form-group">
                                            <label for="basicSelect" class="sr-only">Khách hàng</label>
                                            <select class="form-control" id="basicSelect" name="customer">
                                                <?php if(empty($data['customers'])) :?>
                                                    <option>Không có khách hàng</option>
                                                <?php else:?>
                                                    <option>Chọn khách hàng (Mã: Tên khách)</option>
                                                    <?php foreach ($data['customers'] as $key => $value): ?>
                                                        <option value="<?php echo $value['Ma_KH']?>"><?php echo $value['Ma_KH'].': '.$value['HoTen'];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                        <div class="form-group row">

                                        <select id="product" name="productname[]" class="form-control productname col-md-9 my-3" >
                                          <option value="0">Chọn sản phẩm</option>
                                          <?php foreach($data['products'] AS $key => $value) :?>
                                            <option value="<?php echo $value['Ma_SanPham'];?>">
                                                <?php echo $value['TenSanPham'] ?>
                                            </option>
                                          <?php endforeach;?>
                                        </select>
                                            <input type="number" name="quantity[]"  class="form-control quantity col-md-3 my-3" placeholder="Số lượng" >
                                            <input type="number" name="productprice[]"  class="form-control productprice col-md-12" placeholder="Giá sản phẩm" >
                                        </div>
                                        <div class="form-actions center">
                                            <button type="button" name="add" class="btn btn-success btn-sm add"><i class="la la-plus">Thêm</i></button>
                                        </div>
                                        

                                    </div>
                                    <div class="form-actions center">
                                        <button type="submit" name="submit" class="btn btn-info">Thêm mới</button>
                                        <a href="index.php?controller=cart&action=index&page=1">
                                        <button type="button" class="btn btn-danger">Hủy</button>
                                        </a>
                                    </div>
                                    <p class="text-center muted-text danger"><?php if(isset($data['error'])) echo $data['error'];?></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>    
        </div>
        </div>
    </div> 
    <script>
      $(document).ready(function(){
 
      $(document).on('click', '.add', function(){
        var html = '';
        html += '<div class="form-group row">';
        html += "<select id='product' name='productname[]' class='form-control productname col-md-9 my-3'>"+
                        "<option value='0'>Chọn sản phẩm</option>"+
                        "<?php foreach($data['products'] AS $key => $value) :?>"+
                             "<option value='<?php echo $value['Ma_SanPham'];?>''>"+
                                "<?php echo $value['TenSanPham'] ?>"+
                              "</option>"+
                          "<?php endforeach;?>"
                    "</select>";
        html += '<input type="number" name="quantity[]"  class="form-control quantity col-md-3 my-3" placeholder="Số lượng" >';
        html += '<input type="number" name="productprice[]"  class="form-control productprice col-md-12" placeholder="Giá sản phẩm" >';
                             
        html += '<button type="button" name="add" class="btn btn-success btn-sm add col-md-6 my-1"><i class="la la-plus">Thêm sản phẩm</i></button>';
        html += '<button type="button" name="remove" class="btn btn-danger btn-sm remove col-md-6 my-1"><i class="la la-trash">Xóa sản phẩm</i></button>';
        html += '</div>';
        $('#form-item').append(html);
      });
 
      $(document).on('click', '.remove', function(){
        $(this).closest('.form-group').remove();
      });
      
    })
    </script>
</body>
</html>
