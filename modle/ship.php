<?php 
require_once '../connect/connect.php';
class ship extends connect{
    public function getAllShip(){
        $sql = "select * from ships";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>