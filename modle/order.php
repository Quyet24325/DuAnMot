<?php
require_once '../connect/connect.php';
class order extends connect
{

    public function addOrder($pro_id, $var_id, $detail_id, $quantity)
    {
        $sql = "insert into orders (user_id,pro_id,var_id,detail_id,quantity,created_at,updated_at) value (?,?,?,?,?,now(),now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id'], $pro_id, $var_id, $quantity, $detail_id]);
    }

    public function addOrderGest($pro_id,$user_id, $var_id, $detail_id, $quantity)
    {
        $sql = "insert into orders (pro_id,user_id,var_id,detail_id,quantity,created_at,updated_at) value (?,?,?,?,?,now(),now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$pro_id,$user_id, $var_id, $quantity, $detail_id]);
    }

    public function addOrrderDetailGuest($name,$user_id, $email, $phone, $address, $amount, $note, $ship_id,  $payment)
    {
        $sql = "insert into order_details (name,user_id, email, phone, address, amount, note,  ship_id, payment, created_at, updated_at) values (?,?,?,?,?,?,?,?,?,now(),now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name,$user_id, $email, $phone, $address, $amount, $note,  $ship_id,  $payment]);
    }

    public function addOrrderDetail($name, $email, $phone, $address, $amount, $note, $ship_id, $cou_id, $payment)
    {
        $sql = "insert into order_details (name, email, phone, address, amount, note, user_id, ship_id, cou_id, payment, created_at, updated_at) values (?,?,?,?,?,?,?,?,?,?,now(),now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $address, $amount, $note, $_SESSION['user']['user_id'], $ship_id, $cou_id, $payment]);
    }

    public function getLastInsertId()
    {
        //Lấy id đơn hàng vừa thêm
        return $this->connect()->lastInsertId();
    }

    public function getLastGuestId()
    {
        //Lấy id đơn hàng vừa thêm
        return $this->connect()->lastInsertId();
    }

    public function getAllOrderDetail()
    {
        $sql = "select * from order_details";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOrderDetailById()
    {
        $sql = "select * from order_details where detail_id = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getOrderById()
    {
        $sql = "select 
        orders .*,
        products.name as pro_name,
        products.image as pro_image,
        product_variants.sale_price as sale_price,
        variant_color.name as var_color,
        variant_size.name as var_size
        from orders 

        left join products on products.pro_id = orders.pro_id
        left join product_variants on product_variants.var_id = orders.var_id
        left join variant_color on variant_color.var_color_id  = product_variants.var_color_id 
        left join variant_size on variant_size.var_size_id  = product_variants.var_size_id 
        where orders.detail_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponById()
    {
        $sql = "select 
        coupons.type as type,
        coupons.coupon_value as coupon_value
        from order_details
        left join coupons on coupons.cou_id = order_details.cou_id
        where  order_details.detail_id=?
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getShipById()
    {
        $sql = "select 
        ships.*
        from order_details
        left join ships on ships.ship_id  = order_details.ship_id 
        where  order_details.detail_id = ?
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateOrder($status)
    {
        $sql = "select status from order_details  where detail_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['detail_id']]);
        $currentStatus = $stmt->fetchColumn();
        $allowedStatus = [
            'Pending' => ['Confirmend'],
            'Confirmend' => ['Shipped', 'Canceled'],
            'Shipped' => ['Delivered'],
            'Delivered' => [],
        ];
        if (!isset($allowedStatus[$currentStatus]) || !in_array($status, $allowedStatus[$currentStatus])) {
            return false;
        }

        $sql = "update order_details set status=?,updated_at = now() where detail_id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$status, $_GET['detail_id']]);
    }

    public function getOrderDetailByUserId()
    {
        $sql = "select * from order_details where user_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancelOrder()
    {
        $sql = 'update order_details set status = "Canceled",updated_at = now() where detail_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['detail_id']]);
    }

    public function createGuest($name,$email,$phone,$address)
    {
        $sql = "insert into user (name,email,phone,address,role_id) value (?,?,?,?,3)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name,$email,$phone,$address]);
    }
}
