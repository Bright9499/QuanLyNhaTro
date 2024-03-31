function addAppointment() {
      // Lấy giá trị từ các trường form
      var dateInput = document.getElementById("date").value;
      var timeInput = document.getElementById("time").value;
      var nameInput = document.getElementById("name").value;

      // Xóa thông báo lỗi trước đó
      document.getElementById("dateError").innerHTML = "";
      document.getElementById("timeError").innerHTML = "";
      document.getElementById("nameError").innerHTML = "";

      // Kiểm tra nếu các trường không được nhập
      if (!dateInput) {
        // Hiển thị thông báo lỗi
        document.getElementById("dateError").innerHTML = "Vui lòng nhập ngày!";
        return; // Dừng việc thêm lịch hẹn nếu có lỗi
      }

      if (!timeInput) {
        // Hiển thị thông báo lỗi
        document.getElementById("timeError").innerHTML = "Vui lòng nhập giờ!";
        return; // Dừng việc thêm lịch hẹn nếu có lỗi
      }

      if (!nameInput) {
        // Hiển thị thông báo lỗi
        document.getElementById("nameError").innerHTML = "Vui lòng nhập tên!";
        return; // Dừng việc thêm lịch hẹn nếu có lỗi
      }

      // Tạo một hàng mới trong bảng
      var table = document.getElementById("appointmentTable");
      var newRow = table.insertRow(table.rows.length);
      var dateCell = newRow.insertCell(0);
      var timeCell = newRow.insertCell(1);
      var nameCell = newRow.insertCell(2);

      // Đặt giá trị cho các ô trong hàng mới
      dateCell.innerHTML = dateInput;
      timeCell.innerHTML = timeInput;
      nameCell.innerHTML = nameInput;

      // Xóa nội dung của các trường form
      document.getElementById("date").value = "";
      document.getElementById("time").value = "";
      document.getElementById("name").value = "";
    }