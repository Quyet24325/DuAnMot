<?php 
require_once '../modle/order.php';
class OrderAdminController extends order {
    public function listOrder(){


        
        include '../view/admin/order/list.php';
    }
}

?>