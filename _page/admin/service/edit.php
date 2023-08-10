<?php 
include('./../../../_system/database.php');
$db = new database();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = $_FILES['file'];
    $id = $_POST["id"];

    if($file['name'] != ""){
        $newfile = $db -> uploadFile2($file);
    }else{
        $newfile = "";
    }

    if($newfile != ""){
        $data = [
            "name_m" => $_POST['foodname'],
            "price_m" => $_POST['foodprice'],
            "img_m" => $newfile,
        ];
    }else{
        $data = [
            "name_m" => $_POST['foodname'],
            "price_m" => $_POST['foodprice'],
        ];
    }

    $db -> update("restaurant_menu",$data,"id_m = $id");

    if($db -> query){
        echo "แก้ไขสำเร็จ !";
    }else{
        echo "แก้ไม่สำเร็จ !";
    }
    
}