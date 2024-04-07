<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../dangnhap.php"); // Chuyển hướng đến trang đăng nhập sau khi đăng xuất
exit;
?>