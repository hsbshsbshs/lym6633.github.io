<?php
include_once "../../model/public.php";
// session_start();

header('Content-Type: application/json');
$sql = "SELECT uid,username from users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo $row["username"] . "&nbsp;&nbsp;";
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo json_encode(array('message' => 'no users found'));
}
$conn->close();
?>