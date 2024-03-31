// JavaScript Document

var button = document.getElementById("signin");

button.addEventListener("click", function() {
	console.log("Button clicked!");
    // Đoạn mã xử lý sự kiện ở đây
	validateForm();
    
});

function validateForm() {
	var loginInput = document.getElementById("login").value;
	var passwordInput = document.getElementById("pass").value;
	var hasError = false;

	if (loginInput === "" || passwordInput === "") {
		alert("Please fill in all fields!");
		return false;
	}

	// Additional validation logic here

	return true;
}