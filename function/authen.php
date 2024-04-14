<?php
function checkAdminRole() {
    // Kiểm tra xem session đã được khởi động chưa
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Kiểm tra xem người dùng đã đăng nhập chưa và vai trò có phải là admin không
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        // Người dùng là admin, có thể tiếp tục thực hiện hành động
        return true;
    } else {
        // Người dùng không phải là admin hoặc chưa đăng nhập, chuyển hướng đến trang đăng nhập hoặc thông báo lỗi
        header("Location: ./dangnhap.php"); // Thay 'login.php' bằng đường dẫn đến trang đăng nhập của bạn
        exit; // Dừng script để ngăn không cho thực hiện thêm
    }
}
// Sử dụng function
checkAdminRole();
?>