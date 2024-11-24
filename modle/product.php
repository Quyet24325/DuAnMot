<?php

require_once '../connect/connect.php';
class product extends connect
{
    public function getAllColor()
    {
        $sql = "select * from variant_color";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSize()
    {
        $sql = "select * from variant_size";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCategory()
    {
        $sql = "select * from categories";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $image, $price, $sale_price, $slug, $description, $cate_id)
    {
        $sql = 'insert into products(name,image,price,sale_price,slug,description,cate_id) value(?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image, $price, $sale_price, $slug, $description, $cate_id]);
    }
    public function addGallery($pro_id, $image)
    {
        $sql = 'insert into product_galleries(pro_id ,image) value(?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$pro_id, $image]);
    }
    public function addProductVariants($price, $sale_price, $quantity, $pro_id, $var_color_id, $var_size_id)
    {
        $sql = 'insert into product_variants(price,sale_price,quantity,pro_id,var_color_id,var_size_id,created_at,updated_at) value(?,?,?,?,?,?,now(),now())'; //noW()->lấy thời gian hiện tại
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $quantity, $pro_id, $var_color_id, $var_size_id]);
    }
    public function getLastInsertId()
    {
        //Lấy id sản phẩm vừa thêm
        return $this->connect()->lastInsertId();
    }

    public function listProduct()
    {
        $sql = "select 
                    products.pro_id as pro_id,
                    products.name as pro_name,
                    products.price as pro_price,
                    products.sale_price as pro_sale_price,
                    products.image as pro_image,
                    products.slug as pro_slug,
                    categories.cate_id as cate_id,
                    categories.name as cate_name,
                    product_variants.pro_id as product_variant_id,
                    variant_color.name as color_name,
                    variant_size.name as size_name
                    from products 
                    left join categories on products.cate_id = categories.cate_id
                    left join product_variants on products.pro_id = product_variants.pro_id
                    left join variant_color on product_variants.var_color_id = variant_color.var_color_id
                    left join variant_size on product_variants.var_size_id = variant_size.var_size_id
                    ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $groupProduct = [];
        //lặp quan từng sản phẩm
        foreach ($listProduct as $product) {
            if (!isset($groupProduct[$product['pro_id']])) {
                $groupProduct[$product['pro_id']] = $product;
                $groupProduct[$product['pro_id']]['variants'] = [];
            }
            //thêm các biến thể
            $groupProduct[$product['pro_id']]['variants'][] = [
                'pro_id' => $product['pro_id'],
                'variant_color' => $product['color_name'],
                'variant_size' => $product['size_name']
            ];
        }
        return $groupProduct;
    }

    public function getProductId($pro_id)
    {
        $sql = " select 
                products.pro_id as pro_id,
                products.name as pro_name,
                products.price as pro_price,
                products.sale_price as pro_sale_price,
                products.image as pro_image,
                products.description as pro_description,
                products.slug as pro_slug,
                categories.cate_id as cate_id,
                categories.name as cate_name
                
                from products 
                left join categories on products.cate_id = categories.cate_id
                
                where products.pro_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pro_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductVariantId($pro_id)
    {
        $sql = "select 
                product_variants.var_id as var_id,
                product_variants.price as var_price,
                product_variants.sale_price as var_sale_price,
                product_variants.quantity as var_quantity,
                product_variants.var_color_id  as var_color_id ,
                product_variants.var_size_id   as var_size_id  ,
                variant_color.name  as var_color_name ,
                variant_size.name  as var_size_name 

                from product_variants
                left join variant_color on product_variants.var_color_id = variant_color.var_color_id
                left join variant_size on product_variants.var_size_id = variant_size.var_size_id
                where product_variants.pro_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pro_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductGalleryId()
    {
        $sql = "select * from product_galleries where pro_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Cập nhập sản phẩm
    public function updateProduct($pro_id, $name, $image, $price, $sale_price, $slug, $description, $cate_id)
    {
        $sql = "update products set name=?, image=?,price=?,sale_price=?,slug=?,description=?,cate_id=?  where pro_id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image, $price, $sale_price, $slug, $description, $cate_id, $pro_id]);
    }

    public function updateProductVariant($var_id, $price, $sale_price, $quantity, $pro_id, $var_color_id, $var_size_id)
    {
        $sql = "update product_variants set price=?,sale_price=?,quantity=?,pro_id=?,var_color_id=?,var_size_id=? where var_id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $quantity, $pro_id, $var_color_id, $var_size_id, $var_id]);
    }

    public function updateProductGallery($pro_id, $image)
    {
        $sql = "update product_galleries set image=? where pro_id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($image, $pro_id);
    }

    public function deleteImageGallery()
    {
        $sql = 'delete from product_galleries where pro_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }

    public function deleteVariantProduct()
    {
        $sql = 'delete from product_variants where product_variants.var_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['var_id']]);
    }

    public function deleteProductId() {
        $sql='delete from products where pro_id=?';
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }


    public function getProductBySlug($slug) {
        $sql = 'select
                    products.pro_id as pro_id,
                    products.name as pro_name,
                    products.price as pro_price,
                    products.sale_price as pro_sale_price,
                    products.image as pro_image,
                    products.slug as pro_slug,
                    products.description as pro_description,    
                    categories.cate_id as cate_id,
                    categories.name as cate_name,
                    product_variants.price as variant_price,
                    product_variants.sale_price as variant_sale_price,
                    product_variants.quantity as variant_quantity,
                    variant_color.name as color_name,
                    variant_size.name as size_name,
                    product_galleries.image as product_gallery_image
                from products
                left join categories on products.cate_id = categories.cate_id
                left join product_variants on products.pro_id = product_variants.pro_id
                left join product_galleries on products.pro_id = product_galleries.pro_id
                left join variant_color on product_variants.var_color_id = variant_color.var_color_id
                left join variant_size on product_variants.var_size_id = variant_size.var_size_id
                where products.slug=?';
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$slug]);
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $groupProduct = [];
        foreach ($listProduct as $product) {
            if (!isset($groupProduct[$product['pro_id']])) {
                $groupProduct[$product['pro_id']] = $product;
                $groupProduct[$product['pro_id']]['variants'] = [];
                $groupProduct[$product['pro_id']]['product_gallery_images'] = [];
            }
            $groupProduct[$product['pro_id']]['variants'][] = [
                'variant_color' => $product['color_name'],
                'variant_size' => $product['size_name'],
                'variant_price' => $product['variant_price'],
                'variant_sale_price' => $product['variant_sale_price'],
                'variant_quantity' => $product['variant_quantity'],
            ];
            if (!empty($product['product_gallery_image'])) {
                $groupProduct[$product['pro_id']]['product_gallery_images'][] = $product['product_gallery_image'];
            }
        }
    
        return $groupProduct;
    }
}
