<?php 
include('./../../../_system/database.php');
$db = new database();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $id = $_POST["id"];

    if(isset($_FILES['file'])){
        $file = $_FILES['file'];
        if($file['name'] != ""){
            $newfile = $db -> uploadFile2($file);
        }else{
            $newfile = "";
        }
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