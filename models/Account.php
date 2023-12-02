<?php
    require_once "./models/BaseModel.php";

    class Account extends BaseModel {
        CONST TABLE = 'taikhoan';
        CONST TABLE_ID = 'TenTaiKhoan';
        public function getAllAccount() {
            return $this->getAll(self::TABLE);
        }
        public function getAccountByID($id) {
            return $this->getByID(self::TABLE, self::TABLE_ID,$id);
        }
        public function insertAccount($data){
            return $this->insert(self::TABLE, $data);
        }
        public function deleteAccount($id) {
            return $this->delete(self::TABLE, self::TABLE_ID, $id);
        }
        public function getAccountRecord() {
            return $this->getTotalRecord(self::TABLE_ID,self::TABLE);
        }
        public function updateAccount($id, $data){
            return $this->update(self::TABLE,self::TABLE_ID,$id,$data);
        }
        public function getTotalAccountPage($limit) {
            return $this->getTotalPage($limit,self::TABLE_ID, self::TABLE);
        }
        public function accountPagination($limit) {
            return $this->getPagination($limit,self::TABLE);
        }

        
    }

?>