<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="css/quanly.css">
</head>

<body>
	<header>
		<nav>
			<ul>
				<li>
					<a href="index.php">Trang chủ</a>
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
		<div class="User">
			<div class="leftUser">
				<div id="avatarContainer">

					<label for="avatarInput" id="avatarLabel">
						<img id="avatar" src="img/IMG_2332.JPG" alt="Avatar">
						<input type="file" id="avatarInput" accept="image/*">
					</label>
				</div>
			<h4>Mã người dùng: <b id="ID">-</b><br></h4>
			<h4>Tài khoản chính: <b class="sodu">-</b></h4>
			</div>
			<div class="rightUser">
				<a href="#" class="btnSettingUser"><img src="img/settings.256x256.png" style="width: 40px"></a>
				<br><br><br><br><br><br><br><br><br>
				<a href="#" class="btnNap">Nạp tiền</a>
			</div>
		</div>
		<div class="Main">
			<div class="leftMain">
				<h1>Quản lý bài đăng</h1>
				<a href="#">Tháng này</a>
				<a href="#">Tháng trước</a>
				<a href="#">Năm nay</a>
				<a href="#">Tất cả</a>
				<div class="tin">
					<div class="NT">
						<p>Mã bài đăng: <b id="maBD">-</b></p>
						<img src="img/nt1.jpg" class="hinhTro">
						<b class="Name">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b>
					</div>
					<div class="NT"></div>
					<div class="NT"></div>
					<div class="NT"></div>
				</div>
			</div>
			<div class="righMain">
			
			</div>
		</div>
	</div>
	<script src="js/quanly.js"></script>
</body>
</html>
