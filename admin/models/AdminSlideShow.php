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

    public function insertSlideShow($ten_anh,$so_thu_tu,$link_anh,$link_chuyen_huong,$trang_thai,$tieu_de,$mo_ta){
        try {
            $sql = "INSERT INTO slide_shows(ten_anh, so_thu_tu,link_anh, link_chuyen_huong,trang_thai,tieu_de,mo_ta) 
                    VALUE (:ten_anh, :so_thu_tu,:link_anh, :link_chuyen_huong, :trang_thai, :tieu_de, :mo_ta)";
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute([':ten_anh'=>$ten_anh,
                                    ':so_thu_tu'=>$so_thu_tu,
                                    ':link_anh'=>$link_anh,
                                    ':link_chuyen_huong'=>$link_chuyen_huong,
                                    ':trang_thai'=>$trang_thai,
                                    ':tieu_de'=>$tieu_de,
                                    ':mo_ta'=>$mo_ta,
                                    ]
                            );

            return $this->conn->lastInsertId() ;
        } catch (Exception $th) {
            echo "Lỗi".$th->getMessage();
        }
    }

    public function updateSlideShow($id,$ten_anh,$so_thu_tu,$link_anh,$link_chuyen_huong,$trang_thai,$tieu_de,$mo_ta){
        try {
            $sql = "UPDATE slide_shows 
                SET
                    ten_anh=:ten_anh, 
                    so_thu_tu=:so_thu_tu,
                    link_anh=:link_anh, 
                    link_chuyen_huong=:link_chuyen_huong,
                    trang_thai=:trang_thai,
                    tieu_de=:tieu_de,
                    mo_ta=:mo_ta
                WHERE 
                    id=".$id;   
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute([':ten_anh'=>$ten_anh,
                                    ':so_thu_tu'=>$so_thu_tu,
                                    ':link_anh'=>$link_anh,
                                    ':link_chuyen_huong'=>$link_chuyen_huong,
                                    ':trang_thai'=>$trang_thai,
                                    ':tieu_de'=>$tieu_de,
                                    ':mo_ta'=>$mo_ta,
                                    ]
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