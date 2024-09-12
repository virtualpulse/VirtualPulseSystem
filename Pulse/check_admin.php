<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12729556";                
$password = "riUq2VESgR";                
$dbname = "sql12729556";                  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: "   . $conn->connect_error);
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $stmt = $conn->prepare("SELECT is_admin FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        echo json_encode(['is_admin' => $user['is_admin']]);
    } else {
        echo json_encode(['is_admin' => false]);
    }

    $stmt->close();
}

$conn->close();
?>
