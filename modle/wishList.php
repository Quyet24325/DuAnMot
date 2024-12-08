<?php
require_once '../connect/connect.php';
class wishlist extends connect{
    public function listWishList(){
        $sql= 'select 
        products.*,
        favorites.*
        from favorites
        left join products on favorites.pro_id = products.pro_id
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addWishList(){
        $sql = 'insert into favorites(user_id,pro_id,quantity,created_at) values(?,?,1,now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id']??null, $_GET['pro_id']]);
    }

    public function deleteWishList(){
        $sql = 'delete from favorites where fav_id =?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['fav_id']]);
    }

    public function checkWishlist(){
        $sql = 'select * from favorites where user_id = ? and pro_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt -> execute([$_SESSION['user']['user_id']??null,$_GET['pro_id']]);
        return $stmt->fetch();
    }
}