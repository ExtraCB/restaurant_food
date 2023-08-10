<?php
include('./../_system/database.php');
session_start();

$db = new database();

if (isset($_POST['login'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];


    $db->select("users", "*", "WHERE username_u = '$username' AND password_u = '$password'");


    if ($db->query->num_rows > 0) {
        $fetch = $db->query->fetch_object();
        $_SESSION['userid']  = $fetch->id_u;
        $_SESSION['success'] = "ยินดีต้อนรับเข้าสู่ระบบ !";
        header('location:./' . $fetch->status_u . '/index.php');
        return;
    } else {
        $_SESSION['alert'] = "ชื่อผู้ใช้งานหรือรหัสผ่านผิด !";
        header('location:' . $_SERVER['REQUEST_URI']);
        return;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./../bs/css/bootstrap.min.css">
    <script src="./../bs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./../bs/style/standard.css">
    <link rel="stylesheet" href="./../bs/style/login_register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    .container-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<body>
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="fading-box">
                        <div class="card shadow" style="border-radius: 8px;">
                            <div class="row">

                                <div class="col-8">
                                    <form action="" method="post">
                                        <div class="form-container m-4">
                                            <?php include('./_component/error.php') ?>
                                            <h3 class="text-center mb-4 fw-bold">Login Page</h3>
                                            <input type="text" placeholder="Username" name="username" class="form-control mb-3 shadow-sm" style="border-radius:28px" id="">

                                            <hr>
                                            <input type="text" placeholder="Password" name="password" class="form-control mb-3 shadow-sm" style="border-radius:20px" id="">
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn btn-outline-primary" type="submit" name="login" style="border-radius:20px">เข้าสู่ระบบ</button>
                                                </div>
                                                <div class="col mt-auto text-center"><a href="./register.php" class="link-primary">ยังไม่มีบัญชีผู้ใช้งาน</a></div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-4">
                                    <img src="./../bs/img/food2.jpg" class="img-fluid h-100 w-100" alt="..." style="border-radius: 8px;">
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