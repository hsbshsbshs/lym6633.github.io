<?php
include_once "../../model/public.php";
if (isset($_GET['userName']) && isset($_GET['passwd'])) {
    $username = $_GET['userName'];
    $uid = (int) $_GET['passwd'];
    query($conn, $username, $uid);
    $conn->close();
    var_dump($_GET);
} else {
    // 处理参数缺失的情况
    echo "缺少必要参数";
    var_dump($_GET);

}



// query($conn, $username, $uid);
// $conn->close();

function query($conn, $username, $uid)
{
    $sql = "SELECT uid FROM users where uid = ? and username = ?";

    $mysqli_stmt = $conn->prepare($sql);//准备预处理语句
    $mysqli_stmt->bind_param('is', $uid, $username);

    if ($mysqli_stmt->execute()) {
        $mysqli_stmt->bind_result($uid);
        while ($mysqli_stmt->fetch()) {
            echo '<br/>工号' . $uid;
        }
    } else {
        echo "查询出错：" . $mysqli_stmt->error;
    }
    $mysqli_stmt->free_result();
    $mysqli_stmt->close();
}
?>