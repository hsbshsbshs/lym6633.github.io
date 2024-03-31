<?php
include_once "../../model/public.php";
//调用增
// $username = $_GET['userName'];
// $uid = $_GET['passwd'];
// register($conn, $username, $uid);
if (isset($_GET['userName']) && isset($_GET['passwd'])) {
    $username = $_GET['userName'];
    $uid = (int) $_GET['passwd'];
    register($conn, $username, $uid);
    $conn->close();
} else {
    // 处理参数缺失的情况
    echo "缺少必要参数";
}
//增
function register($conn, $username, $uid)
{
    $sql = "insert into users(uid,username) values(?,?)";

    $mysqli_stmt = $conn->prepare($sql);//准备预处理语句


    $mysqli_stmt->bind_param('is', $uid, $username);

    //执行预处理语句
    if ($mysqli_stmt->execute()) {
        // echo $mysqli_stmt->insert_id;
        // echo PHP_EOL;
        // echo "添加成功";
        $json = json_encode($sql);
        echo "decodeUnicode($json)";
        echo "<script>
            alert('添加成功');
            window.location.href = '../../view/staffShow.html'
        </script>";
        exit;
    } else {
        echo $mysqli_stmt->error;
    }
    // $conn->close();

}
?>