
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<form>
	<header>
		<nav>
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
				<?php
				include 'database.php';
				$sql = "SELECT * FROM `user` WHERE `ID`=" . $_GET['id'];
				$result = $conn->query($sql);

				if ($result && $result->num_rows > 0) {
					$row = $result->fetch_assoc();
					echo' <li>';
					echo '<a href="dangtin.php" id="btnDT">Đăng tin cho thuê</a>';
					echo"</li>";
					echo' <li>';
					echo '<p> Xin chào: ' . $row["name"] . '</p>';;
					echo"</li>";
				echo "<li>";
					echo ' <a href="#" onClick="toggleMenu()"> ';
					echo '	<img name="img" class="hinhdd" src="img/' . $row["avatar"] . '">';
					echo"</a>";
				echo "</li>";
				}
				?>
			</ul>
		</nav>
	</header>
	<div class="menu">
		<ul id="menu">
			<li><a href="#">Quản lý tài khoản</a></li>
			<li><a href="canhoyeuthich.php">Căn hộ yêu thích</a></li>
			<li><a href="#">Cài đặt tài khoản</a></li>
		</ul>	
	</div>
	<div class="searchPanel">
		<input type="text" name="searchInput" placeholder="Tìm kiếm">
		<select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
		<option value="" selected>Chọn tỉnh thành</option>           
		</select>

		<select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
		<option value="" selected>Chọn quận huyện</option>
		</select>

		<select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
		<option value="" selected>Chọn phường xã</option>
		</select>
		<a href="#" id="btnTK">Tìm kiếm</a>
	</div>
	<div class="lb1">
		<h1>Nhà cho thuê ở khu vực Hồ Chí Minh - Sài Gòn</h1>
		<hr style="width: 180px;background: #FF9300; float: left; height: 5px;margin-top: -15px; border: none;">
	</div>
	<div class="container">
		<div class="leftCon">
			<div class="arrange">			
				Sắp xếp: <a href="#">Mặc định</a>
				<a href="#">Mới nhất</a>
				<a href="#">Có video</a>
			</div>
			<div class="content">
				<div class="nt1">
					<hr>
					<a href="sanphamchitiet.php">
					<img src="img/nt1.jpg">
					<p class="Name">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</p>
					<b class="Price">2.4</b> <a style="color: green; font-weight: 14">triệu/tháng</a><strong><strong class="acreage">28</strong>m<sup>2</sup></strong>
					<p>Địa chỉ: <a class="address">97/02 Đường Đông Hưng Thuận 5, Phường Đông Hưng Thuận, Quận 12, Hồ Chí Minh</a></p>
					Mô tả:
					<p class="describe">Cho thuê phòng ở phường Đông Hưng Thuận, Quận 12<br>
						Gần trường fPT, CVPMQT, KDC AN SƯƠNG<br>
						Nội thất: Kệ bếp, gác</p>
						<a class="themYT" href="#">Thêm vào mục yêu thích</a>
					</a>
					
				</div>
				<div class="nt1">
					<hr>
					<a href="sanphamchitiet.php">
					<img src="img/nt1.jpg">
					<p class="Name">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</p>
					<b class="Price">2.4</b> <a style="color: green; font-weight:14 ">triệu/tháng</a><strong><strong class="acreage">28</strong>m<sup>2</sup></strong>
					<p>Địa chỉ: <a class="address">97/02 Đường Đông Hưng Thuận 5, Phường Đông Hưng Thuận, Quận 12, Hồ Chí Minh</a></p>
					Mô tả:
					<p class="describe">Cho thuê phòng ở phường Đông Hưng Thuận, Quận 12<br>
						Gần trường fPT, CVPMQT, KDC AN SƯƠNG<br>
						Nội thất: Kệ bếp, gác</p>
						<a class="themYT" href="#">Thêm vào mục yêu thích</a>
					</a>
					
				</div>
				<div class="nt1">
					<hr>
					<a href="sanphamchitiet.php">
					<img src="img/nt1.jpg">
					<p class="Name">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</p>
					<b class="Price">2.4</b> <a style="color: green; font-weight:14 ">triệu/tháng</a><strong><strong class="acreage">28</strong>m<sup>2</sup></strong>
					<p>Địa chỉ: <a class="address">97/02 Đường Đông Hưng Thuận 5, Phường Đông Hưng Thuận, Quận 12, Hồ Chí Minh</a></p>
					Mô tả:
					<p class="describe">Cho thuê phòng ở phường Đông Hưng Thuận, Quận 12<br>
						Gần trường fPT, CVPMQT, KDC AN SƯƠNG<br>
						Nội thất: Kệ bếp, gác</p>
						<a class="themYT" href="#">Thêm vào mục yêu thích</a>
					</a>
					
				</div>
				<div class="nt1">
					<hr>
					<a href="sanphamchitiet.php">
					<img src="img/nt1.jpg">
					<p class="Name">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</p>
					<b class="Price">2.4</b> <a style="color: green; font-weight:14 ">triệu/tháng</a><strong><strong class="acreage">28</strong>m<sup>2</sup></strong>
					<p>Địa chỉ: <a class="address">97/02 Đường Đông Hưng Thuận 5, Phường Đông Hưng Thuận, Quận 12, Hồ Chí Minh</a></p>
					Mô tả:
					<p class="describe">Cho thuê phòng ở phường Đông Hưng Thuận, Quận 12<br>
						Gần trường fPT, CVPMQT, KDC AN SƯƠNG<br>
						Nội thất: Kệ bếp, gác</p>
						<a class="themYT" href="#">Thêm vào mục yêu thích</a>
					</a>
					
				</div>
				<div class="nt1">
					<hr>
					<a href="sanphamchitiet.php">
					<img src="img/nt1.jpg">
					<p class="Name">Cho thuê phòng trọ giá sinh viên gần CVPMQT quận 12</p>
					<b class="Price">2.4</b> <a style="color: green; font-weight: 14">triệu/tháng</a><strong><strong class="acreage">28</strong>m<sup>2</sup></strong>
					<p>Địa chỉ: <a class="address">97/02 Đường Đông Hưng Thuận 5, Phường Đông Hưng Thuận, Quận 12, Hồ Chí Minh</a></p>
					Mô tả:
					<p class="describe">Cho thuê phòng ở phường Đông Hưng Thuận, Quận 12<br>
						Gần trường fPT, CVPMQT, KDC AN SƯƠNG<br>
						Nội thất: Kệ bếp, gác</p>
						<a class="themYT" href="#">Thêm vào mục yêu thích</a>
					</a>
					
				</div>
			</div>
		</div>
		<div class="rightCon">
			<div class="contentRight">
				<h2>Xem theo diện tích</h2>
				<a class="daugach">>Dưới 20m<sup>2</sup></a><a class="daugach">>Dưới 30m<sup>2</sup></a><br><br>
				<a class="daugach">>Dưới 40m<sup>2</sup></a><a class="daugach">>Trên 50m<sup>2</sup></a><br>
				<br>
				<div class="slider">
					<h2 style="text-align: center">Xem theo giá</h2>
					<input type="range" min="0" max="10000" value="50" class="slider-range" id="myRange" style="width:  250px">
					<p>Giá trị: <span id="value"></span></p>
				</div>
			</div>
			<div class="middleRight">
			<br>
			<h2>Xem theo tiện ích xung quanh</h2>
				<div class="checkboxContainer">
					<label class="checkboxLabel">
					<input type="checkbox" name="myCheckbox1">
					<span>Gần siêu thị</span>
					</label>
					<label class="checkboxLabel">
					<input type="checkbox" name="myCheckbox2">
					<span>Gần chợ</span>
					</label>
					<label class="checkboxLabel">
					<input type="checkbox" name="myCheckbox3">
					<span>Gần trường học</span>
					</label>
					<label class="checkboxLabel">
					<input type="checkbox" name="myCheckbox4">
					<span>Gần bệnh viện</span>
					</label>
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
	<footer class="footer">
		<p>&copy; 2024 Nhà trọ FPOLY. Bảo lưu mọi quyền.</p>
	</footer>
	</form>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>
