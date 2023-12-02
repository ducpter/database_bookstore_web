<?php 
    class DashboardController extends BaseController{
        protected $Account;
        protected $Customer;
        protected $Order;
        protected $Product;
        public function __CONSTRUCT() {
            $this->loadModel('Product');
            $this->loadModel('Customer');
            $this->loadModel('Order');
            $this->loadModel('Account');
            $this->loadModel('Category');
            $this->loadModel('Cart');

            $this->ProductModel = new Product();
            $this->CustomerModel = new Customer();
            $this->OrderModel = new Order();
            $this->AccountModel = new Account();
            $this->CategoryModel = new Category();
            $this->CartModel = new Cart();
        }
        public function index(){
            $products = $this->ProductModel->getProductRecord();
            $orders = $this->OrderModel->getOrderRecord();
            $customers = $this->CustomerModel->getCustomerRecord();
            $accounts = $this->AccountModel->getAccountRecord();
            $categories = $this->CategoryModel->getCategoryRecord();
            $carts = $this->CartModel->getCartRecord();

            $this->loadView('dashboard/index.php', [
                'products' => $products,
                'orders' => $orders,
                'customers' =>$customers,
                'accounts' =>$accounts,
                'categories' => $categories,
                'carts' => $carts
            ]);
        }
    }
?>