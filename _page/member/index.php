<?php
session_start();
include('./../../_system/database.php');
$db = new database();


$db->secureCheck();
$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="./../../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../bs/style/standard.css">
    <link rel="stylesheet" href="./../../bs/style/food_card.css">
    <script src="./../../bs/js/bootstrap.min.js"></script>
    <script src="./../../bs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--Main Navigation-->
    <header>
        <?php include('./../_component/navuser.php'); ?>
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <?php

            include('./../_component/error.php');

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page === "homepage") {
                    include('homepage.php');
                } else if ($page === "cart") {
                    include('cartpage.php');
                } else if ($page === "history") {
                    include('historypage.php');
                }
            } else { ?>
                <h3>Welcome to User Homepage</h3>
            <?php }
            ?>
        </div>
    </main>
    <!--Main layout-->

</body>

</html>