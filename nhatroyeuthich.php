
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Căn Hộ Yêu Thích</title>
	<link rel="stylesheet" href="css/canhoyeuthich.css">
</head>

<body>
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
                <?php
// Bắt đầu phiên làm việc của session
session_start();

// Include PHP code for database connection
include 'database.php';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    // Lấy ID người dùng từ session
    $userID = $_SESSION['userID'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin người dùng
    $sql = "SELECT * FROM `user` WHERE `ID`=" . $userID;
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Hiển thị tên đăng nhập và avatar
        echo '<li><p>' . $row["nickname"] . '</p></li>';
        echo "<li><a href='#' onClick='toggleMenu()'><img name='img' class='hinhdd' src='img/" . $row["avatar"] . "'></a></li>";
    } else {
        echo "Không tìm thấy thông tin người dùng.";
    }

    // Đóng kết nối sau khi sử dụng
    $conn->close();
}
    ?>
			</ul>
		</nav>
	</header>
	<div class="container">
		<div class="leftCon">
			<div class="trang">
				<a href="index.php">Trang chủ</a>/<a href="nhatroyeuthich.php">Căn hộ yêu thích</a>
			</div>
			<div class="left">;
			
			<?php
include 'database.php'; // Kết nối đến cơ sở dữ liệu

// Truy vấn lấy tất cả dữ liệu từ bảng nhatroyt
$sql1 = "SELECT nhatro_id FROM nhatroyt";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // Lặp qua mỗi nhatro_id
    while($row1 = $result1->fetch_assoc()) {
        // Lấy thông tin nhà trọ từ bảng nhatro sử dụng nhatro_id
        $stmt = $conn->prepare("SELECT * FROM nhatro WHERE status = 0 and nhatro_id = ?");
        $stmt->bind_param("i", $row1['nhatro_id']); // 'i' cho kiểu dữ liệu integer
        $stmt->execute();
        $result2 = $stmt->get_result();

        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                echo '<div class="yeuthich">';
                echo '<div class="ttYeuThich">';
                echo '  <img src="img/' . htmlspecialchars($row2['image']) . '">';
                echo '  <strong>Mã nhà trọ: <b name="ID">NT0</b>' . htmlspecialchars($row2['nhatro_id']) . '</strong><br>';
                echo '  <b name="tenTro" class="tenTro">' . htmlspecialchars($row2['tieude']) . '</b><br><br>';
                echo '  <b name="gia" class="giaThue">' . htmlspecialchars($row2['gia']) . ' </b><b class="giaThue">Triệu/tháng</b>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Không tìm thấy thông tin nhà trọ.";
        }
    }
} else {
    echo "Không có nhà trọ nào trong danh sách yêu thích.";
}

$conn->close(); // Đóng kết nối cơ sở dữ liệu
?>
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
	<footer class="footer">
		<p>&copy; 2024 Nhà trọ FPOLY. Bảo lưu mọi quyền.</p>
	</footer>
</body>
</html>
