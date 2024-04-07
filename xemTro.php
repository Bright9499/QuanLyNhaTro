<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="css/xemTro.css">
</head>

<body>
	<form>
	<header>
		<nav>
		<img class="logo" src="img/logo của kiệt căn nhà1.jpg">
			<ul>
				<li>
					<a href="index.php">Trang chủ</a>
				</li>
				<li>
					<a href="#">Về chúng tôi</a>
				</li>
				<li>
					<a href="#">Thuê nhà trọ</a>
				</li>
				<li>
					<a href="dangtin.php" id="btnDT">Đăng tin cho thuê</a>
				</li>
				<li>
					<a href="dangnhap.php" id="btnDN">Đăng nhập</a>
				</li>
				<li>
					<a href="#" onClick="toggleMenu()">
						<img name="img" class="hinhdd" src="img/IMG_2332.JPG">
					</a>
				</li>
			</ul>
		</nav>
	</header>
	<div class="container">
		<div class="leftCon">
			<div class="trang">
				<a href="index..php">Trang chủ</a>/<a href="#">Đặt lịch xem trọ</a>
			</div>
			<div class="left">
				 <h2>Phần khung giờ xem trọ - Lịch hẹn đã đặt</h2>
				<h3>Bạn có thể đặt lịch hẹn từ 10h-20h</h3>
				<table id="appointmentTable">
				<tr>
					<th>Ngày</th>
					<th>Giờ</th>
					<th>Tên người đặt</th>
				</tr>
				<tr>
					<td>30/03/2024</td>
					<td>09:00</td>
					<td>Nguyễn Văn A</td>
				</tr>
				<tr>
					<td>31/03/2024</td>
					<td>14:30</td>
					<td>Nguyễn Thị B</td>
				</tr>
				<!-- Thêm các dòng khác tương tự cho các lịch hẹn khác -->
				</table>

				<h2>Thêm lịch hẹn mới</h2>
				<form>
					<label for="date">Ngày:</label>
					<input type="text" id="date" name="date"><span id="dateError" class="error"></span><br><br>
					<label for="time">Giờ:</label>
					<input type="text" id="time" name="time"><span id="timeError" class="error"></span><br><br>
					<label for="name">Tên người đặt:</label>
					<input type="text" id="name" name="name" ><span id="nameError" class="error"></span><br><br>
					<input type="button" value="Đặt lịch hẹn" onclick="addAppointment()">
				</form>
			</div>
		</div>
		<div class="rightCon">
			<div class="topRight">
				<br>
				<h1>Bài đăng mới nhất</h1>
				<hr style="width: 95%">
				<div class="NT">
					<img src="img/awkward-living-room-layout-ideas-768x461.jpg" name="hinh">
					<b class="ten" name="tenTro">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b><br>
					<div class="NT1">
						<b class="gia"  ><strong name="giaThue">2</strong> triệu/tháng</b>
						<b class="ngay" name="ngay">10/09/2004</b>
					</div>
				</div>
				<hr style="width: 95%">
				<div class="NT">
					<img src="img/awkward-living-room-layout-ideas-768x461.jpg" name="hinh">
					<b class="ten" name="tenTro">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b><br>
					<div class="NT1">
						<b class="gia"  ><strong name="giaThue">2</strong> triệu/tháng</b>
						<b class="ngay" name="ngay">10/09/2004</b>
					</div>
				</div>
				<hr style="width: 95%">
				<div class="NT">
					<img src="img/awkward-living-room-layout-ideas-768x461.jpg" name="hinh">
					<b class="ten" name="tenTro">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b><br>
					<div class="NT1">
						<b class="gia"  ><strong name="giaThue">2</strong> triệu/tháng</b>
						<b class="ngay" name="ngay">10/09/2004</b>
					</div>
				</div>
				<hr style="width: 95%">
				<div class="NT">
					<img src="img/awkward-living-room-layout-ideas-768x461.jpg" name="hinh">
					<b class="ten" name="tenTro">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b><br>
					<div class="NT1">
						<b class="gia"  ><strong name="giaThue">2</strong> triệu/tháng</b>
						<b class="ngay" name="ngay">10/09/2004</b>
					</div>
				</div>
				<hr style="width: 95%">
				<div class="NT">
					<img src="img/awkward-living-room-layout-ideas-768x461.jpg" name="hinh">
					<b class="ten" name="tenTro">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b><br>
					<div class="NT1">
						<b class="gia"  ><strong name="giaThue">2</strong> triệu/tháng</b>
						<b class="ngay" name="ngay">10/09/2004</b>
					</div>
				</div>
				<hr style="width: 95%">
				<div class="NT">
					<img src="img/awkward-living-room-layout-ideas-768x461.jpg" name="hinh">
					<b class="ten" name="tenTro">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b><br>
					<div class="NT1">
						<b class="gia"  ><strong name="giaThue">2</strong> triệu/tháng</b>
						<b class="ngay" name="ngay">10/09/2004</b>
					</div>
				</div>
				<hr style="width: 95%">
				<div class="NT">
					<img src="img/awkward-living-room-layout-ideas-768x461.jpg" name="hinh">
					<b class="ten" name="tenTro">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</b><br>
					<div class="NT1">
						<b class="gia"  ><strong name="giaThue">2</strong> triệu/tháng</b>
						<b class="ngay" name="ngay">10/09/2004</b>
					</div>
				</div>
			</div>
			
			<div class="bottomRight">
				<br>
				<h2 style="text-align: center">Có thể bạn quan tâm</h2>
				<a href="mauhopdong.php">> Mẫu hợp đồng cho thuê nhà trọ</a>
				<hr style="width: 95%">
				<a href="luaDao.php">> Cẩn thận cách kiểu lừa đảo khi thuê nhà trọ</a>
				<hr style="width: 95%">
				<a href="#">> Kinh nghiệm thuê phòng trọ cho sinh viên</a>
				<hr style="width: 95%">				
				<a href="mauhopdong.php">> Hướng dẫn chấm dứt hợp đồng</a>
				<hr style="width: 95%">
			</div>
		</div>
	</div>
	</form>
	<footer class="footer">
		<p>&copy; 2024 Nhà trọ FPOLY. Bảo lưu mọi quyền.</p>
	</footer>
	<script src="js/xemTro.js"></script>
</body>
</html>
