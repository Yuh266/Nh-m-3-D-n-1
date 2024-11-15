<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}


function deleteSessionError(){
    if(isset($_SESSION['flash'])){
        // Hủy session sau khi đã tải trang
        // unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
}
function deleteSession($name_session) {
    if(isset($_SESSION[$name_session])){
        unset($_SESSION[$name_session]) ;
    }
}



function deleteAlertSession() {
    if(isset($_SESSION['alert_error'])){
        unset($_SESSION['alert_error']);
    }
    if(isset($_SESSION['alert_success'])){
        unset($_SESSION['alert_success']);
    }
}


function upLoadFile($file,$floderUpload) {
    $path = $floderUpload . time() . $file["name"];

    $form = $file['tmp_name'];
    $to = PATH_ROOT . $path ;

    if (move_uploaded_file($form,$to)) {
        return $path;
    }
    return null;
}

function deleteFile($nameFile) {
    $path = PATH_ROOT . $nameFile;
    // var_dump($path);
    // var_dump(file_exists($path));
    // die();
    if (file_exists($path)) {
       unlink($path);
    }
}









