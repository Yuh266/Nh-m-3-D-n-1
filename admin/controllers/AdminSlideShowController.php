<?php 

class AdminSlideShowController{
    public $modelSlideShows;
    public function __construct(){
        $this->modelSlideShows = new AdminSlideShow();
    }

    public function listSlideShow(){
        $listSlideShow = $this->modelSlideShows->getAllSlideShows();
        $title = "Danh Sách Slide Show";
        // Mảng chỉnh sửa để dổ đg link nav (Phần html này đg ở layout/navbar)
        $link_navs = [
            ["link"=> 'href='.BASE_URL_ADMIN.'',"ten"=> "Trang Chủ"],
            ["link"=> '',"ten"=> $title ],
        ];
        
        require "./views/SlideShow/listSlideShow.php";

        $_SESSION['flash'] = 1 ;
        deleteSessionError();
    }

    public function formAddSlideShow(){
        $title = "Thêm Slide Show";
        
        // Mảng chỉnh sửa để dổ đg link nav (Phần html này đg ở layout/navbar)
        $link_navs = [
            ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
            ["link"=> 'href="'.BASE_URL_ADMIN.'/?act=danh-sach-slide-show"',"ten"=> "Danh Sách Slide Show"],
            ["link"=> '',"ten"=> $title ],
        ];


        require "./views/SlideShow/addSlideShow.php";
        deleteAlertSession();
        deleteSessionError();
    }

