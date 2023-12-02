<?php
    require_once "./models/BaseModel.php";

    class Customer extends BaseModel {
        CONST TABLE = 'khachhang';
        CONST TABLE_ID = 'Ma_KH';
        public function getAllCustomer() {
            return $this->getAll(self::TABLE);
        }
        public function getCustomerByID($id) {
            return $this->getByID(self::TABLE, self::TABLE_ID,$id);
        }
        public function insertCustomer($data){
            return $this->insert(self::TABLE, $data);
        }
        public function deleteCustomer($id) {
            return $this->delete(self::TABLE, self::TABLE_ID, $id);
        }
        public function resetCustomerID(){
            return $this->resetIncrement(self::TABLE,self::TABLE_ID);
        }
        public function getCustomerRecord() {
            return $this->getTotalRecord(self::TABLE_ID,self::TABLE);
        }
        public function updateCustomer($id, $data){
            return $this->update(self::TABLE,self::TABLE_ID,$id,$data);
        }
        public function getTotalCustomerPage($limit) {
            return $this->getTotalPage($limit,self::TABLE_ID, self::TABLE);
        }
        public function customerPagination($limit) {
            return $this->getPagination($limit,self::TABLE);
        }
    }

?>