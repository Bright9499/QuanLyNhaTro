<?php
global $conn;
include 'database.php';
session_start(); // Đảm bảo khởi động phiên làm việc

if(isset($_POST["add"]) && isset($_SESSION['userID'])) {
    $user_id = $_SESSION['userID'];
    $nhatro_id = $_GET['id'];
    
    // Sử dụng prepared statements để tránh SQL Injection
    $stmt = $conn->prepare("SELECT * FROM nhatroyt WHERE nhatro_id = ? and user_id = ?");
    $stmt->bind_param("ss", $nhatro_id, $user_id);
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
} elseif (isset($_POST["report"])) {
    $nha_tro_id = $_GET['id'];
    error_log("Nha Tro ID: " . $nha_tro_id);

    // Logic xử lý báo cáo vi phạm
    // Ví dụ: kiểm tra xem đã báo cáo chưa
    $stmt = $conn->prepare("SELECT * FROM nha_tro_report WHERE nha_tro_id = ?");
    $stmt->bind_param("s", $nha_tro_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Chưa báo cáo, thêm báo cáo vào database
        $stmt = $conn->prepare("UPDATE nha_tro_report SET number_report = number_report + 1 WHERE nha_tro_id = ?");
        $stmt->bind_param("s", $nha_tro_id);
        $stmt->execute();

        header('Location: index.php?success=BAO_CAO_THANH_CONG&type=update');
        exit();
    } else {
        error_log("Nha Tro ID: " . $nha_tro_id);

        $stmt = $conn->prepare("INSERT INTO nha_tro_report (nha_tro_id, number_report) VALUES (?, 1)");
        $stmt->bind_param("s", $nha_tro_id);
        $stmt->execute();
        header('Location: index.php?success=BAO_CAO_THANH_CONG&type=create');
        exit();
    }
} else {
    // Nếu người dùng chưa đăng nhập hoặc không nhấn nút "add"
    header('Location: index.php?error=Bạn cần đăng nhập để thực hiện thao tác này.');
    exit();
}
?>
