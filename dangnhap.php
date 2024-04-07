<?php
include 'database.php';


if(isset($_POST['dangnhap'])){

    session_start();

    $email=$_POST['email'];
    $email1=$_POST['email1'];
    $sql= "SELECT * FROM user WHERE email='$email' AND pass='$email1' AND delete_fg = 0 ";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        // Successful login
        $_SESSION['name'] = $user["name"]; // Sử dụng username từ cơ sở dữ liệu
        $_SESSION['role'] = $user["role"];

        if ($user["role"] == 'admin') {
            header("Location: admin/html/index.php?id=" .$user["ID"] . "");
        } elseif ($user["role"] == 'user') {
            header("Location: index.php?id=" .$user["ID"] . "");
        }

        exit(); // Stop script execution after redirection
    } else {
        // Unsuccessful login
        echo "Không thành công";
        die(); // Stop script execution
    }
}
?>
<?php
    if(isset($_GET['success'])) {
      echo " <p></p>";
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
    <title>Đăng nhập</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/dangnhap.css'>
</head>
<html>
<body>
    <div class="container">
        <div class="left-section">
          <img src="img/awkward-living-room-layout-ideas-768x461.jpg">
        </div>
        <div class="box-login">
          <div class="box-header">
            <h3>Sign in</h3>
          </div>
          <div class="box-content">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <div class="row">
                <div class="input-group">
                  <input id="login" name="email" type="text" placeholder="Login">
                </div>
              </div>
              <div class="row">
                <div class="input-group">
                  <input id="pass" name="email1" type="password" placeholder="Password">
                </div>
              </div>
              <div class="rowlast">
                <div class="checkbox-group">
                  <input type="checkbox" id="remember-checkbox">
                  <label for="remember-checkbox" class="remm">Remember me</label>
                </div>
                <a href="#" class="lost-pass">Forgot password?</a>
              </div>
              <div class="singin">
                <button id="signin" name="dangnhap" class="sign-in">Sign in</button>
              </div>
              <div class="footer-column">
                <h4>Or join with</h4>
                <ul class="font">
                    <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></li>
                    <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>                    
              </div>
              <div class="end">
                <a class="text1">Not a member yet?</a>
                <a href="dangky.php" class="lost">Sign up!</a>

              </div>
            
            </form>
          </div>
            
        </div>
      </div>
		<script src="js/dangnhap.js"></script>
</body>
</html>
</html>