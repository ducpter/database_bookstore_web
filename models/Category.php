<?php
class Category extends BaseModel {
    CONST TABLE = 'danhmuc';
    CONST TABLE_ID = 'ID_DanhMuc';
    public function getAllCategory() {
        return $this->getAll(self::TABLE);
    }
    public function getCategoryByID($id) {
        return $this->getByID(self::TABLE, self::TABLE_ID,$id);
    }
    public function insertCategory($data){
        return $this->insert(self::TABLE, $data);
    }
    public function deleteCategory($id) {
        return $this->delete(self::TABLE, self::TABLE_ID, $id);
    }
    public function resetCategoryID(){
        return $this->resetIncrement(self::TABLE,self::TABLE_ID);
    }
    public function getCategoryRecord() {
        return $this->getTotalRecord(self::TABLE_ID,self::TABLE);
    }
    public function updateCategory($id, $data){
        return $this->update(self::TABLE,self::TABLE_ID,$id,$data);
    }
    public function getTotalCategoryPage($limit) {
        return $this->getTotalPage($limit,self::TABLE_ID, self::TABLE);
    }
    public function categoryPagination($limit) {
        return $this->getPagination($limit,self::TABLE);
    }
}