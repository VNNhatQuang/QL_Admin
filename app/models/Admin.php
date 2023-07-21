<?php

include_once "Database.php";

class Admin {

    protected $connection;

    public function __construct() {
        $db = new Database;
        $db->Connect();
        $this->connection = $db->connection;
        $db->connection = null;
    }



    
    
    /**
     * Lấy tất cả Admin
     *
     * @param int|string $search Tìm kiếm theo Tên đăng nhập
     * @return stdClass[]
     */
    public function getAll($search="") {
        $search = "%$search%";
        $statement = $this->connection->prepare("SELECT * FROM dangnhap where tendn LIKE ?");
        $statement->bindParam(1, $search);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Thêm mới Admin
     *
     * @param mixed $array Mảng liên kết chứa các thông tin của admin cần được thêm
     * @return boolean
     */
    public function store(mixed $array) {
        $statement = $this->connection->prepare("INSERT INTO dangnhap VALUE(?,?,?)");
        $statement->bindParam(1, $array['tendn']);
        $statement->bindParam(2, $array['password']);
        $statement->bindParam(3, $array['quyen']);
        $result = $statement->execute();
        return $result;
    }

    /**
     * Cập nhật thông tin Admin
     *
     * @param mixed $array Mảng liên kết chứa các thông tin admin cần cập nhật
     * @return boolean
     */
    public function update(mixed $array) {
        $statement = $this->connection->prepare("UPDATE dangnhap SET password=?, quyen=? WHERE tendn=?");
        $statement->bindParam(1, $array['password']);
        $statement->bindParam(2, $array['quyen']);
        $statement->bindParam(3, $array['tendn']);
        $result = $statement->execute();
        return $result;
    }

    /**
     * Xóa Admin
     *
     * @param int|string $key ID của admin cần xóa
     * @return boolean
     */
    public function destroy($key) {
        $statement = $this->connection->prepare("DELETE FROM dangnhap WHERE tendn=?");
        $statement->bindParam(1, $key);
        $result = $statement->execute();
        return $result;
    }


    /**
     * Check Unique Khóa chính là Tên đăng nhập
     *
     * @param string $key
     * @return boolean
     */
    public function IdExits($key) {
        $statement = $this->connection->prepare("SELECT tendn FROM dangnhap WHERE tendn=?");
        $statement->bindParam(1, $key);
        $statement->execute();
        if($statement->fetchAll())
            return true;
        return false;
    }


    /**
     * Lấy thông tin Admin dựa trên Tên tìa khoản
     *
     * @param string $key
     * @return object
     */
    public function getAdminById($key) {
        $statement = $this->connection->prepare("SELECT * FROM dangnhap WHERE tendn=?");
        $statement->bindParam(1, $key);
        $statement->execute();
        $result = $statement->fetchObject();
        return $result;
    }




    public function __destruct() {
        $this->connection = null;
    }


}