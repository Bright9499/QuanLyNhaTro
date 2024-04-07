var images = ["img/z5248158221152-f186a77e0f81a49ec2e32a3bc9821d98_1710565981.jpg", "img/z5248158228461-87965737effe1d6878fed49f57e3bc77_1710565981.jpg",
 "img/z5248158229018-94b0af98bea08fc5080419de879c36b2_1710565982.jpg", "img/z5248158239005-1c073db9618c0e37842f6c3601cf8f19_1710565983.jpg","img/z5248158242779-9251b981620ce0ae823ba6b1c276eae0_1710565983.jpg","img/z5248158253571-ca01c32b77abc19f87bbf5383df6003a_1710565984.jpg"]; // Danh sách các hình ảnh
var currentImage = 0; // Chỉ số hình ảnh hiện tại
var imageElement = document.getElementById("myImage"); // Phần tử hình ảnh

imageElement.addEventListener("click", changeImage); // Gắn sự kiện click cho hình ảnh

function changeImage() {
  currentImage = (currentImage + 1) % images.length; // Chuyển đến hình ảnh tiếp theo
  imageElement.src = images[currentImage]; // Thay đổi nguồn hình ảnh
  }
  function toggleMenu() {
    var menu = document.getElementById('menu');
    if (menu.style.display === 'none') {
      menu.style.display = 'block';
    } else {
      menu.style.display = 'none';
    }
  }
  