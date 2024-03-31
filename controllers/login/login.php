<?php
header('Content-Type:application/json');

include_once "../../model/public.php";

session_start();

$uid = $_GET['passwd'];
$username = $_GET['userName'];
$response = login($conn, $uid, $username);


if (!empty($response) && !isset($response['error'])) {
    // $_SESSION['userName'] = $username;
    header("location:../../../../view/staffShow.php");
    exit;
}



echo json_encode($response);
$conn->close();
function login($conn, $uid, $username)
{
    $sql = "SELECT uid,username from users where uid = ? and username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $uid, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {

        $_SESSION['userName'] = $username;

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            echo $_SESSION['username'];

        }
        return $data;
    } else {
        return array('error' => '用户名或者工号不对');
    }
}
?>