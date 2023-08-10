<?php 
include('./../_system/database.php');
session_start();

$db = new database();

if(isset($_POST['register'])){    
    if(($_POST['password'] != $_POST['password_con'])){
        $_SESSION['alert'] = "รหัสผ่านและรหัสผ่านยืนยันไม่ตรงกัน !";
        header('location:'.$_SERVER['REQUEST_URI']);
        return;
    }else{
        $data = [
            "username_u" => $_POST['username'],
            "email_u" => $_POST['email'],
            "password_u" => $_POST['password'],
        ];

        $username = $_POST['username'];


        $db -> insertWhere("users",$data,"(SELECT username_U FROM users WHERE username_u = '$username' )");


        if($db -> query -> affected_row > 0){
            $_SESSION['success'] = "สมัครสมาชิกสำเร็จ !";
            header('location:'.$_SERVER['REQUEST_URI']);
            return;
        }else{
            $_SESSION['alert'] = "ชื่อผู้ใช้งานมีอยู่ในระบบแล้ว";
            header('location:'.$_SERVER['REQUEST_URI']);
            return;
        }
    }
    


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="./../bs/css/bootstrap.min.css">
    <script src="./../bs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./../bs/style/login_register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="fading-box">
                        <div class="card shadow" style="border-radius: 8px;">
                            <div class="row">
                                <div class="col-4">
                                    <img src="./../bs/img/img1.jpg" class="img-fluid h-100 w-100" alt="..."
                                        style="border-radius: 8px;">
                                </div>
                                <div class="col-8">
                                    <form action="" method="post">
                                        <div class="form-container m-4">
                                            <?php include('./_component/error.php') ?>
                                            <h3 class="text-center mb-4">Register Page</h3>
                                            <input type="text" placeholder="Username" name="username"
                                                class="form-control mb-3 shadow-sm" style="border-radius:28px" id="">
                                            <input type="text" placeholder="Email" name="email"
                                                class="form-control mb-3 shadow-sm" style="border-radius:28px" id="">
                                            <hr>
                                            <input type="text" placeholder="Password" name="password"
                                                class="form-control mb-3 shadow-sm" style="border-radius:20px" id="">
                                            <input type="text" placeholder="Password Confirm" name="password_con"
                                                class="form-control mb-3 shadow-sm" style="border-radius:20px" id="">
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-outline-primary" name="register"
                                                        style="border-radius:20px">สมัครสมาชิก</button>
                                                </div>
                                                <div class="col mt-auto text-center"><a href="./login.php"
                                                        class="link-primary">มีบัญชีผู้ใช้งานแล้ว </a></div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

</html>