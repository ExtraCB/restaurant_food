<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <h3>ประวัติการสั่งซื้อ</h3>
        <div class="accordion" id="accordionExample">
            <?php
            $db_history = new database();


            $db_history->select("restaurant_order", "*", "WHERE id_own = $userid");
            while ($fetch_history = $db_history->query->fetch_object()) {
                $id_order = $fetch_history->id_o;
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?= "ออร์เดอร์รหัสที่ " . $id_order ?>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php
                            $db_detail = new database();

                            $db_detail->selectjoin("restaurant_detail", "*", "INNER JOIN", "restaurant_menu", "restaurant_detail.id_f = restaurant_menu.id_m", "restaurant_detail.id_o = $id_order");

                            while ($fetch_detail = $db_detail->query->fetch_object()) { ?>
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row"><img class="rounded"
                                    src="../../_system/upload/<?= $fetch_detail->img_m ?>" width="40">
                                <div class="ml-2"><span
                                        class="font-weight-bold d-block"><?= $fetch_detail->name_m ?></span><span
                                        class="spec"><?= "ราคาต่อจาน  " . $fetch_detail->price_m ?></span></div>
                            </div>
                            <div class="d-flex flex-row align-items-center"><span
                                    class="d-block"><?= $fetch_detail->count_d ?> : </span><span
                                    class="d-block ml-5 font-weight-bold">
                                    <?= $fetch_detail->count_d * $fetch_detail->price_m  ?></span><i
                                    class="fa fa-trash-o ml-3 text-black-50"></i></div>
                        </div>
                        <?php  }
                            ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-2"></div>
</div>