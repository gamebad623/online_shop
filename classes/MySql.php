<?php
class MySql{
    protected $conn;
    private $host = "localhost";
    private $username = "root";
    private $pass = "";
    private $database = "shop";

    public function __construct(){
        $this->conn = mysqli_connect($this->host , $this->username , $this->pass ,$this->database);
    }
}
?>