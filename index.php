<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quản Lý Nhà Trọ</title>
<link rel="stylesheet" href="css/index.css">
</head>
<body>
<header>
    <nav>
    <img class="logo" src="img/logo của kiệt căn nhà1.jpg">
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="#">Về chúng tôi</a></li>
            <li><a href="#">Thuê nhà trọ</a></li>
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
} else {
    // Ngược lại, nếu người dùng chưa đăng nhập
    // Thực hiện kiểm tra ID và lưu vào session
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $id = $conn->real_escape_string($id);

        $sql = "SELECT * FROM `user` WHERE `ID`=" . $id;

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Lưu ID đăng nhập vào session
            $_SESSION['userID'] = $row['ID'];

            // Hiển thị các thông tin như thông thường
            echo '<li><a href="dangtin.php" id="btnDT">Đăng tin cho thuê</a></li>';
            echo '<li><p>' . $row["nickname"] . '</p></li>';
            echo "<li><a href='#' onClick='toggleMenu()'><img name='img' class='hinhdd' src='img/" . $row["avatar"] . "'></a></li>";
        } else {
            echo "Không tìm thấy dữ liệu.";
        }
    }
}
?>
        </ul>
    </nav>
</header>

<div class="menu">
    <ul id="menu">
        <li><a href="#">Quản lý tài khoản</a></li>
        <li><a href="nhatroyeuthich.php">Căn hộ yêu thích</a></li>
        <li><a href="#">Cài đặt tài khoản</a></li>
    </ul>
</div>
<div class="searchPanel">
    <input type="text" name="searchInput" class="fullAddress" placeholder="Tìm kiếm">
    <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
        <option value="" selected>Chọn tỉnh thành</option>
        <!-- Dropdown options will be populated dynamically -->
    </select>

    <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
        <option value="" selected>Chọn quận huyện</option>
        <!-- Dropdown options will be populated dynamically -->
    </select>

    <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
        <option value="" selected>Chọn phường xã</option>
        <!-- Dropdown options will be populated dynamically -->
    </select>

    <form action="search.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="city" id="thanhpho" style="display: none;">
        <input type="text" name="district" id="quan" style="display: none;">
        <input type="text" name="ward" id="phuong" style="display: none;">
        <button type="submit" name="search" id="btnTK">Tìm kiếm</button>

    </form>
    <button id="demo-1" >Tìm kiếm 2</button>
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
            <?php
            include 'database.php';
            $sql = "SELECT * FROM nhatro WHERE status = 0 limit 6 "; // Limiting to 6 results
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="nt1">';
                    echo '  <hr>';
                    echo '<a href="sanphamchitiet.php?id=' . htmlspecialchars($row["nhatro_id"]) . '">';
                    echo '<img src="img/' . htmlspecialchars($row["image"]) . '">';
                    echo "<p class='name'>" . htmlspecialchars($row['tieude']) . "</p>";
                    echo "<b class='price'>" . htmlspecialchars($row['gia']) . "</b> <span style='color: green;'>VND/tháng</span><br><br>";
                    echo "<strong class='acreage'>" . htmlspecialchars($row['dientich']) . "m<sup>2</sup></strong>";
                    echo "<p>Địa chỉ: <span class='address'>" . htmlspecialchars($row['diachi']) . "</span></p>";
                    echo '  Mô tả:';
                    echo "<p class='describe'>" . htmlspecialchars($row['mota']) . "</p>";
                    echo '</a>'; // Đóng thẻ <a> trước khi mở <button>
                    echo '<form action="addnhatroyt.php?id=' . htmlspecialchars($row["nhatro_id"]) . '" method="post">';
                    echo '<button class="themYT" type="submit" name="add">Thêm vào mục yêu thích</button>';
                    echo '<button class="themYT" style="color: #1e2c3c" type="submit" name="report">Báo Cáo Vi Phạm</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo "Không có nhà trọ nào trong cơ sở dữ liệu.";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <div class="rightCon">
        <div class="contentRight">
            <h2>Xem theo diện tích</h2>
            <a class="daugach" href="filter.php?area=20">Dưới 20m<sup>2</sup></a>
            <a class="daugach" href="filter.php?area=30">Dưới 30m<sup>2</sup></a><br><br>
            <a class="daugach" href="filter.php?area=49">Dưới 50m<sup>2</sup></a>
            <a class="daugach" href="filter.php?area=50">Trên 50m<sup>2</sup></a><br>
            <br>
            <div class="slider">
                <h2 style="text-align: center">Xem theo giá</h2>
                <input type="range" min="0" max="100000000" value="500000" class="slider-range" id="myRange" style="width:  250px">
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
<div class="chat" onClick="khungChat()">
		<img src="img/hotline.png" id="hotline">
		<img src="img/zalo-logo.png" id="zalo">
		<img src="img/mess.png" id="mess">
		<img src="img/chat.png" id="chatImg" >
	</div>
	<div class="khungChat" id="khungChat">
		<div class="headerKhungChat">
			<b>Chat với nhân viên để tư vấn</b>
			<a href="#" onClick="khungChat()">X</a>
		</div>
		<div class="messageContainer" id="messageContainer"></div>
		<div class="bottomKhungChat">
			<input type="text" id="inputMessage" placeholder="Nhập tin nhắn...">
			<button onClick="sendMessage(event)">Gửi</button>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="js/index.js"></script>
<script src="js/alert.js"></script>

</body>
</html>
