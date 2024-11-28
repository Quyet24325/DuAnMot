<?php

require_once '../connect/connect.php';

class cart extends connect{
    public function getAllCart(){
        $sql = 'select
                cart.id as cart_id,
                products.name as pro_name,
                products.image as pro_image,
                product_variants.price as pro_var_price,
                product_variants.sale_price as pro_var_sale_price,
                variant_color.color_name as var_color_name,
                variant_size.size as var_size_name,
                cart.quantity as quantity

                from cart
                left join products on cart.product_id = products.product_id
                left join product_variants on product_variants.product_id = products.product_id
                left join variant_colors on product_variants.variant_color_id = variant_color.variant_color_id
                left join variant_sizes on product_variants.variant_size_id = variant_size.variant_size_id

                where cart.user_id

                ';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function addToCart($user_id ,$pro_id ,$var_id ,$quantity){
        $sql = 'insert into cart(user_id,pro_id,var_id,quantity) value(?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt ->execute([$user_id ,$pro_id ,$var_id ,$quantity]);
    }

    public function checkCart(){
        $sql = 'select * from cart where user_id = ? and product_id = ? and variant = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id'], $_POST['variant_id']]);
        return $stmt->fetch();
    }
    
    public function updateCart($user_id ,$pro_id ,$var_id ,$quantity){
        $sql = 'update cart set quantity = ? where user_id = ? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity,$user_id ,$pro_id ,$var_id ]);
    }
}