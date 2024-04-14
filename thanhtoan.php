<?php
include './function/authen.php';
// Sử dụng function
checkAdminRole();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Nhà Trọ</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700'>
    <link rel="stylesheet" href="./css/thanhtoan.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>

<?php
include 'database.php';

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `nhatro` WHERE status = 0 AND `nhatro_id`=" . $_GET['id'];
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '
<div class="model">
    <div class="room" style="  width: 50%;
  height: 100%;
  background: url(img/' . htmlspecialchars($row["image"]) . ') no-repeat center center;
  background-size: cover;
  display: inline-block;
  vertical-align: top;
  position: relative;">
      <div class="text-cover">
        <h1>Danns House</h1>
        <p class="price"> ' . htmlspecialchars($row["gia"]) . ' <span>VND</span> / 1 Tháng</p>
        <hr>
        <p>' . htmlspecialchars($row["tieude"]) . '</p>
        <p>' . htmlspecialchars($row["mota"]) . '</p>
      </div>
    </div><div class="payment">
      <div class="receipt-box">
        <h3>Tóm Tắt Thanh Toán</h3>
        <table class="table">
          <tr>
            <td>1 tháng</td>
            <td>' . htmlspecialchars($row["gia"]) . ' VND</td>
          </tr>
          <tr>
            <td>Mã giảm giá</td>
            <td>0 VND</td>
          </tr>
          <tr>
            <td>Thuế</td>
            <td>0 VND</td>
          </tr>
          <tfoot>
            <tr>
              <td>Tổng</td>
              <td>' . htmlspecialchars($row["gia"]) . ' VND</td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="payment-info">
        <h3>Thông Tin Thanh Toán</h3>
        <form action="./function/thanhtoan.php" method="POST">
        <label>Tên</label>
        <input type="text" name="name" >
        <label>Credit Card Number</label>
        <input type="text" name="creditCardNumber">
        <input type="hidden" name="maNguoiDang" value="' . $row["MaNg_dang"] . '">
        <input type="hidden" name="nhaTroId" value="' . $row["nhatro_id"] . '">
        <input type="hidden" name="gia" value="' . $row["gia"] . '">
        <br><br>
        <input class="btn" type="submit" value="Thanh Toán">
      </form>
      </div>
    </div>
  </div>
';
    }
} else {
    echo 'Không có thanh toán nào được thực hiện';
}

?>


</body>
<!-- partial -->
<script src="./js/thanhtoan.js"></script>

</body>
</html>
