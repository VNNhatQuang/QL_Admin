<?php

class Database
{
    private $host = 'localhost';
    private $dbname = 'qlsach';
    private $user = 'root';
    private $password = '';

    public $connection;


    public function Connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            // Trong PHP và PDO, khi một câu truy vấn thất bại trong quá trình thực thi
            // (ví dụ: sai cú pháp SQL, không thể kết nối đến cơ sở dữ liệu, hoặc bất kỳ lỗi nào khác)
            // , PDO sẽ không mặc định ném ra ngoại lệ (exception).
            // Thay vào đó, nó sẽ trả về kết quả sai và cho phép chúng ta tiếp tục thực thi mã mà không biết rằng đã có lỗi xảy ra.
            // Điều này có thể dẫn đến việc thực hiện các tác vụ không mong muốn trên dữ liệu không hợp lệ hoặc gây ra những vấn đề bất ngờ.
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully<br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . '<br>';
        }
    }
}
