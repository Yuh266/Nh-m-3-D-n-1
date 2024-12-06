<?php

class AdminDonHangController
{

    public $modelDonHang;
    public $modelTrangThai;


    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
        $this->modelTrangThai = new AdminTrangThaiDonHang();

    }

    public function listDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHangVoiTrangThai();
        $title = "Danh Sách Đơn Hàng";
        $link_navs = [
            ["link" => 'href=' . BASE_URL_ADMIN . '', "ten" => "Trang Chủ"],
            ["link" => '', "ten" => $title],
        ];
        require_once './views/DonHang/listDonHang1.php';
        if (isset($_SESSION['id_active'])) {
            unset($_SESSION['id_active']);
        }
        deleteAlertSession();
        deleteSession('error');
    }

    public function deleteDonHangByID(){
        if ($_GET['id'] || $_POST["id"]) {
            $id = $_GET['id'] ?? $_POST["id"];
            if (is_array($id)) {
                foreach ($id as $key => $value) {
                    if ($this->modelDonHang->deleteDonHangById($value)) {
                        $_SESSION['alert_delete_success'] = 1;
                    } else {
                        echo "Lỗi";
                    }
                }
            } else {
                if ($this->modelDonHang->deleteDonHangById($id)) {
                    $_SESSION['alert_delete_success'] = 1;
                    // var_dump($_GET["id"]);
                    // die();
                } else {
                    echo "Lỗi";
                }
            }

            $_SESSION['alert_delete_success'] = 1;
            header('Location:' . BASE_URL_ADMIN . '/?act=danh-sach-don-hang');
            exit();
        } else {
            header('Location:' . BASE_URL_ADMIN . '/?act=danh-sach-don-hang');
            exit();
        }
    }

    public function formChiTietDonHang(){
        $id = $_GET['id'];
        // $listDonHang = $this->modelDonHang->getAllDonHangVoiTrangThai();
        $donHang = $this->modelDonHang->getDonHangById($id);
        $donHang1 = $this->modelDonHang->getDonHangById1($id);
        var_dump($donHang);die();
        //     die();
        if ($donHang) {
            $title = "Chi Tiết Đơn Hàng";
            $link_navs = [
                ["link" => 'href="' . BASE_URL_ADMIN . '"', "ten" => "Trang Chủ"],
                ["link" => 'href="' . BASE_URL_ADMIN . '/?act=danh-sach-don-hang"', "ten" => "Danh Sách Đơn Hàng"],
                ["link" => '', "ten" => $title],
            ];
            // var_dump($listDonHang);die();
            // var_dump($donHang);
            // var_dump($donHang['id_trang_thai']);
            // die();
            require_once './views/DonHang/chiTietDonHang.php';
            if (isset($_SESSION['id_active'])) {
                unset($_SESSION['id_active']);
            }
            deleteAlertSession();
            deleteSession('error');
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=danh-sach-don-hang');
            exit();
        }
    }

    public function postChiTietDonHang() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_don_hang'] ?? '';
            $id_trang_thai = $_POST['id_trang_thai'] ?? '';
            // var_dump($id, $id_trang_thai);
            // die();

            $errors = [];
            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                if ($this->modelDonHang->updateTrangThaiDonHang($id, $id_trang_thai)) {
                    $_SESSION['alert_success'] = 1;
                    $_SESSION['id_active'] = $id;
                    header('Location: ' . BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id=' . $id);
                    exit();
                } else {
                    echo "Lỗi khi cập nhật trạng thái!";
                }
            } else {
                $_SESSION['alert_error'] = 1;
                header('Location: ' . BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id=' . $id);
                exit();
            }
        }
    }
    
}