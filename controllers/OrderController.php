<?php 
    ob_start();
    
    class OrderController extends BaseController {
        protected $OrderModel;
        public function __construct()
        {
            $this->loadModel('Order');
            $this->OrderModel = new Order();
        }
        public function index(){
            $limit = 2;
            $prePage = $this->OrderModel->getPrevPage();
            $currentPage = $this->OrderModel->getCurrentPage();
            $pages = $this->OrderModel->getTotalOrderPage($limit);
            $nextPage = $this->OrderModel->getNextPage($pages);
            $orders = $this->OrderModel->orderPagination($limit);
            $this->loadView('order/index.php',[
                'limit' => $limit,
                'prePage' => $prePage,
                'currentPage' => $currentPage,
                'pages' => $pages,
                'nextPage' => $nextPage,
                'orders' => $orders
            ]);
        }
        public function create(){
            $this->loadModel('Customer');
            $this->CustomerModel = new Customer();
            $customers = $this->CustomerModel->getAllCustomer();
            
            $this->loadModel('Product');
            $this->ProductModel = new Product();
            $products = $this->ProductModel->getAllProduct();
            
            if(isset($_POST['submit'])) {
                $customer = $this->CustomerModel->getCustomerByID($_POST['khachhang']);
                $customerid = $_POST['khachhang'];
                $receiver = $_POST['receiver'];
                $ordername = implode("\n", array_values($_POST['product']));
                $shipaddress = $_POST['shipaddress'];
                
                if(empty($customerid) || empty($receiver) || empty($ordername) || empty($shipaddress)) {
                    $this->error = "Không được để các trường";
                }
                else if(!$customer) {
                    $this->error = "Khách hàng hiện chưa thực hiện đặt hàng";
                }
                else{
                    $data = [
                        'MaKhachHang' => $customerid,
                        'TenNguoiNhan' => $receiver,
                        'TenSanPham' => $ordername,
                        'DiaChiGiaoHang' => $shipaddress
                    ];
                    
                    $isInsert = $this->OrderModel->insertOrder($data);
                   
                    if($isInsert) {
                        $_SESSION['success'] = "<h4 class='text-muted success'>Thêm mới hóa đơn thành công</h4>";
                    }
                    else {
                        $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình thêm mới xảy ra lỗi, thêm mới thất bại</h4>";
                    }
                    header("Location: index.php?controller=order&action=index&page=1");
                    exit();
                }
            }
            $this->loadView('order/create.php',[
                'customers' => $customers,
                'products' => $products,
                'error' => $this->error
            ]);

        }
        public function delete(){
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
               $isDelete = $this->OrderModel->deleteOrder($id);
               if($isDelete) {
                 $_SESSION['success'] = "<h4 class='text-muted success'>Đã xóa hóa đơn có mã là $id</h4>";
               }
               $this->OrderModel->resetOrderID();
               header("Location: index.php?controller=order&action=index&page=1");
               exit();
            }
        }
        public function update(){

            $this->loadModel('Product');
            $this->ProductModel = new Product();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $order = $this->OrderModel->getOrderByID($id);
                $products = $this->ProductModel->getAllProduct();

                if(isset($_POST['update'])) {
                    $customerid = $_POST['customerid'];
                    $customername = $_POST['customername'];
                    $productname = implode("\n",$_POST['product']);
                    $address = $_POST['address'];
                    if(empty($customername) || empty($customerid) || empty($productname) || empty($address)) {
                        $this->error = "Không được để trống các trường thông tin";
                    }
                    else {
                        $data = [
                            'MaKhachHang' => $customerid,
                            'TenNguoiNhan' => $customername,
                            'TenSanPham' => $productname,
                            'DiaChiGiaoHang' => $address
                        ];
                        $isUpdate = $this->OrderModel->updateOrder($id, $data);
                        if($isUpdate) {
                        $_SESSION['success'] = "<h4 class='text-muted success'>Cập nhật thành công hóa đơn có mã là $id</h4>";
                        }
                        else {
                            $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình cập nhật xảy ra lỗi, sửa thất bại</h4>";
                        }
                        header("Location: index.php?controller=order&action=index&page=1");
                        exit();
                    }
                }
                $this->loadView('order/update.php',[
                    'order' => $order,
                    'products' => $products,
                    //'data' => $data,
                    'error' => $this->error
                ]);
            }
        }
        
    }
?>