<?php 

class AdminSlideShowController{
    public $modelSlideShows;
    public function __construct(){
        $this->modelSlideShows = new AdminSlideShow();
    }

    public function listSlideShow(){
        $listSlideShow = $this->modelSlideShows->getAllSlideShows();
        $title = "Danh Sách Slide Show";

        require "./views/SlideShow/listSlideShow.php";
    }

    public function formAddSlideShow(){
        require "./views/SlideShow/addSlideShow.php";
    }

    public function postAddSlideShow(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_anh = $_POST['ten_anh'] ?? "" ;
            $so_thu_tu = $_POST['so_thu_tu'] ?? "" ;
            $thoi_gian_ton_tai = $_POST['thoi_gian_ton_tai'] ?? null ;
            $link_chuyen_huong = $_POST['link_chuyen_huong'] ?? "" ;
            $file_anh = $_FILES['file_anh'] ?? "" ;
            // var_dump("Vào r");
            // Begin validate
            $error = [];
            if(empty($ten_anh)){
                $error['ten_anh'] = "Không được bỏ trống";
            }
            if(empty($so_thu_tu)){
                $error['so_thu_tu'] = "Không được bỏ trống";
            }
            if(empty($link_chuyen_huong)){
                $error['link_chuyen_huong'] = "Không được bỏ trống";
            }
            // End validate
            
            $_SESSION['error'] = $error;
            // var_dump($error);die();

            if (empty($error)) {
                // Lưu ảnh
                $link_anh = upLoadFile($file_anh,"/uploads/");
                if ($this->modelSlideShows->insertSlideShow($ten_anh, $so_thu_tu, $thoi_gian_ton_tai,$link_anh, $link_chuyen_huong)){
                    session_unset();
                    header('Location:'.BASE_URL_ADMIN.'/?act=form-them-slide-show') ;
                }else{
                    echo"Lỗi";
                }
            }else {
                $slide_show = [
                    'ten_anh'=>$ten_anh,
                    'so_thu_tu'=>$so_thu_tu,
                    'thoi_gian_ton_tai'=>$thoi_gian_ton_tai,
                    'link_chuyen_huong'=>$link_chuyen_huong,
                ];
                $_SESSION['slide_show'] = $slide_show;
                header('Location:'.BASE_URL_ADMIN.'/?act=form-them-slide-show') ;
            }
        }
    }

    public function deleteSlideShow(){
        if($_GET['id']){
            $id = $_GET['id'];
            if($this->modelSlideShows->deleteSlideShow($id)){

                header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-slide-show') ;
            }else{
                echo "Lỗi";
            }
        }else{
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-slide-show') ;
        }
    }






}






