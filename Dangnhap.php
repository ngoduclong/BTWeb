<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<?php require_once("connection.php");?>
<?php session_start();?>
<head>
<title>Login</title>
<script src="js1/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css1/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<?php
       
        
        
       // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
    if (isset($_POST["btn_login"])){
       // lấy thông tin người dùng
       $username = $_POST["username"];
       $password = $_POST["password"];
       //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
       //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
       $username = strip_tags($username);
       $username = addslashes($username);
       $password = strip_tags($password);
       $password = addslashes($password);
       if ($username == "" || $password =="") {
           echo "username hoặc password bạn không được để trống!";
       }else{
           $sql =  " SELECT * from users where username = '$username' and password = '$password'  ";
           $query = mysqli_query($conn,$sql);
           $num_rows = mysqli_num_rows($query);
           if ($num_rows==0) {
               echo "tên đăng nhập hoặc mật khẩu không đúng !";
           }else{
               // Lấy ra thông tin người dùng và lưu vào session
               while ( $data = mysqli_fetch_array($query) ) {
                   $_SESSION["user_id"] = $data["id"];
                   $_SESSION['username'] = $data["username"];
                   $_SESSION["email"] = $data["email"];
                   $_SESSION["fullname"] = $data["fullname"];
                   $_SESSION["is_block"] = $data["is_block"];
                   $_SESSION["permision"] = $data["permision"];
            
               if (isset($_SESSION['permision']) == true) {
                $permission = $_SESSION['permision'];
                // Kiểm tra quyền của người đó có phải là admin hay không
                    if ($permission == '1') {
                        header('Location:Home3.php');
                    }else{
                   
                   // nếu không phải admin chuyển đến trang client
                   header('Location: Home4.php');
                        }
                }
                }
            }
        }
}
   ?>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">
               <h1>Welcome to WRU ENGLISH CLUB</h1><br>
               <h2> Login for more information</h2><br>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
					 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
						<input type="text"  value="User name" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>
					<input type="password"  value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
						<div class="remember">
			             <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
						 </span>
						 <div class="forgot">
						 	<h6><a href="dangky1.php">Signup?</a></h6>
						 </div>
						<div class="clear"> </div>
					  </div>
					   
						<input type="submit" value="Login" name="btn_login">
					</form>	
					<div class="header-left-top">
						<div class="sign-up">  </div>
					
					</div>
					
						
				</div>
				</div>
			  
			</div>
		</div>
</div>
<!--header end here-->
<div class="copyright">
	<p>© 2018  All rights reserved | Design by  <a href="http://w3layouts.com/" target="_blank">  WEC </a></p>
</div>
<!--footer end here-->
</body>
</html>