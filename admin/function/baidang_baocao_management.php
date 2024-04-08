<?php
global $conn;
include 'authen.php';
include '../../database.php';

checkAdminRole();

$nha_tro_id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'approve') {
    error_log("Nha Tro ID: " . $nha_tro_id);
    $stmt = $conn->prepare("UPDATE nhatro SET status = 0 where nhatro_id = ?");
    $stmt->bind_param("s", $nha_tro_id);
    $stmt->execute();
    header('Location: ../html/quanlibaidang.php?success=APPROVE_SUCCESS');
    exit();

} elseif ($type == 'deny') {
    error_log("Nha Tro ID: " . $nha_tro_id);

    $stmt = $conn->prepare("UPDATE nhatro SET status = 1 where nhatro_id = ?");
    $stmt->bind_param("s", $nha_tro_id);
    $stmt->execute();
    header('Location: ../html/quanlibaidang.php?success=DENY_SUCCESS&type=create');
    exit();
} else {
    header('Location: ./index.php?error=Không tìm thấy hành động.');
    exit();
}
?>