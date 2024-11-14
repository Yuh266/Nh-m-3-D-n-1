<?php 

class SlideShow{
    public $conn ;

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


}

