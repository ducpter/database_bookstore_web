<?php
ob_start();
class CategoryController extends BaseController
{
    protected $CategoryModel;
    public function __CONSTRUCT() {
        $this->loadModel('Category');

        $this->CategoryModel = new Category();
        
    }
    public function index(){
        $limit = 3;
        $prePage = $this->CategoryModel->getPrevPage();
        $currentPage = $this->CategoryModel->getCurrentPage();
        $pages = $this->CategoryModel->getTotalCategoryPage($limit);
        $nextPage = $this->CategoryModel->getNextPage($pages);
        $categories = $this->CategoryModel->categoryPagination($limit);
        
        $this->loadView('category/index.php',[
            'limit' => $limit,
            'prePage' => $prePage,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'nextPage' => $nextPage,
            'categories' => $categories,
        ]);
    }
    public function insert(){
        
        if(isset($_POST['submit'])) {
            $name = $_POST['categoryname'];
            $desc = $_POST['desc'];
            if(empty($name)) {
                $this->error = "Không được để trống các trường";
            }
            else{
                $data = [
                    'TenDanhMuc' => $name,
                    'MoTa' => $desc
                    
                ];
                $isInsert = $this->CategoryModel->insertCategory($data);
                if($isInsert){
                    $this->CategoryModel->resetCategoryID();
                    $_SESSION['success'] = "<h4 class='text-muted success'>Thêm mới một danh mục thành công</h4>";
                }
                else{
                    $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình thêm mới xảy ra lỗi, thêm mới thất bại</h4>";
                }
                header("Location: index.php?controller=category&action=index&page=1");
                exit();
            }
        }
        $this->loadView('category/create.php',[
            'error' => $this->error
        ]);

    }
    public function delete(){
        $this->loadModel('Product');
        $this->Product = new Product();
        $products = $this->Product->getAllProduct();
        $check = [];
        foreach($products AS $key => $value) {
            array_push($check,$value['MaKhachHang']);
        }
        if(isset($_GET['id'])) {
           $id = $_GET['id'];
           if(in_array($id,$check)){
               $_SESSION['error'] = "<h4 class='text-muted danger'>Danh mục đang có sản phẩm trong kho trong kho</h4>";
           }
           else{
                $isDelete = $this->CategoryModel->deleteCategory($id);
                $this->CategoryModel->resetCategoryID();
                if($isDelete) {
                    $_SESSION['success'] = "<h4 class='text-muted success'>Đã xóa danh mục có mã là $id</h4>";
                }
           }
           header("Location: index.php?controller=category&action=index&page=1");
           exit();
        }
    }
    public function update(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = $this->CategoryModel->getCategoryByID($id);
            
            if(isset($_POST['update'])) {
                $name = $_POST['categoryname'];
                $desc = $_POST['desc'];
                if(empty($name)){
                    $this->error = "Phải điền tên danh mục";
                }
                else{
                    $data = [
                        'TenDanhMuc' => $name,
                        'MoTa' => $desc
                        
                    ];
                    $isUpdate = $this->CategoryModel->updateCategory($id, $data);
                    if($isUpdate) {
                        $_SESSION['success'] = "<h4 class='text-muted success'>Đã cập nhật danh mục có mã là $id</h4>";
                    }
                    else {
                        $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình cập nhật ra lỗi, sửa thất bại</h4>";
                    }
                    header("Location: index.php?controller=category&action=index&page=1");
                    exit();
                }
               
           }
            $this->loadView('category/update.php',[
                'category' => $category,
                'error' => $this->error
            ]);
        }
        
    }
}

