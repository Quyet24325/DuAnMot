<?php 
require_once '../connect/connect.php';
class Category extends connect {
    public function  listCategory(){
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($name,$image,$status,$description){
        $sql = "INSERT INTO `categories` (`name`, `image`, `status`, `description`, `created_at`, `updated_at`) VALUES ('$name', '$image', '$status', '$description')";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name,$image,$status,$description]);
    }
}

?>