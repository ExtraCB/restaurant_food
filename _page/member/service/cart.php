<?php
include('./../../../_system/database.php');
session_start();

$db = new database();
$db2 = new database();


if (isset($_POST['submit_pay'])) {
    $userid = $_SESSION['userid'];
    $rand =  (mt_rand());




    $db2->insert("restaurant_order", ["id_o" => $rand, "id_own" => $userid]);
    if ($db2->query) {

        $db->select("restaurant_cart", "*", "WHERE id_own = $userid");
        $cartItems =  $db->query;
        if ($cartItems) {
            foreach ($cartItems as $cartItem) {
                $id_f = $cartItem['id_f'];
                $count = $cartItem['c_count'];

                echo $id_f;
                echo $count;

                $data = [
                    "id_o" => $rand,
                    "id_f" => $id_f,
                    "count_d" => $count
                ];

                $db->insert("restaurant_detail", $data);
            }
        }

        if ($db->query) {
            $db3 = new database();

            $db3->delete("restaurant_cart", " id_own = $userid");
            if ($db3->query) {
                $_SESSION['success'] = "สั่งสื้อสำเร็จ !";
                header('location:./../index.php?page=homepage');
            } else {
                $_SESSION['success'] = "เคลียตระกร้าไม่สำเร็จ !";
                header('location:./../index.php?page=homepage');
            }
        } else {
            $_SESSION['alert'] = "สั่งสื้อไม่สำเร็จ !";
            header('location:./../index.php?page=cart');
        }
    }
}

if(isset($_GET['plusItem'])){
    $id = $_GET['id'];
    $count = "c_count + 1";

    $data = [
        "c_count" => $count
    ];

    $db -> mysqli -> query("UPDATE restaurant_cart SET c_count = c_count + 1 WHERE id_c = $id");




    
    if($db -> mysqli -> query){
        header('location:./../index.php?page=cart');
    }else{
        header('location:./../index.php?page=cart');
    }
}

if(isset($_GET['delItem'])){
    $id = $_GET['id'];

    $db -> mysqli -> query("UPDATE restaurant_cart SET c_count = c_count - 1 WHERE id_c = $id");




    
    if($db -> mysqli -> query){
        header('location:./../index.php?page=cart');
    }else{
        header('location:./../index.php?page=cart');
    }
}