    public function postAddSlideShow(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_anh = $_POST['ten_anh'] ?? "" ;
            $so_thu_tu = $_POST['so_thu_tu'] ?? "" ;
            $thoi_gian_ton_tai = $_POST['thoi_gian_ton_tai'] ?? null ;
            $link_chuyen_huong = $_POST['link_chuyen_huong'] ?? "" ;
            $trang_thai = $_POST['trang_thai'] ?? "" ;
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
            if(empty($thoi_gian_ton_tai)){
                $error['thoi_gian_ton_tai'] = "Không được bỏ trống";
            }
            if(empty($trang_thai)&&$trang_thai!= "0"){
                $error['trang_thai'] = "Không được bỏ trống";
            }
            if(!isset($file_anh) || $file_anh["error"] != UPLOAD_ERR_OK ){
                $error['link_anh'] = "Không được bỏ trống";
            }
            // End validate
            
            $_SESSION['error'] = $error;
            // var_dump($error);die();

            if (empty($error)) {
                // Lưu ảnh
                $link_anh = upLoadFile($file_anh,'./uploads/');

                if ($id=$this->modelSlideShows->insertSlideShow($ten_anh, $so_thu_tu, $thoi_gian_ton_tai,$link_anh, $link_chuyen_huong,$trang_thai)){
                    // Xóa toàn bộ session đã lưu (hướng tới xóa Session báo lỗi và hiện thị lại đã nhập) error , slide_show

                    session_unset();
                    $_SESSION['alert_success'] = 1 ;
                    $_SESSION['id_active'] = $id ;
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
                    'trang_thai'=>$trang_thai,
                ];
                $_SESSION['slide_show'] = $slide_show;
                $_SESSION['flash'] = 1 ;
                $_SESSION['alert_error'] = 1;

                header('Location:'.BASE_URL_ADMIN.'/?act=form-them-slide-show') ;
                
            }
        }
    }

    public function formEditSlideShow(){
        if ($_GET['id']) {
            $id = $_GET['id'];
            
            if (isset($_SESSION['slide_show']['id'])) {
                if($id != $_SESSION['slide_show']['id']){
                    $slide_show = $this->modelSlideShows->getSlideShowsByID( $id );
                    $_SESSION['slide_show'] = $slide_show;
                }
            }
            if(!isset($_SESSION['slide_show'])){
                $slide_show = $this->modelSlideShows->getSlideShowsByID( $id );
                $_SESSION['slide_show'] = $slide_show;
            }

            $title = "Sửa Slide Show " ;
            // Mảng chỉnh sửa để dổ đg link nav (Phần html này đg ở layout/navbar)
            $link_navs = [
                ["link"=> 'href="'.BASE_URL_ADMIN.'"',"ten"=> "Trang Chủ"],
                ["link"=> 'href="'.BASE_URL_ADMIN.'/?act=danh-sach-slide-show"',"ten"=> "Danh Sách Slide Show"],
                ["link"=> '',"ten"=> $title ],
            ];

            require "./views/SlideShow/editSlideShow.php";
            deleteAlertSession();
            deleteSessionError();
            $_SESSION['flash'] = 1;
        }else{
            header("Location:".BASE_URL_ADMIN."?act=danh-sach-slide-show") ;
        }        
    }

    public function postEditSlideShow(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'] ?? "" ;
            $old_image = $_POST['old_image'] ?? ($_POST['link_anh']  ?? "") ;
            $ten_anh = $_POST['ten_anh'] ?? "" ;
            $so_thu_tu = $_POST['so_thu_tu'] ?? "" ;
            $thoi_gian_ton_tai = $_POST['thoi_gian_ton_tai'] ?? "" ;
            $link_chuyen_huong = $_POST['link_chuyen_huong'] ?? "" ;
            $trang_thai = $_POST['trang_thai'] ?? "" ;
            $file_anh = $_FILES['file_anh'] ?? "" ;
            var_dump("Vào r");
            // Begin validate
            $error = [] ;
            if(empty($ten_anh)){
                $error['ten_anh'] = "Không được bỏ trống";
            }
            if(empty($so_thu_tu)){
                $error['so_thu_tu'] = "Không được bỏ trống";
            }
            if(empty($link_chuyen_huong)){
                $error['link_chuyen_huong'] = "Không được bỏ trống";
            }
            if(empty($thoi_gian_ton_tai)){
                $error['thoi_gian_ton_tai'] = "Không được bỏ trống";
            }
            if(empty($trang_thai) && $trang_thai!= "0"){
                $error['trang_thai'] = "Không được bỏ trống";
            }
            
            // End validate
            
            $_SESSION['error'] = $error;
            // var_dump($error);die();
            // var_dump($_SESSION['error']);die();

            if (empty($error)) {
                // var_dump(444);die();
                // Xử lí ảnh
                if(isset($file_anh) && $file_anh["error"] == UPLOAD_ERR_OK  ){
                    $link_anh = upLoadFile($file_anh,"./uploads/");
                    if (!empty($old_image)) {
                        deleteFile($old_image);
                    }
                }else{
                    $link_anh = $old_image;
                }
                
                if ($this->modelSlideShows->updateSlideShow($id,$ten_anh, $so_thu_tu, $thoi_gian_ton_tai,$link_anh, $link_chuyen_huong,$trang_thai)){
                    session_unset();
                    $_SESSION['alert_success'] = 1 ;
                    $_SESSION['id_active'] = $id ;
                    // var_dump($_SESSION['id_active']);die();
                    header('Location:'.BASE_URL_ADMIN.'/?act=form-sua-slide-show&id='.$id) ;
                }else{
                    echo"Lỗi";
                }
            }else {
                $slide_show = [
                    'link_anh'=>$old_image,
                    'id'=>$id,
                    'ten_anh'=>$ten_anh,
                    'so_thu_tu'=>$so_thu_tu,
                    'thoi_gian_ton_tai'=>$thoi_gian_ton_tai,
                    'link_chuyen_huong'=>$link_chuyen_huong,
                    'trang_thai'=>$trang_thai,
                ];
                $_SESSION['slide_show'] = $slide_show;
                $_SESSION['flash'] = 1 ;

                $_SESSION['alert_error'] = 1 ;

                // var_dump(444);die();
                header('Location:'.BASE_URL_ADMIN.'?act=form-sua-slide-show&id='.$id ) ;
            }
        }
    }

    public function deleteSlideShow(){
        if($_GET['id'] || $_POST["id"]){
            $id = $_GET['id']??$_POST["id"];
            if(is_array($id)){
                foreach($id as $key => $value){
                    $slide_show = $this->modelSlideShows->getSlideShowsByID($id[$key]);
                    deleteFile($slide_show['link_anh']);
                    $this->modelSlideShows->deleteSlideShow($id[$key]);
                }
            }else{
                $slide_show = $this->modelSlideShows->getSlideShowsByID($id);
                // var_dump($slide_show);
                deleteFile($slide_show['link_anh']);
                $this->modelSlideShows->deleteSlideShow($id);
                
            }
            $_SESSION['alert_delete_success']=1;
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-slide-show') ;
        }else {
            header('Location:'.BASE_URL_ADMIN.'/?act=danh-sach-slide-show') ;
        }
    }






}






