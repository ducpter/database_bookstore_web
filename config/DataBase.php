<?php

class DataBase {
    //Cấu hình database 
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'UniBookstore';
    const DB_PORT = 3306;

    public function connection() {
        $this->con = mysqli_connect(self::DB_HOST, self::DB_USERNAME,
                            self::DB_PASSWORD,self::DB_NAME, self::DB_PORT);
        if(!$this->con) {
            die("Không thể kết nối CSDL 
            " . $this->dbname . ". Lỗi: " . mysqli_connect_error());
        }
        // else{
        //     echo "Kết nối thành công";
        // }
        mysqli_query($this->con,"USE UniBookstore");
        return $this->con;
    }
}