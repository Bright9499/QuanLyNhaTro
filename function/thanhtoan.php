<?php
global $conn;
include '../function/authen.php';
include '../database.php';

checkAdminRole();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$maNguoiDang = $_POST["maNguoiDang"];
$nha_tro_id = $_POST["nhaTroId"];
$ma_nguoi_gd = $_SESSION['id'];
$creditCardNumber = $_POST["creditCardNumber"];
$tong_tien = $_POST["gia"];


$sql = "SELECT * FROM `nhatro` WHERE status = 0 AND `nhatro_id`=" . $nha_tro_id;
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {

    error_log("Nha Tro ID: " . $nha_tro_id);

    $stmt = $conn->prepare("INSERT INTO giao_dich (ma_phong, ma_nguoi_gd, MaNg_dang,tong_tien,creditCardNumber) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nha_tro_id, $ma_nguoi_gd, $maNguoiDang, $tong_tien, $creditCardNumber);
    $stmt->execute();
    header('Location: ../index.php?success=GIAO_DICH_THANH_CONG&type=create');
    exit();

} else {
    header('Location: ../index.php?fail=THANH_TOAN_THAT_BAI');
}

?>