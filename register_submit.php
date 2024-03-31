<?php
include 'database.php';

if(isset($_POST["submit"]) && $_POST["username"] != '' && $_POST["email"] != '' && $_POST["nickname"] != '' && $_POST["password"] != '') {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $nickname = $_POST["nickname"];
    $pass = $_POST["password"];
    
    // Check if email already exists
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        header('Location: dangky.php?error=Email đã tồn tại. Vui lòng sử dụng một email khác.');
        exit();
    } else {
        // Insert user into database
        $sql = "INSERT INTO user (name, email, nickname, pass, role) VALUES ('$name', '$email', '$nickname', '$pass', '0')";
        mysqli_query($conn, $sql);
        header('Location: dangnhap.php?success=Đăng ký thành công!Xin mời bạn đăng nhập.');
        exit();
    }
} else {
    header('Location: dangnhap.php');
    exit();
}
?>