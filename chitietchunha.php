
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/chitietchunha.css">
</head>

<body>
	<header>
		<nav>
			<ul>
				<li>
					<a href="index.html">Trang chủ</a>
				</li>
				<li>
					<a href="#">Quản lý tin đăng</a>
				</li>
				<li>
					<a href="#">Nạp tiền vào tài khoản</a>
				</li>
				<li>
					<a href="#">Lịch sử thanh toán</a>
				</li>
				<li>
					<a href="#">Bảng giá dịch vụ</a>
				</li>
				<li>
					<a href="#" id="btnDT">Đăng tin mới</a>
				</li>
			</ul>
		</nav>
	</header>
	<div class="Container">
	<?php
include 'database.php';
// Biến để lưu trữ ID của chủ nhà, giả sử ID này được truyền vào từ tham số GET hoặc từ nguồn dữ liệu khác
$id = $_GET['id']; 
// Truy vấn SQL để lấy thông tin của chủ nhà dựa trên ID
$sql = "SELECT * FROM user WHERE id = $id"; // Thay 'chunha' bằng tên bảng của bạn

// Thực hiện truy vấn
$result = $conn->query($sql);

// Kiểm tra xem có dữ liệu được trả về không
if ($result->num_rows > 0) {
    // Lặp qua các hàng dữ liệu và hiển thị thông tin
    while($row = $result->fetch_assoc()) {
        echo "<h1>Thông tin của chủ nhà</h1>";
        echo '<div class="info-card">';
        echo '<div id="avatarContainer">';
        echo '<label for="avatarInput" id="avatarLabel">';
        echo '<img id="avatar" src="img/' . $row["avatar"] . '" alt="Avatar">';
        echo '<input type="file" id="avatarInput" accept="image/*">';
        echo '</label>';
        echo '</div>';
        echo '<div id="infor-user">';
        echo '<p>Tên: ' . $row["name"] . '</p>';
        echo '<p>Giới tính: ' . $row["gioitinh"] . '</p>';
        echo '<p>Số điện thoại: ' . $row["sodienthoai"] . '</p>';
        echo '<p>Email: ' . $row["email"] . '</p>';
        echo '<p>Nơi ở: ' . $row["diachi"] . '</p><br></br>';
        echo '</div>';
        echo '<div class="font">';
        echo '<li><a><i class="fa-solid fa-phone"></i></a></li>';
        echo '<li><a><i class="fa-solid fa-envelope"></i></a></li>';
        echo '<li><a><i class="fa-brands fa-facebook"></i></a></li>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Không có dữ liệu";
}

// Đóng kết nối
$conn->close();
?>
		<div class="Main">
			<div class="leftMain">
				<h1>Những Bài Đăng Của Chủ Nhà</h1>
				<a href="#">Tháng này</a>
				<a href="#">Tháng trước</a>
				<a href="#">Năm nay</a>
				<a href="#">Tất cả</a>
				<div class="tin">
					<div class="NT">
						<p>Mã bài đăng: 010 <b id="maBD"></b></p>
						<img src="img/nt1.jpg" class="hinhTro">
						<p class="Name">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</p>
					</div>
					<div class="NT">
						<p>Mã bài đăng: 116<b id="maBD"></b></p>
						<img src="img/nt1_1.jpg" class="hinhTro">
						<p class="Name">Cho thuê phòng trọ giá sinh viên ở gần làng ĐH Thủ Đức</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/chitietchunha.js"></script>
</body>
</html>
