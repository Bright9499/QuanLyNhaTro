<?php
session_start();
session_destroy();
include 'database.php';
if(isset($_POST["dangtin"])){
    $city = $_POST["city"];
    $district = $_POST["district"];
    $ward = $_POST["ward"];
    $sonha = $_POST["sonha"];
    $diachi = $_POST["diachi"];
    $loainha = $_POST["loainha"];
    $tieude = $_POST["tieude"];
    $moTa = $_POST["mota"];
    $name = $_POST["lienhe"];
    $sdt = $_POST["sodt"];
    $giaThue = $_POST["giathue"];
    $dienTich = $_POST["dientich"];
    $doituong = $_POST["doituong"];
    $imagepath=basename($_FILES["image"]["name"]);
    $target_dir = "img/";
    $target_file = $target_dir .$imagepath ;
	$lichxem = $_POST["lichxem"];

    if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
         echo '<script>alert("Hình đã được upload")</script>';
    }else{
        echo '<script>alert("Hình không được upload")</script>';
    }
    $sql = "INSERT INTO nhatro (tinh,quan,phuong, sonhavaduong, diachi, loainha, tieude, mota, thongtinlienhe, sodt, gia, dientich, doituongchothue, image,video,lichxem) 
        VALUES ('$city', '$district', '$ward', '$sonha', '$diachi', '$loainha', '$tieude', '$moTa', '$name', '$sdt', '$giaThue', '$dienTich', '$doituong', '$imagepath','', $lichxem)";
    mysqli_query($conn,$sql);
    echo '<script>alert("Đã đăng tin thành công")</script>';
    } 
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="css/dangtin.css">
</head>

<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
	<header>
		<nav>
		<img class="logo" src="img/logo của kiệt căn nhà1.jpg">
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
		<div class="trang">
			<a href="index.php">NhatroFPOLY.vn</a>/<a href="quanly.php">Quản lý</a>/<a href="dangtin.php">Đăng tin</a>
		</div>
		<h1>Đăng tin cho thuê</h1>
		<hr style="width: 100%">
		<div class="dienForm">
			<div class="left">
				<h2>Địa chỉ cho thuê</h2>
				<div class="address">
					<div class="provinces">
						<b>Tỉnh/Thành phố</b><br>
						<select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
						<option value="" selected>Chọn tỉnh thành</option>           
						</select>
					</div>

					<div class="districts">
						<b>Quận/Huyện</b><br>
						<select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
						<option value="" selected>Chọn quận huyện</option>
						</select>
					</div>

					<div class="wards">
						<b>Phường/Xã</b><br>
						<select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
						<option value="" selected>Chọn phường xã</option>
						</select>
					</div>
				</div>
				<input type="text" name="city" id="thanhpho" style="display: none;">
				<input type="text" name="district" id="quan" style="display: none;">
				<input type="text" name="ward" id="phuong" style="display: none;">
				<br>
				<b>Số nhà & đường</b><br>
				<input type="text" class="txtAddress">
				<br><br>
				<b>Địa chỉ chính xác</b><br>
				<input  type="text" name="diachi" class="fullAddress"><br><br>
				<h1>Thông tin mô tả</h1>
				<b>Loại chuyên mục</b><br>
				<select class="optionLoai">
					<option>-- Chọn loại chuyên mục --</option>
					<option>Phòng trọ, nhà trọ</option>
					<option>Thuê nhà nguyên căn</option>
				</select><br><br>
				<b>Tiêu đề</b><br>
				<input type="text" class="txtTitle"  name="tieude"><br><br>
				<b>Nội dung mô tả</b><br>
				<input type="text" class="txtMoTa" name="mota"><br><br>
				<b>Thông tin liên hệ</b><br>
				<input type="text" class="txtName" name="lienhe"><br><br>
				<b>Số điện thoại</b><br>
				<input type="text" class="txtSDT" name="sodt"><br><br>
				<b>Lịch xem trọ:</b><br>
				<input type="text" class="txtSDT" name="lichxem"><br><br>
				<b>Giá cho thuê</b><br>
				<input type="text" class="txtGiaThue" name="giathue"><select class="optionThue"><option>Đồng/tháng</option><option>Đồng/m<sup>2</sup>/tháng</option></select><br><br>
				<b>Diện tích</b><br>
				<input type="number" class="txtDienTich" name="dientich"><input type="text" disabled placeholder="m^2" class="mvuong"><br><br>
				<b>Đối tượng cho thuê</b><br>
				<select class="optionDT" name="doituong">
					<option>-- Tất cả --</option>
					<option>Nam</option>
					<option>Nữ</option>
				</select><br>
				<h1>Hình ảnh</h1>
				Cập nhật hình ảnh rõ ràng sẽ cho thuê nhanh hơn<br>
				<br>
				<input type="file" class="fileImg" name="image"><br>
				<h1>Video</h1>
				<b>Video link(Youtube)</b><br>
				<input type="text" class="txtLink"><br><br>
				<b>Hoặc upload video từ máy bạn</b><br>
				<input type="file" class="fileVideo"><br><br><br>
				<input type="submit" name="dangtin" id= "btn" class="btnDang" value="Đăng tin">
			</div>
			<div class="right">
				<div class="LuuY">
					<h1>Lưu ý đăng tin</h1>
					<li>Nội dung phải viết bằng tiếng Việt có dấu</li>
					<li>Tiêu đề tin không dài quá 100 kí tự</li>
					<li>Các bạn nên điền đầy đủ thông tin vào các mục để tin đăng có hiệu quả hơn.</li>
					<li>Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon tới đúng vị trí của tin rao.</li>
					<li>Tin đăng có hình ảnh rõ ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh chóng!</li>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<p>&copy; 2024 Nhà trọ FPOLY. Bảo lưu mọi quyền.</p>
	</footer>
	</form>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
	<script src="js/dangtin.js"></script>
</body>
</html>
