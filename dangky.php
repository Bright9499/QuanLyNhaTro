<?php
    if(isset($_GET['success'])) {
      echo " <p>THÔNG BÁO</p>";
        echo "<p>Đăng ký thành công!</p>";
    } elseif(isset($_GET['error'])) {
        echo "<p>{$_GET['error']}</p>";
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/dangky.css'>
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
				<li>
					<a href="dangnhap.php" id="btnDN">Đăng nhập</a>
				</li>
			</ul>
		</nav>
	</header>
    <div class="box-login">
        <div class="box-header">
          <h3>Sign up</h3> 
        </div>
        <div class="box-content">
          <form action="register_submit.php" method="POST">
            <div class="row">
                <div class="input-group">
                  <input type="text" placeholder="Họ và tên" name="username">
                </div>
              </div>
              <div class="row">
                <div class="input-group">
                  <input type="text" placeholder="mail@gmail.com" name="email">
                </div>
              </div>
            <div class="row">
              <div class="input-group">
                <input type="text" placeholder="Tên đăng nhập" name="nickname">
              </div>
            </div>
            <div class="row">
              <div class="input-group">
                <input type="password" placeholder="Mật khẩu" name="password">
              </div>
            </div>
            <div class="rowlast">
              <div class="checkbox-group">
                <input type="checkbox" id="remember-checkbox">
                <label for="remember-checkbox">Bạn có đồng ý các điều khoản của chúng tôi</label>
              </div>
            </div>
            <div class="singin">
              <button type="submit" class="sign-in" name="submit">Sign up</button>
            </div>
            <div class="footer-column">
              <h4>Or join with</h4>
              <ul class="font">
                  <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram"></i></li>
                  <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>                    
            </div>
            <div class="end">
              <a class="text1">Already have an account?</a>
              <a href="dangnhap.php" class="lost">Sign in!</a>

            </div>
          
          </form>
        </div>
      </div>
	<footer class="footer">
		<p>&copy; 2024 Nhà trọ FPOLY. Bảo lưu mọi quyền.</p>
	</footer>
</body>
</html>