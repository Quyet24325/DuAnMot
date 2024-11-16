<?php
require_once '../modle/product.php';
class ProductAdminController extends product
{
    public function indext()
    {
        $getProduct = $this->listProduct();
        include '../view/admin/product/list.php';
    }

    public function createProduct()
    {
        $listColor = $this->getAllColor();
        $listSize = $this->getAllSize();
        $listCategory = $this->getCategory();
        include '../view/admin/product/create.php';
    }
    public function postCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['add_product'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['product_price'])) {
                $errors['product_price'] = 'Vui lòng nhập giá sản phẩm';
            }
            if (empty($_POST['product_sale_price'])) {
                $errors['product_sale_price'] = 'Vui lòng nhập giá khuyến mại sản phẩm';
            }
            if (empty($_POST['varian_size'])) {
                $errors['varian_size'] = 'Vui lòng chọn dung lượng sản phẩm';
            }
            if (empty($_POST['varian_color'])) {
                $errors['varian_color'] = 'Vui lòng chọn màu sản phẩm';
            }
            if (empty($_POST['varian_description'])) {
                $errors['varian_description'] = 'Vui lòng nhập mô tả của sản phẩm';
            }
            if (!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
                $errors['product_image'] = 'Vui lòng chọn file ảnh';
            }


            foreach ($_POST['varian_quantity'] as $key => $varian_quantity) {
                if (empty($varian_quantity)) {
                    $errors['varian_quantity'][$key] = 'Vui lòng nhập số lượng biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui lòng nhập giá của biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui lòng nhập giá khuyến mại của biến thể ' . ($key + 1);
                }
            }
            $_SESSION['errors'] = $errors;
            if ($errors) {
                header("Location:indext.php?act=product_create");
            }

            $file = $_FILES['product_image'];
            //uniqid ->tạo ra id độc nhất cho ảnh.
            //preg_replace('/[^A-Za-z0-9\-_\.]+/') loại bỏ các kí tự đặc biệt(dấu cách) và chỉ chấp nhận chữ cái và số thay các ký tự không hợp lệ bằng dấu "-"
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if (move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                $addProduct = $this->addProduct($_POST['name'], $product_image, $_POST['product_price'], $_POST['product_sale_price'], $_POST['slug'], $_POST['varian_description'], $_POST['cate_id']);
                if ($addProduct) {
                    $product_id = $this->getLastInsertId();
                    if (isset($_POST['varian_size']) && isset($_POST['varian_color'])) {
                        foreach ($_POST['varian_size'] as $key => $size) {
                            $addProductVariant = $this->addProductVariants(
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['varian_quantity'][$key],
                                $product_id,
                                $_POST['varian_color'][$key],
                                $size
                            );
                        }
                    }
                    if (!empty($_FILES['gallery_image']['name'][0])) {
                        $file = $_FILES['gallery_image'];
                        for ($i = 0; $i < count($file['name']); $i++) {
                            $fileName = basename($file['name'][$i]);
                            $imageArray = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($fileName));
                            move_uploaded_file($file['tmp_name'][$i], 'images/gallery_product/' . $imageArray);
                            $this->addGallery($product_id, $imageArray);
                        }
                    }
                }
                $_SESSION['success'] = 'Thêm sản phẩm thành công';
                header('Location:indext.php?act=product');
                exit();
            }
        }
    }
}
