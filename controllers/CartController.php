<?php
ob_start();
class CartController extends BaseController
{
    protected $CartModel;
    public function __CONSTRUCT() {
        $this->loadModel('Cart');

        $this->CartModel = new Cart();
        
    }
    public function index(){
        $limit = 3;
        $prePage = $this->CartModel->getPrevPage();
        $currentPage = $this->CartModel->getCurrentPage();
        $pages = $this->CartModel->getTotalCartPage($limit);
        $nextPage = $this->CartModel->getNextPage($pages);
        $carts = $this->CartModel->cartPagination($limit);
        
        $this->loadView('cart/index.php',[
            'limit' => $limit,
            'prePage' => $prePage,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'nextPage' => $nextPage,
            'carts' => $carts,
        ]);
    }
    public function create(){
        $this->loadModel('Product');
        $this->Product = new Product();
        $products = $this->Product->getAllProduct();

        $this->loadModel('Customer');
        $this->Customer = new Customer();
        $customers = $this->Customer->getAllCustomer();

        $data = [];
        if(isset($_POST['submit'])) {
            $customerid = $_POST['customer'];
            $productid = implode("\n", array_values($_POST['productname']));
            $quantity = implode("\n", array_values($_POST['quantity']));
            $productprice = implode("\n", array_values($_POST['productprice']));
            $data = [
                'Ma_KH' => $customerid,
                'Ma_SP' => $productid,
                'SoLuong' => $quantity,
                'GiaTien' => $productprice.'.000đ'
            ];
            $isInsert = $this->CartModel->insertCart($data);
            if($isInsert) {
                $_SESSION['success'] = "<h4 class='text-muted success'>Thêm mới hóa đơn thành công</h4>";
            }
            else {
                $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình thêm mới xảy ra lỗi, thêm mới thất bại</h4>";
            }
            header("Location: index.php?controller=cart&action=index&page=1");
            exit();
            
        }
        $this->loadView('cart/create.php',[
            'products' => $products,
            'customers' => $customers,
            //'data' => $data,
            'error' => $this->error
        ]);

    }
    public function delete(){
        if(isset($_GET['id'])) {
           $id = $_GET['id'];
           
            $isDelete = $this->CartModel->deleteCart($id);
            if($isDelete) {
                $_SESSION['success'] = "<h4 class='text-muted success'>Đã xóa giỏ hàng có mã là $id</h4>";
            }
           header("Location: index.php?controller=cart&action=index&page=1");
           exit();
        }
    }
    public function update(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $cart = $this->CartModel->getCartByID($id);
            
            if(isset($_POST['update'])) {
                $customername = $_POST['customer'];
                $productname = implode("\n", $_POST['productname']);
                $price = implode("\n",$_POST['productprice']);
                $quantity = implode("\n",$_POST['quantity']);
                
                if(empty($customername) || empty($productname) || empty($quantity) || empty($price)){
                    $this->error = "Phải điền tên đầy đủ các trường";
                }
                else{
                    $data = [
                        'Ma_KH' => $customername,
                        'Ma_SP' => $productname,
                        'SoLuong' => $quantity,
                        'GiaTien' => $price
                        
                    ];
                    $isUpdate = $this->CartModel->updateCart($id, $data);
                    if($isUpdate) {
                        $_SESSION['success'] = "<h4 class='text-muted success'>Đã cập nhật giỏ hàng có mã là $id</h4>";
                    }
                    else {
                        $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình cập nhật ra lỗi, sửa thất bại</h4>";
                    }
                    header("Location: index.php?controller=cart&action=index&page=1");
                    exit();
                }
               
           }
            $this->loadView('cart/update.php',[
                'cart' => $cart,
                'error' => $this->error
            ]);
        }
        
    }
}

