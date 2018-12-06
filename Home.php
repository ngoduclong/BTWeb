<!DOCTYPE html>
<html lang="vi-VN">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <?php session_start();?>
            <?php
        // xử lý phần login
        //Gọi file connection.php ở bài trước
        require_once("connection.php");
            // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
        if (isset($_POST["submit"])) {
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
        <style type="text/css">
            body{
               
                font-family: Arial,Tahoma;
                font-size:18px;
               
                
            }
            #main{
                
                padding:0;
                margin: auto;
                border: 2px solid gray;
            }
            #header{
                height: 250px;
                background-image: url('anhbia.JPG');
                background-repeat: no-repeat;
                border:2px solid black;
                margin-bottom: 5px;
                
                padding:20px;
            }
            
            
            #footer{
                height: 100px;
                clear: both;
                border: 1px solid black;
                background-color: #3366ff;
                text-align: center;
                margin-top:10px;
                opacity: 0.9;
                margin-bottom:0px;
            }
            #noidung{
                min-height: 700px;
                
                margin-bottom: 30px;
                
            }
            #noidunga{
                padding: 12px 20px;
                
            }
            ul{
                list-style-type: none;
                overflow: auto;
                background-color:#3366ff;
                margin-bottom: 5px;
                margin-top:5px ;
                opacity: 0.9;
            }
           

            li {
                float:left;
            }

            li a, .dropbtn {
                    display: inline-block;
                    color: white;
                    text-align: center;
                    padding: 16px 18px;
                    text-decoration: none;
                    
                    
            }
                


            li a:hover, .dropdown:hover .dropbtn {
                background-color:#44cc00;
            }

            li.dropdown {
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color:#94b8b8;
                min-width: 80px;
                box-shadow: 0px 14px 16px 0px #c2d6d6;
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 18px ;
                text-decoration: none;
                display: block;
                text-align: left;
            }   

            .dropdown-content a:hover {background-color:#476b6b;}

            .dropdown:hover .dropdown-content {
                display: block;
            }
            ul .login-container {
                float: right;
            }

            ul input[type=text] {
                padding: 6px 10px;
                padding-top: 5px;
                margin-top: 8px;
                margin-bottom: 2px;
                font-size: 17px;
                border: none;
                width:120px;
            }

                ul .login-container button {
                float: right;
                padding: 6px 10px;
                margin-top: 8px;
                margin-right: 16px;
                background-color: #555;
                color: white;
                font-size: 17px;
                border: none;
                cursor: pointer;
            }

            ul .login-container button:hover {
                background-color: green;
            }
        </style>
                
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
                        <li><a href="dangky.php">Đăng ký</a></li>
                        <div class="login-container">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                              <input type="text" placeholder="Username" name="username">
                              <input type="text" placeholder="Password" name="password">
                              <button type="submit" name="submit">Login</button>
                            </form>
                      </ul>
                
        </body>
</html>
        


             