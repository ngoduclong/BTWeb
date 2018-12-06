<!DOCTYPE html>
<html lang="vi-VN">

            
    <?php require_once("connection.php");?>
    <?php include("Home.php");?>
    <?php
        if(isset($_POST['btn_submit'])){
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
    <head>
    
    
        <style>
            
            *{
                box-sizing: border-box;
            }
            input[type=text],select,textarea{
                width: 100%;
                padding:12px;
                border: 1px solid black;
                resize: vertical;
            }
            input[type=submit]{
                background-color:#2eb82e;
                color:white;
                margin-top:5px;
                padding:12px 20px;
                border: none;
                border-radius: 4px;
                float:right;
                cursor: pointer;
            }
            input[tyoe=submit]:hover{
                background-color:#3c743c;
            }
            .containt{
                background-color:#ccccb3;
                padding:12px 16px 10px 12px;
                border-radius: 5px;
                width:600px;
                
            }
            .col-1{
                float:left;
                width:25%;
                margin-top:5px;
            }
            .col-2{
                float:left;
                width:75%;
                margin-top:5px;
            }
            .row::after{
                content: "";
                display:block;
                clear: both;
            }
            @media screen and (max-width:600px){
                .col-1,.col-2,input[type=submit]{
                    width:100%;
                    margin-top:0;
                }
            }
        </style>
    </head>

    <body>
            <div id="noidung">
            <div id="noidunga">
                <p style="font-weight:bolder;">Đăng ký thành viên tại đây </p>
            
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="containt">
                    <div class="row">
                        <div class="col-1">
                            <label for="username">User name</label>
                        </div>
                        <div class="col-2">
                            <input type="text" id="username" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-2">
                            <input type="text" name="pass" id="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="hoten"> Họ và Tên</label>
                        </div>
                        <div class="col-2">
                            <input type="text" id="name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="email"> Email</label>
                        </div>
                        <div class="col-2">
                            <input type="text" id="email" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="submit" name="btn_submit">
                </div>
                </form>
        </div>
        </div>
        
        
        </body>  
        </html> 
     