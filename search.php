<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Real Estate Rental Platform</title>
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
            <?php
// Bắt đầu phiên làm việc của session
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    // Include PHP code for user-related information
    include 'database.php';

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
    $conn->close();
} else {
    // Nếu không có ID người dùng trong session, có thể chuyển hướng người dùng đến trang đăng nhập
    header("Location: login.php");
    exit(); // Đảm bảo kết thúc kịch bản
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
<div class="container">
    <div class="leftCon">
        <div class="arrange">
            Sắp xếp: <a href="#">Mặc định</a>
            <a href="#">Mới nhất</a>
            <a href="#">Có video</a>
        </div>
        <div class="content">
<?php
// Kết nối đến cơ sở dữ liệu
include 'database.php';

if(isset($_POST['search'])) {
    // Lấy dữ liệu từ biểu mẫu tìm kiếm
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $ward = isset($_POST['ward']) ? $_POST['ward'] : '';
    
     // Lưu dữ liệu vào session
     $_SESSION['search'] = array(
        'city' => $city,
        'district' => $district,
        'ward' => $ward
    );
    // Xây dựng câu truy vấn SQL dựa trên dữ liệu từ biểu mẫu
    $sql = "SELECT * FROM `nhatro` WHERE 1=1";

    // Thêm điều kiện cho thành phố (nếu có)
    if (!empty($city)&&$city!="Chọn tỉnh thành") {
        $city = $conn->real_escape_string($city);
        $sql .= " AND tinh LIKE '%" . $city . "%'";
    }

    // Thêm điều kiện cho quận/huyện (nếu có)
    if (!empty($district)&& $district!="Chọn quận huyện") {
        $district = $conn->real_escape_string($district);
        $sql .= " AND quan LIKE '%" . $district . "%'";
    }
    
    // Thêm điều kiện cho phường/xã (nếu có)
    if (!empty($ward)&& $ward!="Chọn phường xã") {
        $ward = $conn->real_escape_string($ward);
        $sql .= " AND phuong LIKE '%" . $ward . "%'";
    }

    // Thực hiện truy vấn
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Hiển thị dữ liệu cho mỗi dòng kết quả
            while($row = $result->fetch_assoc()) {
                echo '<div class="nt1">';
                echo '  <hr>';
                echo '<a href="sanphamchitiet.php?id=' . htmlspecialchars($row["nhatro_id"]) . '">';
                echo '<img src="img/' . htmlspecialchars($row["image"]) . '">';
                echo "<p class='Name'>" . htmlspecialchars($row['tieude']) . "</p>";
                echo "<b class='Price'>" . htmlspecialchars($row['gia']) . "</b> <a style='color: green; font-weight:16 '>VND/tháng</a><strong><strong class='acreage'>" . htmlspecialchars($row['dientich']) . "</strong>m<sup>2</sup></strong>";
                echo "<p>Địa chỉ: <a class='address'>" . htmlspecialchars($row['diachi']) . "</a></p>";
                echo '  Mô tả:';
                echo "<p class='describe'>" . htmlspecialchars($row['mota']) . "</p>";
                echo '<a class="themYT" href="#">Thêm vào mục yêu thích</a>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "Không có nhà trọ nào phù hợp với tiêu chí tìm kiếm.";
        }
        $result->close();
    } else {
        echo "Đã xảy ra lỗi trong quá trình thực hiện truy vấn.";
    }
    // Đóng kết nối
    $conn->close();
}
?>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>