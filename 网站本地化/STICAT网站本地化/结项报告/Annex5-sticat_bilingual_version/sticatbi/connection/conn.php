<?php

// 使用一个版本的链接时候请注释掉另一版本的链接即可，切勿删除
// 数据库的名字搞这么长是因为服务器上就是这么长，所以在这里统一一下

// // 本地xampp版本
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'yangruix_minicat');


// // 服务器版本
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'yangruix_sticat');
// define('DB_PASSWORD', 'sticat123456');
// define('DB_DATABASE', 'yangruix_sticat');


$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(! $conn )
{
	die("Could not connect: " . mysqli_error());
}

mysqli_query($conn, "set names 'utf8'");

?>



