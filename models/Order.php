<?php
    require_once "./models/BaseModel.php";

    class Order extends BaseModel {
        CONST TABLE = 'hoadon_dathang';
        CONST TABLE_ID = 'Ma_HoaDon';
        public function getAllOrder() {
            return $this->getAll(self::TABLE);
        }
        public function getOrderByID($id) {
            return $this->getByID(self::TABLE, self::TABLE_ID,$id);
        }
        public function insertOrder($data){
            return $this->insert(self::TABLE, $data);
        }
        public function deleteOrder($id) {
            return $this->delete(self::TABLE, self::TABLE_ID, $id);
        }
        public function updateOrder($id, $data){
            return $this->update(self::TABLE,self::TABLE_ID,$id,$data);
        }
       
        public function resetOrderID() {
            return $this->resetIncrement(self::TABLE, self::TABLE_ID);
        }
        public function getOrderRecord() {
            return $this->getTotalRecord(self::TABLE_ID,self::TABLE);
        }
        public function getTotalOrderPage($limit) {
            return $this->getTotalPage($limit,self::TABLE_ID, self::TABLE);
        }
        public function orderPagination($limit) {
            return $this->getPagination($limit,self::TABLE);
        }
        public function orderSearch($condition) {
            return $this->search(self::TABLE,$condition);
        }
    }

?>