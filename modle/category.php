<?php 
require_once '../connect/connect.php';
class Category extends connect {
    public function  listCategory(){
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($name,$images,$status,$description){
        $sql = 'insert into categories (name,image,status,description) value (?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name,$images,$status,$description]);
    }

    public function update($id,$name,$images,$status,$description){
        $sql = 'update categories set name=? , image=?,status=?,description=? where cate_id=?';
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$name,$images,$status,$description,$id]);
    }
    public function delete (){
        $sql = 'delete from categories where cate_id=?';
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }

    public function detail(){
        $sql = 'select * from categories where cate_id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

