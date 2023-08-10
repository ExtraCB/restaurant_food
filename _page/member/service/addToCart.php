<?php
include('./../../../_system/database.php');

$db = new database();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $quan = $_POST['quan'];
    $own = $_POST['own'];

    $data = [
        "id_own" => $own,
        "id_f" => $id,
        "c_count" => $quan
    ];

    $db->insertWhere("restaurant_cart", $data, "(SELECT id_f FROM restaurant_cart WHERE id_own = $own AND id_f = $id)");

    if ($db->mysqli->affected_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }
}
