<?php
require_once '../modle/coupon.php';
class CouponAdminController extends coupons
{
    public function getAllCoupons()
    {
        $getCoupon = $this->listCoupons();
        include '../view/admin/coupon/list.php';
    }

    public function addCoupon()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCoupon'])) {
            $errors = [];
            if (empty($_POST['name_coupon'])) {
                $errors['name_coupon'] = "Vui lòng nhập tên mã giảm giá";
            }
            if (empty($_POST['coupon_code'])) {
                $errors['coupon_code'] = "Vui lòng nhập code mã giảm giá";
            }
            if (empty($_POST['type'])) {
                $errors['type'] = "Vui lòng chọn kiểu mã giảm giá";
            }
            if (empty($_POST['coupon_value'])) {
                $errors['coupon_value'] = "Vui lòng nhập giá trị mã giảm giá";
            }
            if (empty($_POST['star_date']) && $_POST['star_date'] <= date('Y-m-d')) {
                $errors['star_date'] = "Vui lòng chọn ngày bắt đầu mã giảm giá";
            }
            if (empty($_POST['end_date'])) {
                $errors['end_date'] = "Vui lòng chọn ngày kết thúc mã giảm giá";
            }
            if ($_POST['end_date'] < $_POST['star_date']) {
                $errors['end_date'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = "Vui lòng nhập số lượng mã giảm giá";
            }
            if (empty($_POST['status'])) {
                $errors['status'] = "Vui lòng nhập trạng thái mã giảm giá";
            }

            $_SESSION['errors'] = $errors;

            if (count($errors) > 0) {
                $_SESSION['error'] = "Vui lòng nhập đầy đủ dữ liệu";
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $createNewCoupon = $this->createCoupon($_POST['name_coupon'], $_POST['coupon_code'], $_POST['type'], $_POST['star_date'], $_POST['end_date'], $_POST['quantity'], $_POST['status'], $_POST['coupon_value']);
            if ($createNewCoupon) {
                $_SESSION['success'] = "Thêm voucher thành công";
                header("location:indext.php?act=coupon");
                exit();
            } else {
                $_SESSION['error'] = "Thêm voucher thất bại";
                header("location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../view/admin/coupon/create.php';
    }

    public function editCoupon()
    {
        $editVoucher = $this->detail();
        if ($editVoucher) {
            return $editVoucher;
        } else {
            $_SESSION['errors'] = 'Không tìm thấy voucher';
        }
    }
    public function update()
    {
        $editVoucher = $this->detail();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateCoupon'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = "Vui lòng nhập tên mã giảm giá";
            }
            if (empty($_POST['coupon_code'])) {
                $errors['coupon_code'] = "Vui lòng nhập code mã giảm giá";
            }
            if (empty($_POST['type'])) {
                $errors['type'] = "Vui lòng nhập kiểu mã giảm giá";
            }
            if (empty($_POST['star_date'])) {
                $errors['star_date'] = "Vui lòng nhập ngày bắt đầu mã giảm giá";
            }
            if (empty($_POST['end_date'])) {
                $errors['end_date'] = "Vui lòng nhập ngày kết thúc mã giảm giá";
            }
            if ($_POST['end_date'] < $_POST['star_date']) {
                $errors['end_date'] = 'Ngày kết thúc không phù hợp';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = "Vui lòng nhập số lượng mã giảm giá";
            }
            if (empty($_POST['status'])) {
                $errors['status'] = "Vui lòng nhập trạng thái mã giảm giá";
            }

            $_SESSION['errors'] = $errors;
            $updateVoucher = $this->updateCoupon($_GET['id'], $_POST['name'], $_POST['coupon_code'], $_POST['type'], $_POST['star_date'], $_POST['end_date'], $_POST['quantity'], $_POST['status'], $_POST['coupon_value']);
            if ($updateVoucher) {
                $_SESSION['success'] = "Cập nhập voucher thành công";
                header("location:indext.php?act=coupon");
                exit();
            } else {
                $_SESSION['error'] = "Cập nhập voucher thất bại";
                header("location:" . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        // echo "<pre>";
        // print_r($editVoucher);
        // echo "<pre>";

        include '../view/admin/coupon/edit.php';
    }

    public function delete()
    {
        try {
            $deleteVoucher = $this->deleteCoupon($_GET['id']);
            $_SESSION['success'] = "Xóa voucher thành công";
            header("location:indext.php?act=coupon");
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = "Xóa voucher thất bại";
            header("location:" . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
