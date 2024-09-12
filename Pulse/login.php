<?php
session_start();

$servername = "sql12.freesqldatabase.com";
$username = "sql12729556";             
$password = "riUq2VESgR";         
$dbname = "sql12729556";             

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $entered_password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if ($user['is_admin']) {  
            if ($entered_password) {  
            
                if (password_verify($entered_password, $user['password'])) {
                   
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['is_admin'] = true;

                    header("Location: dashboard.php");
                    exit;
                } else {
                    echo "Invalid password for admin.";
                }
            } else {
      
                echo '<form method="post" action="login.php">
                        <input type="hidden" name="user_id" value="' . htmlspecialchars($user_id) . '">
                        Password: <input type="password" name="password">
                        <input type="submit" value="Login">
                      </form>';
            }
        } else {  
           
            $profile_data = json_decode($user['profile_data'], true);
            echo "Welcome " . htmlspecialchars($profile_data['name']) . ", Email: " . htmlspecialchars($profile_data['email']);
        }
    } else {
        echo "User ID not found.";
    }
    $stmt->close();
}

$conn->close();
?>
