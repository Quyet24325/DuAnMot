<?php

require_once '../connect/connect.php';

class cart extends connect
{
    public function getAllCart()
    {
        $sql = 'select
                cart.cart_id as cart_id,
                products.name as pro_name,
                products.pro_id as pro_id,
                products.image as pro_image,
                products.slug as pro_slug,
                product_variants.var_id  as variant_id,
                product_variants.price as pro_var_price,
                product_variants.sale_price as pro_var_sale_price,
                variant_color.name as var_color_name,
                variant_size.name as var_size_name,
                cart.quantity as quantity

                from cart
                left join products on cart.pro_id = products.pro_id
                left join product_variants on product_variants.var_id = cart.variant_id
                left join variant_color on product_variants.var_color_id = variant_color.var_color_id
                left join variant_size on product_variants.var_size_id = variant_size.var_size_id

                where cart.user_id = ?
                ';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addToCart($user_id, $pro_id, $variant_id, $quantity)
    {
        $sql = 'insert into cart(user_id,pro_id,variant_id,quantity) value(?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$user_id, $pro_id, $variant_id, $quantity]);
    }

    public function checkCart()
    {
        $sql = 'select * from cart where user_id = ? and pro_id = ? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id'], $_POST['pro_id'], $_POST['variant_id']]);
        return $stmt->fetch();
    }

    public function updateCart($user_id, $pro_id, $variant_id, $quantity)
    {
        $sql = 'update cart set quantity = ? where user_id = ? and pro_id = ? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $user_id, $pro_id, $variant_id]);
    }

    public function updateCartById($cart_id, $quantity)
    {
        $sql = 'update cart set quantity = ? where cart_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $cart_id]);
    }

    public function deleteCart($cart_id)
    {
        $sql = 'delete from cart where cart_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$cart_id]);
    }

    public function getCouponByCode($coupon_code)
    {
        $sql = 'select * from coupons where coupon_code = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$coupon_code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductVariantId($pro_id)
    {
        $sql = "select 
                product_variants.var_id as var_id,
                product_variants.price as var_price,
                product_variants.sale_price as var_sale_price,
                product_variants.var_quantity as var_quantity,
                product_variants.var_color_id  as var_color_id ,
                product_variants.var_size_id   as var_size_id  ,
                variant_color.name  as var_color_name ,
                variant_size.name  as var_size_name ,
                products.name as pro_name,
                products.pro_id as pro_id

                from product_variants
                left join products on product_variants.pro_id = products.pro_id
                left join variant_color on product_variants.var_color_id = variant_color.var_color_id
                left join variant_size on product_variants.var_size_id = variant_size.var_size_id
                where product_variants.pro_id=? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pro_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
