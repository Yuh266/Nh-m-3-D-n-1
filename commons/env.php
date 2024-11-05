<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/Du_an_1/');
define('BASE_URL_ADMIN' , 'http://localhost/Du_an_1/admin');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'Du_an_1');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../' );
define('PATH_ROOT_CONTROLLERS'    , PATH_ROOT. 'controllers/' );
define('PATH_ROOT_MODELS'    , PATH_ROOT. 'models/' );
define('PATH_ADMIN'    , PATH_ROOT. 'admin/' );
define('PATH_ADMIN_CONTROLLERS'    , PATH_ROOT. 'admin/controllers/' );
define('PATH_ADMIN_MODELS'    , PATH_ROOT. 'admin/models/' );




