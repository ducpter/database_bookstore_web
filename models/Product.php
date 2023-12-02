<?php
    // Import BaseModel để kế thừa các phương thức cơ bản
    require_once "./models/BaseModel.php";

    // Định nghĩa lớp Product kế thừa từ BaseModel
    class Product extends BaseModel {
        // Các hằng số định danh cho tên bảng và trường ID trong bảng sản phẩm
        CONST TABLE = 'sanpham';
        CONST TABLE_ID = 'Ma_SanPham';

        // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        public function getAllProduct() {
            return $this->getAll(self::TABLE);
        }

        // Lấy thông tin sản phẩm theo ID
        public function getProductByID($id) {
            return $this->getByID(self::TABLE, self::TABLE_ID, $id);
        }

        // Thêm mới một sản phẩm vào cơ sở dữ liệu
        public function insertProduct($data){
            return $this->insert(self::TABLE, $data);
        }

        // Xóa một sản phẩm khỏi cơ sở dữ liệu theo ID
        public function deleteProduct($id) {
            return $this->delete(self::TABLE, self::TABLE_ID, $id);
        }

        // Cập nhật thông tin một sản phẩm theo ID
        public function updateProduct($id, $data){
            return $this->update(self::TABLE, self::TABLE_ID, $id, $data);
        }

        // Đặt lại giá trị tự tăng cho trường ID của bảng sản phẩm
        public function resetProductID() {
            return $this->resetIncrement(self::TABLE, self::TABLE_ID);
        }

        // Lấy số lượng bản ghi của bảng sản phẩm
        public function getProductRecord() {
            return $this->getTotalRecord(self::TABLE_ID, self::TABLE);
        }

        // Lấy tổng số trang cho việc phân trang sản phẩm
        public function getTotalProductPage($limit) {
            return $this->getTotalPage($limit, self::TABLE_ID, self::TABLE);
        }

        // Lấy danh sách sản phẩm được phân trang
        public function productPagination($limit) {
            return $this->getPagination($limit, self::TABLE);
        }
    }
?>
