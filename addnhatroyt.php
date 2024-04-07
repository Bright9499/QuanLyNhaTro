<?php
include 'database.php';
session_start(); // Đảm bảo khởi động phiên làm việc

if(isset($_POST["add"]) && isset($_SESSION['userID'])) {
    $user_id = $_SESSION['userID'];
    $nhatro_id = $_GET['id'];
    
    // Sử dụng prepared statements để tránh SQL Injection
    $stmt = $conn->prepare("SELECT * FROM nhatroyt WHERE nhatro_id = ?");
    $stmt->bind_param("s", $nhatro_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        header('Location: index.php?error=nhà trọ này đã được thêm vào.');
        exit();
    } else {
        // Insert user into database using prepared statement
        $stmt = $conn->prepare("INSERT INTO nhatroyt (user_id, nhatro_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $user_id, $nhatro_id);
        $stmt->execute();

        header('Location: index.php?success=Đã thêm vào nhà trọ.');
        exit();
    }
} else {
    // Nếu người dùng chưa đăng nhập hoặc không nhấn nút "add"
    header('Location: index.php?error=Bạn cần đăng nhập để thực hiện thao tác này.');
    exit();
}
?>
