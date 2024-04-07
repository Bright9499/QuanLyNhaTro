<?php
// Bắt đầu phiên làm việc của session
session_start();
// Include PHP code for database connection
include 'database.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sản Phẩm Chi Tiết</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="css/sanphamchitiet.css">
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
    <article class="left-section">
<?php
include 'database.php';
$sql = "SELECT * FROM `nhatro` WHERE status = 0 AND `nhatro_id`=" . $_GET['id'];
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<img id="myImage" class="myImage" src="img/' . $row["image"] . '">';
    echo '<div class="page-header">';
    echo '<h1>' . $row["tieude"] . '</h1>';
    echo '<div>';
    echo '<a class="title1"><i class="fa-solid fa-location-dot"></i> Địa chỉ: ' . $row["diachi"] . '</a>';
    echo '</div>';
    echo '<div class="post-attributes">';
    echo '<div class="gia"><i class="fa-solid fa-tag"></i><span>5.7 triệu/tháng</span></div>';
    echo '<div class="rong"><span>' . $row["dientich"] . ' <sup>m2</sup></span></div>';
    echo '</div>';
    echo '<section class="content">';
    echo '<div class="section-header"><h2 class="section-title">Thông tin mô tả</h2></div>';
    echo '<div class="section-content">';
    echo '<p>' . $row["mota"] . '</p>';
    echo '<p>Lịch Xem Trọ: ' . $row["lichxem"] . '</p>';
    echo '</div>';
    echo '</section>';
    echo '<section class="map">';
    echo '<div class="section-header"><h3 class="section-title">Bản đồ</h3><address class="section-description">Địa chỉ: ' . $row["diachi"] . '</address></div>';
    echo '<div id="map" style="width:800px;height:900px;">';
    echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6031914290797!2d105.84350747544983!3d21.048557580605717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb164d4c579%3A0xb94dd4378f0cdc5c!2zNDQgUC4gTmdoxKlhIETFqW5nLCBQaMO6YyB4w6EsIEJhIMSQw6xuaCwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1712228964153!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    echo '</div>';
}
?>

 <section class="Similar">
          <div class="page-similar">
            <h2>Có thể bạn sẽ thích</h2>
            <hr />
          </div>
          <?php

// Include file kết nối đến cơ sở dữ liệu
include 'database.php';

// Kiểm tra xem có dữ liệu tìm kiếm trong session hay không
if(isset($_SESSION['search'])) {
    // Lấy dữ liệu tìm kiếm từ session
    $searchData = $_SESSION['search'];
    
    // Lấy thành phố, quận/huyện, và phường/xã từ dữ liệu tìm kiếm
    $city = isset($searchData['city']) ? $searchData['city'] : '';
    $district = isset($searchData['district']) ? $searchData['district'] : '';
    $ward = isset($searchData['ward']) ? $searchData['ward'] : '';
    
    // Xây dựng câu truy vấn SQL dựa trên dữ liệu tìm kiếm
    $sql = "SELECT * FROM `nhatro` WHERE 1=1 and status = 0 ";
    
    // Thêm điều kiện cho thành phố (nếu có)
    if (!empty($city) && $city != "Chọn tỉnh thành") {
        $city = $conn->real_escape_string($city);
        $sql .= " AND tinh LIKE '%" . $city . "%'";
    }

    // Thêm điều kiện cho quận/huyện (nếu có)
    if (!empty($district) && $district != "Chọn quận huyện") {
        $district = $conn->real_escape_string($district);
        $sql .= " AND quan LIKE '%" . $district . "%'";
    }

    // Thêm điều kiện cho phường/xã (nếu có)
    if (!empty($ward) && $ward != "Chọn phường xã") {
        $ward = $conn->real_escape_string($ward);
        $sql .= " AND phuong LIKE '%" . $ward . "%'";
    }

    // Thực hiện truy vấn
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu cho mỗi dòng kết quả
        while ($row = $result->fetch_assoc()) {
            echo '<div class="clearfix">';
            echo '  <img src="img/' . htmlspecialchars($row["image"]) . '">';
            echo '    <div class="roww">';
            echo '    <div class="post-title">';
            echo '     <a href="sanphamchitiet.php?id=' . htmlspecialchars($row["nhatro_id"]) . '">' . htmlspecialchars($row['tieude']) . '</a>';
            echo ' </div>';
            echo ' <div class="post-attributes">';
            echo '  <div class="gia"><i class="fa-solid fa-tag"></i>' . htmlspecialchars($row['gia']) . '</div>';
            echo '  <div class="rong"><a>' . htmlspecialchars($row['dientich']) . '<sup>m2</sup></a></div>'; 
            echo '  </div>';
            echo ' <div class="section-content2">';
            echo '  <p>'. htmlspecialchars($row['mota']) .'</p>';
            echo '   </div>';
            echo '</div>';  
            echo '</div>';
        }
    } else {
        echo "Không có nhà trọ nào phù hợp với tiêu chí tìm kiếm.";
    }
    $result->close();
} else {
    // Nếu không có dữ liệu tìm kiếm trong session, hiển thị thông báo tương ứng
    echo "Không có dữ liệu tìm kiếm.";
}
// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>


    </section>  
