<?php
    require_once './config/DataBase.php';
    class BaseModel extends DataBase{
        public $connect;

        public function __CONSTRUCT(){
            $this->connect = $this->connection();
        }
        public function getAll($table){
            $query = "SELECT * FROM $table";
            $result = mysqli_query($this->connect, $query);
            $data = [];
            if($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    array_push($data, $row);
                }
                return $data;
            }
        }
        public function getByID($table,$fieldID, $id) {
            $query = "SELECT * FROM $table WHERE $fieldID = '$id'";
            $result = mysqli_query($this->connect, $query);
            if($result){
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
        }
        public function insert($table,$data){

            $key = implode(',', array_keys($data));
            $value = implode("', '", array_values($data));

            $query = "INSERT INTO ${table}(${key}) VALUES ('$value')";
            $result = mysqli_query($this->connect,$query);
            return $result;
        }
        public function delete($table,$field, $id) {
            $query = "DELETE FROM $table WHERE $field = '$id'";
            $result = mysqli_query($this->connect, $query);
            return $result;
        }
        public function resetIncrement($table, $id){
            $reseed = 0;
            $query = "UPDATE $table SET $id = $reseed := $reseed + 1;
            ALTER TABLE $table AUTO_INCREMENT =1;";
            $result = mysqli_query($this->connect, $query);
        }
        public function update($table, $fieldID, $id, $data){
            $dataSet = [];
            foreach($data AS $key => $value){
                array_push($dataSet, "$key = '$value'");
            }
            
            $dataString = implode(', ', $dataSet);
            $query = "UPDATE $table SET $dataString WHERE $fieldID = '$id'";
            $result = mysqli_query($this->connect, $query);
            return $result;
        }

        //Phân trang
        public function getTotalRecord($field, $table) {
            $query = "SELECT '$field' FROM $table";
            $result = mysqli_query($this->connect,$query);
            $count = 0;
            if($result) {
                while($rows = mysqli_fetch_row($result)){
                    $count++;
                }
                return $count;
            }
            
        }
        public function getTotalPage($limit, $id, $table) {
            $record = $this->getTotalRecord($id,$table);
            return ceil($record / $limit);
        }
        public function getPagination($limit, $table) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $begin = ($page -1) * $limit;
            $querySelect = "SELECT * FROM $table LIMIT $begin, $limit";
            $result = mysqli_query($this->connect, $querySelect);
            $data = [];
            if($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    array_push($data, $row);
                }
            }
            return $data;
        }
        public function getCurrentPage(){
            return (int) $_GET['page'];
        }
        public function getPrevPage() {
            $prevPage = $_GET['page'];
            if(isset($_GET['page']) && $_GET['page'] > 1)
            {   
                $prevPage = $_GET['page'] - 1;
            }
            return (int)$prevPage;
        }
        public function getNextPage($totalPage) {
            $nextPage = $_GET['page'];
            if(isset($_GET['page']) && $_GET['page'] < $totalPage) {
                $nextPage = $_GET['page'] + 1;
            }
            return (int)$nextPage;
        }
        public function search($table, $condition) {
            $query = "SELECT * FROM $table WHERE $condition";
            $result = mysqli_query($this->connect, $query);
            $data = [];
            if($result && mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)){
                    array_push($data, $rows);
                }
                return $data;
            }
        }

    }
?>