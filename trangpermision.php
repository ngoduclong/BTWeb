<?php
if (isset($_SESSION['user_id']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng về trang chủ
	echo" Vui lòng đăng nhập!";
	header('Location: http://localhost/Test/Home1.php');
}else {
	if (isset($_SESSION['permision']) == true) {
		// Ngược lại nếu đã đăng nhập
		$permission = $_SESSION['permision'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($permission == '0') {
			// 0 là partner, 1 là admin
			// Nếu không phải admin thì xuất thông báo
			echo "Bạn không đủ quyền truy cập vào trang này !<br>";
			echo "<a href='http://localhost/TLU/Home2.php' style='text-decoration:none';> Trang chủ</a>";
			exit();
		}
	}
}
?>