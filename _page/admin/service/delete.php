<?php 
include('./../../../_system/database.php');
$db = new database();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];


    $db -> delete("restaurant_menu","id_m = $id");

    if($db -> query){
        echo "ลบสำเร็จ !";
    }else{
        echo "ลบไม่สำเร็จ !";
    }
    
}