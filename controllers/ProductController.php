<?php 
    ob_start();
    class ProductController extends BaseController {
        protected $ProductModel;
        public function __construct()
        {
            $this->loadModel('Product');
            $this->ProductModel = new Product();
        }
        public function index(){
            $limit = 3;
            $prePage = $this->ProductModel->getPrevPage();
            $currentPage = $this->ProductModel->getCurrentPage();
            $pages = $this->ProductModel->getTotalProductPage($limit);
            $nextPage = $this->ProductModel->getNextPage($pages);
            $products = $this->ProductModel->productPagination($limit);
            $this->loadView('product/index.php',[
                'limit' => $limit,
                'prePage' => $prePage,
                'currentPage' => $currentPage,
                'pages' => $pages,
                'nextPage' => $nextPage,
                'products' => $products
            ]);
        }
        public function create(){
            $this->loadModel('Category');
            $this->Category = new Category();
            $categories = $this->Category->getAllCategory();
            
            
            if(isset($_POST['submit'])) {
                $category = $this->Category->getCategoryByID($_POST['madanhmuc']);
                $productname = $_POST['productname'];
                $price = $_POST['productprice'];
                $quantity = $_POST['quantity'];
                $categoryid = $_POST['madanhmuc'];
                $categoryname = $category['TenDanhMuc'];
                $img = $_FILES['myfile'];
                if(!isset($productname) || !isset($price) || !isset($categoryname) || !isset($img['name'])) {
                    $this->error = "Phải điền đầy đủ thông tin các trường";
                }
                else {
                    
                    $extension = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));
                    $validExtension = ['png', 'jpg', 'jpeg','gif'];
                    if(!in_array($extension, $validExtension)) {
                        $this->error = "Không đúng định dạng ảnh cho phép";
                    }
                    else {
                        $data = [
                            'TenSanPham' => $productname,
                            'Ma_DanhMuc' => $categoryid,
                            'TenDanhMuc' => $categoryname,
                            'SoLuong' => $quantity,
                            'DonGia' => $price,
                            'HinhAnh' => $img['name']
                        ];
                        
                        $isInsert = $this->ProductModel->insertProduct($data);
                        if($isInsert) {
                            $_SESSION['success'] = "<h4 class='text-muted success'>Thêm mới một sản phẩm thành công</h4>";
                        }
                        else {
                            $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình thêm mới xảy ra lỗi, thêm mới thất bại</h4>";
                        }
                       header("Location: index.php?controller=product&action=index&page=1");
                        exit();
                    }
                }
            }
            $this->loadView('product/create.php', [
                'categories' => $categories,
                'error' => $this->error
            ]);
        }
        public function delete(){
            if(isset($_GET['id'])) {
                $id = $_GET['id'];

               $isDelete = $this->ProductModel->deleteProduct($id);
               $this->ProductModel->resetProductID();
               if($isDelete) {
                $_SESSION['success'] = "<h4 class='text-muted success'>Đã xóa sản phẩm có mã là $id</h4>";
               }
               header("Location: index.php?controller=product&action=index&page=1");
               exit();
            }
        }
        public function update(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $product = $this->ProductModel->getProductByID($id);
                
                if(isset($_POST['update'])) {
                   $name = $_POST['productname'];
                   $price = $_POST['productprice'];
                   $category = explode('|',$_POST['category']);
                    $categoryname = $category[1];
                    $categoryid = $category[0];
                   $img = $_FILES['myfile'];
                   $quantity = $_POST['quantity'];
                   if(empty($name) || empty($price) || empty($categoryid) || empty($img['name'])) {
                    $this->error = "Phải điền đầy đủ thông tin các trường";
                }
                else {
                    $extension = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));
                    $validExtension = ['png', 'jpg', 'jpeg','gif'];
                    if(!in_array($extension, $validExtension)) {
                        $this->error = "Không đúng định dạng ảnh cho phép";
                    }
                    else {
                        $data = [
                            'TenSanPham' => $name,
                            'Ma_DanhMuc' => $categoryid,
                            'TenDanhMuc' => $categoryname,
                            'SoLuong' => $quantity,
                            'DonGia' => $price,
                            'HinhAnh' => $img['name']
                        ];
                        $isUpdate = $this->ProductModel->updateProduct($id, $data);
                        if($isUpdate) {
                            $_SESSION['success'] = "<h4 class='text-muted success'>Cập nhật thành công sản phẩm có mã là $id</h4>";
                        }
                        else {
                            $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình cập nhật xảy ra lỗi, sửa thất bại</h4>";
                        }
                        header("Location: index.php?controller=product&action=index&page=1");
                        exit();
                    }
                }
                
               }
               $this->loadView('product/update.php',[
                'product' => $product,
                'error' => $this->error
                ]);
            }
        }
    }
?>