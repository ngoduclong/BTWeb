<!DOCTYPE html>
<html lang="vi-VN">
    <head>
        <style>
          
</style>
    <link rel="stylesheet" type="text/css" href="filenhung.css" medial="all" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           <?php require_once("connection.php");?>
            <?php session_start();?>
            
           
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
   <?php

        if(isset($_POST['btn_Signup'])){
            $username=$_POST["username"];
            $password=$_POST['pass'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            if($username== "" || $password== "" || $name== "" || $email== ""){            
                echo "<strong >Vui lòng nhập đủ các thông tin trên !</strong>";
            }else{
                $sql = "INSERT INTO users (username, password, fullname, email, createdate ) VALUES ( '$username', '$password', '$name', '$email', now())";
                mysqli_query($conn,$sql);
                echo" Chúc mừng bạn đã đăng ký thành công !";
            }
        }
        
    ?>
        
    
    </head>
<body>
      <div id="header">
    </div>
      
        <ul>
            <li><a href="Home1_bs.php">Home</a></li>
            <li><a href="dangky1.php">Đăng ký</a></li>
            
            
            <div class="login-container">    
                
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="login-container button">Login</button> 
                </div>
        </ul>
    <div id="noidung">
        <div id="noidunga">
            <p>Hello</p>



    



<div id="id01" class="modal">
  
  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
  
    <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal1">&times;</span>
      
    </div>

    <div class="container">
        <h2>Login form</h2>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="btn_login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    <div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content1 animate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <div class="container">
      <h2>Sign Up</h2>
      <p style="font-weight:bolder;">Please fill in this form to create an account.</p>
      <hr>
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>

      <label for="Hoten"><b>Fullname</b></label>
      <input type="text" placeholder="Enter Fullname" name="name" required>
      
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
        

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" class="signupbtn" name=" btn_Signup">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event1) {
    if (event1.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    
    <div id="noidung">
        
           

</body>
</html>
