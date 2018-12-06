<!DOCTYPE html>
<html lang="vi-VN">
    <head>
    <link rel="stylesheet" type="text/css" href="filenhung.css" medial="all" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <?php session_start();?>
           
        <?php
       
        //Gọi file connection.php ở bài trước
        require_once("connection.php");
            // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
        if (isset($_POST["btn_login"])) {
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
                $sql = "select * from users where username = '$username' and password = '$password' ";
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
                    }
                    
                        // Thực thi hành động sau khi lưu thông tin vào session
                        // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                    header('Location: Home2.php');
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
            <li><a href="Home1.php">Home</a></li>
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
                <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="login-container button">Sign Up</button>
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="login-container button">Login</button> 
                </div>
        </ul>


    



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
        <button type="button" class="signupbtn" name="btn_Signup">Sign Up</button>
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
                <br><br>
                <h2 style=" text-align:center; color:#cc0000;">Welcome to WRU English club</h2>
                <br>
            <div class="slideshow-container">

            <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="chuan1.jpg" style="width:100%">
            <div class="text">Lớp học của clb tại cơ sở Hưng Yên</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="chuan2.jpg" style="width:100%">
            <div class="text">WEC Family</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="chuan3.jpg" style="width:100%">
            <div class="text">Cuộc thi nói tiếng anh không chuyên</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="chuan4.jpg" style="width:100%">
            <div class="text">Cuộc thi nói tiếng anh không chuyên</div>
            </div>

            </div>
            <br>

            <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span>
            </div>
        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 7000); // Change image every 2 seconds
            }
        </script>

                    
    </div>
    <div id="noidunga">
        <p style=" font-weight:bolder;">English Club was founded in September 16, 2009 by enthusiastic students of Water Resources University. We are on the way that creates an academic environment effectively. Let’s remember that our club is your club, where you can:<br>
        <p>1. Practice your four English skills: Speaking, Listening, Reading and Writing<p>
        <p>2. Learn and share experiences</P>
        <p>3. Play English games and do English quizzes freely</P>
        <p>4. Get opportunities to study English from other organizations freely</p>
        <p>5. Make presentations and become a confident person</p>

        <p style="font-weight:bolder;">Our strategy is to divide English into various sections that make you feel easy in all activities:</p>
        <p>1. English vocabulary: In the first week of every month, we have a hot topic for discussion. Members have to prepare new words and ideas for their presentation. It’s the best way for learning vocabulary. Besides, we strongly recommend members have their own hand book to save new words during other activities.</P>
        <p>2. English pronunciation: Make presentations and discuss topics are our ways for solving this problem. We will care about aspects such as word stress, sentences stress and linking.</P>
        <p>3. English Grammar: Self study plays an important role in this section. All the obstacles will be explained if members cannot understand by themselves.</p>
        <p>4. English Listening: English songs and VOA NEWS are preferably used. You also have opportunities to chat with native people who are working in the Water Resources University.</p>

        Our target does not only stop in creating a place for English learner; we are trying to get achievements in other activities. Let’s join with us and write your own chapters of your life now. WRU English Club is a place where you can explore your interests in a way that reflects your values and goals.</p>
    </div>
</div>        
        <div id="footer">
            <h3>Câu lạc bộ tiếng anh Đại học Thủy Lợi</h3>
            <h4> Take your oppoturnity</h4>

        </div>
    </body>

</body>
</html>
