<?php
$servername = "localhost";
$user = "root";
$password = "123456";
$dbname = "cloud_signin";

//创建链接
$conn = new mysqli($servername, $user, $password, $dbname);
//检测链接
if ($conn->connect_errno) {
    die("链接失败:" . $conn->connect_error);
}
$conn->set_charset('utf8');//设置字符集
?>