<?php
    ob_start(); 
    class AccountController extends BaseController {
        protected $AccountModel;
        public function __CONSTRUCT() {
            $this->loadModel('Account');
            $this->AccountModel = new Account();
        }
        public function index(){
            $limit = 2;
            $prePage = $this->AccountModel->getPrevPage();
            $currentPage = $this->AccountModel->getCurrentPage();
            $pages = $this->AccountModel->getTotalAccountPage($limit);
            $nextPage = $this->AccountModel->getNextPage($pages);
            $accounts = $this->AccountModel->accountPagination($limit);

            $this->loadView('account/index.php',[
                'limit' => $limit ,
                'prePage' => $prePage ,
                'currentPage' => $currentPage,
                'pages' => $pages ,
                'nextPage' => $nextPage ,
                'accounts' => $accounts 
            ]);
        }
       
        public function insert(){
            $accounts = $this->AccountModel->getAllAccount();
            $check = [];
            foreach ($accounts as $value) {
                array_push($check, $value['TenTaiKhoan']);
            }
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $confirm = $_POST['confirmpassword'];
                if(empty($username) || empty($password)) {
                    $this->error = "Cần điền đầy đủ thông tin các trường";
                }
                else {
                   
                    if(in_array($username, $check)) {
                        $this->error = "Tên tài khoản ".$username." đã tồn tại";
                    }
                    else {
                        $data = [
                            'TenTaiKhoan' => $username,
                            'MatKhau' => $password
                        ];
                        if($password == $confirm) {
                            $isInsert = $this->AccountModel->insertAccount($data);
                            if($isInsert) {
                                $_SESSION['success'] = "<h4 class='text-muted success'>Thêm tài khoản thành công</h4>";
                            }
                            header("Location: index.php?controller=account&action=index&page=1");
                            exit();
                        }
                        else {
                            $this->error = "Mật khẩu xác nhận không khớp với mật khẩu";
                        }
                    }
                    
                }
            }
            $this->loadView('account/create.php',[
                'error' => $this->error
            ]);
        }
        public function delete(){
            $this->loadModel('Customer');
            $this->Customer = new Customer();
            $customers = $this->Customer->getAllCustomer();
            $check = [];
            foreach ($customers as $key => $value) {
                array_push($check,$value['TenTaiKhoan']);
            }
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                if(in_array($id,$check)){
                    $_SESSION['error'] = "<h4 class='text-muted danger'>Tài khoản này hiện đang có khách hàng sử dụng</h4>";
                }
                else{
                    $isDelete = $this->AccountModel->deleteAccount($id);
                    if($isDelete){
                        $_SESSION['success'] = "<h4 class='text-muted success'>Xóa tài khoản $id thành công</h4>";
                    }
                }
                header("Location: index.php?controller=account&action=index&page=1");
                exit();
            }
        }
        public function update(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $account = $this->AccountModel->getAccountByID($id);
                if(isset($_POST['update'])) {
                    $oldpass = $_POST['oldpassword'];
                    $newpass = $_POST['newpassword'];
                    $confirm = $_POST['confirmnew'];
                   $data = [
                       'MatKhau' => $confirm
                   ];
                   if(empty($oldpass) || empty($newpass)){
                       $this->error = "Thông tin phải được điền đầy đủ";
                   }
                   else if($oldpass != $account['MatKhau']){
                       $this->error = "Mật khẩu cũ không đúng";
                   }
                   else if($newpass != $confirm) {
                        $this->error = "Xác nhận mật khẩu không đúng";
                   }
                   else {
                        $isUpdate = $this->AccountModel->updateAccount($id, $data);
                        if($isUpdate) {
                            $_SESSION['success'] = "<h4 class='text-muted success'>Cập nhật tài khoản ".$account['TenTaiKhoan']." thành công</h4>";
                        }
                        header("Location: index.php?controller=account&action=index&page=1");
                        exit();
                   }
               }
               $this->loadView('account/update.php',[
                'account' => $account,
                'error' => $this->error
               ]);
            }
        }

    }

?>