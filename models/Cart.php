<?php
class Cart extends BaseModel {
    CONST TABLE = 'gio_hang';
    CONST TABLE_ID = 'ID';
    public function getAllCart() {
        return $this->getAll(self::TABLE);
    }
    public function getCartByID($id) {
        return $this->getByID(self::TABLE, self::TABLE_ID,$id);
    }
    public function insertCart($data){
        return $this->insert(self::TABLE, $data);
    }
    public function deleteCart($id) {
        return $this->delete(self::TABLE, self::TABLE_ID, $id);
    }
    public function resetCartID(){
        return $this->resetIncrement(self::TABLE,self::TABLE_ID);
    }
    public function getCartRecord() {
        return $this->getTotalRecord(self::TABLE_ID,self::TABLE);
    }
    public function updateCart($id, $data){
        return $this->update(self::TABLE,self::TABLE_ID,$id,$data);
    }
    public function getTotalCartPage($limit) {
        return $this->getTotalPage($limit,self::TABLE_ID, self::TABLE);
    }
    public function cartPagination($limit) {
        return $this->getPagination($limit,self::TABLE);
    }
}