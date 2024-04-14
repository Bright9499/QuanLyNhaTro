const searchParams = new URLSearchParams(window.location.search);
const hasSuccess = searchParams.has('success');

// Check if 'success' parameter exists
if (hasSuccess) {
	// Run the alert function
	alert("Thành công ");
}