<?php 
session_start();
include('./../../_system/database.php');
$db = new database();


$db->secureCheck();


if(isset($_POST['create_food'])){
    $foodname = $_POST['foodname'];
    $foodprice = $_POST['foodprice'];
    $img = $_FILES['img'];


    $fileNew = $db -> uploadFile($img);


    $data = [
        "name_m" => $foodname,
        "img_m" => $fileNew,
        "price_m" => $foodprice,
    ];

    $db -> insert("restaurant_menu",$data);

    if($db -> query ){
        $_SESSION['success'] = "เพิ่มเมนูอาหารสำเร็จ !";
        header('location:'.$_SERVER['REQUEST_URI']);
        return;
    }else{
        $_SESSION['alert'] = "เพิ่มเมนูอาหารไม่สำเร็จ !";
        header('location:'.$_SERVER['REQUEST_URI']);
        return;
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="./../../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../bs/style/admin.css">
    <script src="./../../bs/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./../../bs/style/standard.css">

    <script src="./../../bs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--Main Navigation-->
    <header>
        <?php include('./../_component/navadmin.php'); ?>
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <?php 

                include('./../_component/error.php');

                if(isset($_GET['page'])){ 
                    $page = $_GET['page'];
                    if($page === "CreateFood"){
                        include('./create_food.php');
                    }else if($page === "homepage" ){

                    }else if($page === "EditFood"){
                        include('./edit_food.php');
                    }else if($page === "History"){
                        include('./history_admin.php');
                    }
                }else{ ?>
            <h3>Welcome to Management System</h3>
            <?php }           
            ?>
        </div>
    </main>
    <!--Main layout-->

</body>

</html>