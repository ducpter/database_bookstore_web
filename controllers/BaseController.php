<?php

class BaseController {
    protected $viewFolder = 'views';  // Thư mục chứa các file view
    protected $modelFolder = 'models';  // Thư mục chứa các file model
    public $error;  // Biến để lưu trữ thông báo lỗi

    /**
     * Load một file view
     * 
     * @param string $path Đường dẫn tương đối đến file view
     * @param array $data Mảng dữ liệu để truyền vào view
     */
    public function loadView($path, $data = []) {
        // Xây dựng đường dẫn đầy đủ đến file view
        $path = $this->viewFolder . '/' . $path;

        // Include (tải) file view, truyền dữ liệu vào
        require_once $path;
    }

    /**
     * Load một file model
     * 
     * @param string $path Đường dẫn tương đối đến file model
     */
    public function loadModel($path) {
        // Xây dựng đường dẫn đầy đủ đến file model
        $modelPath = $this->modelFolder . '/' . ucfirst($path) . '.php';

        // Include (tải) file model
        require_once $modelPath;
    }
}

?>
