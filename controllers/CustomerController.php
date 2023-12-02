<?php
ob_start();
class CustomerController extends BaseController
{
    protected $CustomerModel;
    public function __CONSTRUCT() {
        $this->loadModel('Customer');

        $this->CustomerModel = new Customer();
        
    }
    public function index(){
        $limit = 3;
        $prePage = $this->CustomerModel->getPrevPage();
        $currentPage = $this->CustomerModel->getCurrentPage();
        $pages = $this->CustomerModel->getTotalCustomerPage($limit);
        $nextPage = $this->CustomerModel->getNextPage($pages);
        $customers = $this->CustomerModel->customerPagination($limit);
        
        $this->loadView('customer/index.php',[
            'limit' => $limit,
            'prePage' => $prePage,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'nextPage' => $nextPage,
            'customers' => $customers,
        ]);
    }
    public function insert(){
        $this->loadModel('Account');
        $this->AccountModel = new Account();
        $accounts = $this->AccountModel->getAllAccount();
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $name = $_POST['customername'];
            $email = $_POST['email'];
            $phone = $_POST['phonenumber'];
            $address = $_POST['address'];
            if(empty($name) || empty($email) || empty($phone) || empty($address)) {
                $this->error = "Không được để trống các trường";
            }
            else{
                $data = [
                    'TenTaiKhoan' => $username,
                    'HoTen' => $name,
                    'Email' => $email,
                    'SoDienThoai' => $phone,
                    'DiaChi' => $address
                ];
                $isInsert = $this->CustomerModel->insertCustomer($data);
                if($isInsert){
                    $this->CustomerModel->resetCustomerID();
                    $_SESSION['success'] = "<h4 class='text-muted success'>Thêm mới một khách hàng thành công</h4>";
                }
                else{
                    $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình thêm mới xảy ra lỗi, thêm mới thất bại</h4>";
                }
                header("Location: index.php?controller=customer&action=index&page=1");
                exit();
            }
        }
        $this->loadView('customer/create.php',[
            'accounts' => $accounts,
            'error' => $this->error
        ]);

    }
    public function delete(){
        $this->loadModel('Order');
        $this->Order = new Order();
        $orders = $this->Order->getAllOrder();
        $check = [];
        foreach($orders AS $key => $value) {
            array_push($check,$value['MaKhachHang']);
        }
        if(isset($_GET['id'])) {
           $id = $_GET['id'];
           if(in_array($id,$check)){
               $_SESSION['error'] = "<h4 class='text-muted danger'>Khách hàng $id đang có hóa đơn trong kho</h4>";
           }
           else{
                $isDelete = $this->CustomerModel->deleteCustomer($id);
                $this->CustomerModel->resetCustomerID();
                if($isDelete) {
                    $_SESSION['success'] = "<h4 class='text-muted success'>Đã xóa khách hàng có mã là $id</h4>";
                }
           }
           header("Location: index.php?controller=customer&action=index&page=1");
           exit();
        }
    }
    public function update(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $customer = $this->CustomerModel->getCustomerByID($id);
            
            if(isset($_POST['update'])) {
                $name = $_POST['customername'];
                $email = $_POST['email'];
                $phone = $_POST['phonenumber'];
                $address = $_POST['address'];
                if(empty($name) || empty($email) || empty($phone) || empty($address)){
                    $this->error = "phải điền đầy đủ các trường dữ liệu";
                }
                else{
                    $data = [
                        'HoTen' => $name,
                        'Email' => $email,
                        'SoDienThoai' => $phone,
                        'DiaChi' => $address,
                    ];
                    $isUpdate = $this->CustomerModel->updateCustomer($id, $data);
                    if($isUpdate) {
                        $_SESSION['success'] = "<h4 class='text-muted success'>Đã cập nhật thông tin khách hàng có mã là $id</h4>";
                    }
                    else {
                        $_SESSION['error'] = "<h4 class='text-muted danger'>Quá trình cập nhật ra lỗi, sửa thất bại</h4>";
                    }
                    header("Location: index.php?controller=customer&action=index&page=1");
                    exit();
                }
               
           }
            $this->loadView('customer/update.php',[
                'customer' => $customer,
                'error' => $this->error
            ]);
        }
        
    }
}

