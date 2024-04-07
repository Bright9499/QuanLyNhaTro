<?php
$servername = 'localhost:3308';
$username = 'root';
$password = '';
$database = 'project';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
} else {
    mysqli_query($conn,"SET NAMES 'utf8'");
}
?>
