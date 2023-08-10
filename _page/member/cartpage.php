<div class="row">
    <div class="col-12">
        <div class="container mt-5 p-3 rounded cart">
            <div class="row no-gutters text-center">
                <div class="col-md-12">
                    <form action="./service/cart.php" method="post">
                        <div class="product-details mr-2">

                            <hr>
                            <h6 class="mb-0">Shopping cart</h6>
                            <div class="d-flex justify-content-between"><span>สินค้าในตระกร้าทั้งหมด</span>
                                <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort
                                        by:</span>
                                    <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $db_cart = new database();
                            $db_cart->selectjoin("restaurant_cart", "*", "INNER JOIN", "restaurant_menu", "restaurant_cart.id_f = restaurant_menu.id_m", "restaurant_cart.id_own = $userid");

                            while ($fetch_cart = $db_cart->query->fetch_object()) {
                            ?>
                                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                    <div class="d-flex flex-row"><img class="rounded" src="../../_system/upload/<?= $fetch_cart->img_m ?>" width="40">
                                        <div class="ml-2"><span class="font-weight-bold d-block"><?= $fetch_cart->name_m ?></span><span class="spec"><?= "ราคาต่อจาน  " . $fetch_cart->price_m ?></span></div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center"><span class="d-block"><?= $fetch_cart->c_count ?> : </span><span class="d-block ml-5 font-weight-bold">
                                            <?= $fetch_cart->c_count * $fetch_cart->price_m  ?></span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                                </div>
                            <?php } ?>

                        </div>

                        <button type="submit" name="submit_pay" class="btn btn-outline-success">Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>