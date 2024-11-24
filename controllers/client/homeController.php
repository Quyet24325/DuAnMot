<?php
require_once '../modle/category.php';
require_once '../modle/product.php';

class homeController{
    protected $category ;
    protected $product ;
    public function __construct()
    {
        $this->category=new category();
        $this->product=new product();
    }
    public function index() {
        $category = $this ->category->listCategory();
        $product = $this ->product->listProduct();
        include '../view/client/indext.php';
    }

    public function getProductDetail ()
    {
        $productDetail = $this->product->getProductBySlug($_GET['slug']);
        $productDetail = reset($productDetail);
        // echo "<pre>";
        // print_r($productDetail);
        // echo "</pre>";
        include '../view/client/product/productDetail.php';
    }
}