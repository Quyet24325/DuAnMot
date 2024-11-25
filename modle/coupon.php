<?php
require_once '../connect/connect.php';
class coupons extends connect
{
    public function listCoupons()
    {
        $sql = "select * from coupons";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createCoupon($name, $coupon_code, $type, $star_date, $end_date, $quantity, $status, $coupon_value)
    {
        $sql = "insert into coupons (name,coupon_code,type,star_date,end_date,quantity,status,coupon_value,created_at,updated_at) value (?,?,?,?,?,?,?,?,now(),now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupon_code, $type, $star_date, $end_date, $quantity, $status, $coupon_value]);
    }

    public function detail()
    {
        $sql = "select * from coupons where cou_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateCoupon($id, $name, $coupon_code, $type, $star_date, $end_date, $quantity, $status, $coupon_value)
    {
        $sql = "update coupons set name=?,coupon_code=?,type=?,star_date=?,end_date=?,quantity=?,status=?,coupon_value=?,updated_at=now() where cou_id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupon_code, $type, $star_date, $end_date, $quantity, $status, $coupon_value, $id]);
    }
    public function deleteCoupon()
    {
        $sql = "delete from coupons where cou_id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }
}
