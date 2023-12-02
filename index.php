<?php
    // Bắt đầu phiên làm việc session
    session_start();

    // Include BaseController và BaseModel
    require_once "./controllers/BaseController.php";
    require_once "./models/BaseModel.php";

    // Lấy giá trị controller và action từ tham số truyền vào hoặc mặc định là 'dashboard' và 'index'
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'dashboard';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    // Hiển thị giá trị controller và action (dùng để debug, có thể loại bỏ khi đã hoạt động đúng)
    var_dump($controller);
    var_dump($action);

    // Chuẩn hóa tên controller (viết hoa chữ cái đầu và thêm 'Controller' vào cuối)
    $controller = ucfirst($controller);
    $controller .= "Controller";

    // Đường dẫn đến file của controller
    $path_controller = "controllers/" . $controller . ".php";

    // Kiểm tra xem file controller có tồn tại không, nếu không tồn tại thì hiển thị thông báo lỗi
    if (!file_exists($path_controller)) {
        die("Trang bạn tìm không tồn tại");
    }

    // Include file của controller
    require_once "$path_controller";

    // Tạo đối tượng controller
    $object = new $controller();

    // Kiểm tra xem phương thức (action) có tồn tại trong controller không, nếu không tồn tại thì hiển thị thông báo lỗi
    if (!method_exists($object, $action)) {
        die("Không tồn tại phương thức $action trong controller $controller");
    }

    // Gọi phương thức (action) tương ứng trong controller
    $object->$action();
?>
