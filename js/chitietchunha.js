const avatarContainer = document.getElementById('avatarContainer');
  const avatar = document.getElementById('avatar');
  const avatarInput = document.getElementById('avatarInput');
  const avatarText = document.getElementById('avatarText');

  avatar.addEventListener('click', function() {
    avatarInput.click(); // Khi nhấp vào hình, kích hoạt sự kiện click cho phần tử input
  });

  avatarInput.addEventListener('change', function() {
    const file = avatarInput.files[0];
    const reader = new FileReader();

    reader.onload = function(event) {
      const imageUrl = event.target.result;
      avatar.src = imageUrl; // Thay đổi nguồn ảnh của hình

      // Ẩn chữ
      avatarText.style.display = 'none';
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  });