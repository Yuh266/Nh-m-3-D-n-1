<?php

class AdminSlideShow{

    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    } 

    public function getAllSlideShows(){
        try {
            $sql = "SELECT * FROM slide_shows
                    ORDER BY so_thu_tu";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $th) {
            echo "Lỗi".$th->getMessage();
        }

    }
    public function getSlideShowsByID($id){
        try {
            $sql = "SELECT * FROM slide_shows WHERE id=".$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $th) {
            echo "Lỗi".$th->getMessage();
        }
    }

    public function insertSlideShow($ten_anh,$so_thu_tu,$thoi_gian_ton_tai,$link_anh,$link_chuyen_huong){
        try {
            $sql = "INSERT INTO slide_shows(ten_anh, so_thu_tu, thoi_gian_ton_tai, link_anh, link_chuyen_huong) 
                    VALUE (:ten_anh, :so_thu_tu, :thoi_gian_ton_tai, :link_anh, :link_chuyen_huong)";
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute([':ten_anh'=>$ten_anh,
                                    ':so_thu_tu'=>$so_thu_tu,
                                    ':thoi_gian_ton_tai'=>$thoi_gian_ton_tai,
                                    ':link_anh'=>$link_anh,
                                    ':link_chuyen_huong'=>$link_chuyen_huong]
                            );

            return true;
        } catch (Exception $th) {
            echo "Lỗi".$th->getMessage();
        }
    }

    public function updateSlideShow($id,$ten_anh,$so_thu_tu,$thoi_gian_ton_tai,$link_anh,$link_chuyen_huong){
        try {
            $sql = "UPDATE slide_shows 
                SET
                    ten_anh=:ten_anh, so_thu_tu=:so_thu_tu, thoi_gian_ton_tai=:thoi_gian_ton_tai, link_anh=:link_anh, link_chuyen_huong=:link_chuyen_huong
                WHERE 
                    id=".$id;   
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute([':ten_anh'=>$ten_anh,
                                    ':so_thu_tu'=>$so_thu_tu,
                                    ':thoi_gian_ton_tai'=>$thoi_gian_ton_tai,
                                    ':link_anh'=>$link_anh,
                                    ':link_chuyen_huong'=>$link_chuyen_huong]
                            );

            return true;
        } catch (Exception $th) {
            echo "Lỗi".$th->getMessage();
        }
    }
    public function deleteSlideShow($id){
        try {
            $sql = "DELETE FROM slide_shows WHERE id=".$id ;
            $stmt = $this->conn->prepare($sql) ;
            $stmt->execute() ;

            return true ;
        } catch (Exception $th) {
            echo "Lỗi".$th->getMessage() ;
        }
    }

    






}