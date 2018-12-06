<!DOCTYPE html>
<html lang="vi-VN">
    <head>
    <link rel="stylesheet" type="text/css" href="filenhung.css" medial="all" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <?php session_start();?>
           
        <?php
       
        //Gọi file connection.php ở bài trước
        require_once("connection.php");
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
                $sql = "INSERT INTO users(username, password, fullname, email, createdate ) VALUES ( '$username', '$password', '$name', '$email', now())";
                mysqli_query($conn,$sql);
                echo" Chúc mừng bạn đã đăng ký thành công !";
            }
        }
        mysqli_close($conn);
    ?>
        
    
    </head>
<body>
<div id="header">
      </div>        
        <ul>
            <li><a href="Home1chuan.php">Home</a></li>
            <li><a href="#news">Các khóa học</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Bài tập</a>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Thi Thử</a>
                    <div class="dropdown-content">
                        <a href="#">Link 1 </a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
            </li>
            <div class="login-container">
            <button class="login-container button" style="width:auto;"><a href="Trangdangxuat.php" style="text-decoration:'none';">Logout</a></button>     
                <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="login-container button">Sign Up</button>
                 
                </div>
        </ul>


    <div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <div class="container">
      <h2>Sign Up</h2>
      <p>Please fill in this form to create an account.</p>
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
        <button type="submit" class="signupbtn" name="btn_Signup">Sign Up</button>
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