</div>
</article>
<div class="box-left">
<article class='left-section1'>;
<?php
include 'database.php';          

$sql = "SELECT user.* FROM user INNER JOIN nhatro ON user.ID = nhatro.MaNg_dang WHERE `nhatro_id`= ". $_GET['id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='box-header'>";
        echo "<div class='author-aside'>";
        echo "<figure class='author-avatar'>";
        echo "<img src='img/tien1.jpg' alt='Author Avatar'>";
        echo "</figure>";
        echo "<h4 class='author-name'>" . $row["name"] . "</h4>";
        echo "</div>";
        echo "<table class='author-contact'>";
        echo "<tr>";
        echo "<td class='contact-label'><i class='fa-solid fa-phone'></i></td>";
        echo "<td class='contact-info'>" . $row["sodienthoai"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='contact-label'><i class='fa-solid fa-envelope'></i></td>";
        echo "<td class='contact-info'>" . $row["email"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='contact-label'><i class='fa-brands fa-facebook'></i></td>";
        echo '<td><a href="' . $row["facebook"] . '">Facebook</a></td>'; 
        echo "</tr>";
        echo "<tr>";
        echo '<td colspan="2"><a href="chitietchunha.php?id=' . $row["ID"] . '">Click here</a> để xem thông tin chủ căn hộ</td>';
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }
} else {
    echo "Không có dữ liệu";
}

// Đóng kết nối sau khi đã hoàn tất tất cả các truy vấn
$conn->close();
?>


 </article>;
          <div class="box-right">
            <h3 class="highlighted-news-title">Tin nổi bật</h3>
            <ul class="highlighted-news-list">
              <li class="highlighted-news-item">
                <img src="img/1hp8ogn60-83923t_1710769215.jpg" alt="Author Avatar">
                <a class="title2"> Studio full nội thất Q1 ngay mặt tiền đường </a>
              </li>
              <li class="highlighted-news-item">
                <img src="img/z2095121778780-339d6834a1ac779bfc0aed8e2bb4e66b_1691035301.jpg" alt="Author Avatar">
                <a class="title2">Cho thuê phòng trọ tại Phường 3, Quận Gò Vấp</a>
              </li>
              <li class="highlighted-news-item">
                <img src="img/img-20240318-201454_1710767844.jpg" alt="Author Avatar">
                <a class="title2">Phòng thoáng mát, mới xây ngay Phan Xích Long Phú Nhuận</a>
              </li>
              <li class="highlighted-news-item">
                <img src="img/img-20240318-201454_1710767844.jpg" alt="Author Avatar">
                <a class="title2">Studio full nội thất, rộng rãi, ở được 3-4 người vô tư ngay trục đường phạm văn đồng</a>
              </li>
              <li class="highlighted-news-item">
                <img src="img/img-20240318-201454_1710767844.jpg" alt="Author Avatar">
                <a class="title2">Cho thuê nguyên tầng, DT 40m2, giá 5tr/tháng, đường Phan Đăng Lưu</a>
              </li>

            </ul>
          </div>
</div>
</div>
<footer class="footer">
		<p>&copy; 2024 Nhà trọ FPOLY. Bảo lưu mọi quyền.</p>
	</footer>
        <script src="js/sanphamchitiet.js">
        </script>
</body>
</html>