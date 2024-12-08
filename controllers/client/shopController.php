<?php

class ShopController{
    protected $product;
    protected $category;

    public function __construct()
    {
        $this->product = new product();
        $this->category = new category();
    }

    public function index(){
        $categories = $this->category->listCategory();
        $products = $this->product->listProduct();
        $result = $this->search();
        if(!empty($result)){
            $products = $result;
        }
        include '../view/client/shop/shop.php';
    }

    public function search(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['search'])){
            $result = $this->product->search($_POST['keyword']);
            $_SESSION['keyword'] = $_POST['keyword'];
            if($result){
                $_SESSION['success']= 'kết quả tìm kiếm ' . ' ' .$_POST['keyword'];
            }else{
                $_SESSION['error']= 'không tìm thấy kết quả ' . ' ' .$_POST['keyword'];
                header('location: '.$_SERVER['HTTP_REFERER']);
                exit();
            }
            return $result;
        }
    }
}
