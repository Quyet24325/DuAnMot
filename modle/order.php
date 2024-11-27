<?php 
require_once '../connect/connect.php';
class order extends connect {
    public function getAllOrder(){
        $sql = "select 
                orders.
                from orders";
    }
}

?>