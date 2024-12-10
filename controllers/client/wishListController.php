<?php

require_once '../modle/wishList.php';

class wishListController extends wishlist{
    public function index(){    
        
        $listWishList = $this->listWishList();
        include '../view/client/wishList/wishList.php';
    }

    public function add()
    {
        $checkWishList= $this->checkWishlist();
        if($checkWishList){
            $_SESSION['error'] = 'sản phẩm này đã có trong danh sách yêu thích';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }
       $addWishList= $this->addWishList();
       if($addWishList){
        $_SESSION['success'] = "thêm sản phẩm yêu thích thành công !";
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
       }else{
        $_SESSION['success'] = "thêm sản phẩm yêu thích không thành công !";
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
       }
    }

    public function delete(){
        try {
            $this->deleteWishList();
            $_SESSION['success'] = 'xóa sản phẩm yêu thích thành công';
            header('Location:' .$_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            $_SESSION['errors'] = 'xóa sản phẩm yêu thích thất bại.';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}