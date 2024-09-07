<?php
require_once 'MySql.php';

class Products extends MySql{
    public function getAll(){
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->conn , $sql);
        $products = [];
        if(!empty($result)){
            $products = mysqli_fetch_all($result , MYSQLI_ASSOC);
        }
        return $products;
    }
    public function getOne($id){
        $sql = "SELECT * FROM products where `id` = $id";
        $result = mysqli_query($this->conn , $sql);
        $products = [];
        if(!empty($result)){
            $products = mysqli_fetch_assoc($result);
        }
        return $products;
    }
    public function addProduct($name, $price, $description, $img) {
        
        $name = mysqli_real_escape_string($this->conn, $name);
        $price = mysqli_real_escape_string($this->conn, $price);
        $description = mysqli_real_escape_string($this->conn, $description);
        $img = mysqli_real_escape_string($this->conn, $img);
    
    
        $sql = "INSERT INTO products(`name`, `price`, `description`, `img`) 
                VALUES ('$name', $price, '$description', '$img')";
    
   
        $result = mysqli_query($this->conn, $sql);
    
     
        if ($result) {
            return true;
        } else {
           
            error_log("MySQL error: " . mysqli_error($this->conn));
            return false; 
        }
    }
    

    public function updateProduct($name, $price, $description, $img, $id) {

        $name = mysqli_real_escape_string($this->conn, $name);
        $price = mysqli_real_escape_string($this->conn, $price);
        $description = mysqli_real_escape_string($this->conn, $description);
        $img = mysqli_real_escape_string($this->conn, $img);
        $id = mysqli_real_escape_string($this->conn, $id);
    

        $sql = "UPDATE products 
                SET `name` = '$name', `price` = $price, `description` = '$description', `img` = '$img' 
                WHERE `id` = $id";
    

        $result = mysqli_query($this->conn, $sql);
    
        if ($result) {
            return true; 
        } else {
       
            error_log("MySQL error: " . mysqli_error($this->conn));
            return false; 
        }
    }
    
    public function deleteProduct($id) {
     
        if (!$id || !is_numeric($id)) {
            throw new Exception("Invalid product ID");
        }
    
        $id = mysqli_real_escape_string($this->conn, $id);
    
       
        $sql = "DELETE FROM products WHERE `id` = $id";
    
       
        $result = mysqli_query($this->conn, $sql);
    
        if ($result) {
            return true; 
        } else {
            
            error_log("MySQL error: " . mysqli_error($this->conn));
            return false; 
        }
    }
    
}

?>