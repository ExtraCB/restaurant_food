<div class="row">
    <div class="col-12">
        <div class="container mt-5 p-3 rounded cart">
            <div class="row no-gutters text-center">
                <div class="col-md-12">
                    <form action="./service/cart.php" method="post">


                        <div class="card">
                            <div class="card-body m-2">
                                <table id="" class="table_cart">
                                    <thead>
                                        <th>สินค้า</th>
                                        <th>ราคา</th>
                                        <th>จำนวน</th>
                                        <th>ทั้งหมด</th>
                                        <th>จัดการ</th>
                                    </thead>
                                    <tbody>
                                        <?php
                            $db_cart = new database();
                            $db_cart->selectjoin("restaurant_cart", "*", "INNER JOIN", "restaurant_menu", "restaurant_cart.id_f = restaurant_menu.id_m", "restaurant_cart.id_own = $userid");

                            while ($fetch_cart = $db_cart->query->fetch_object()) {
                            ?>
                                        <tr>
                                            <td class="item_col1">
                                                <img src="../../_system/upload/<?= $fetch_cart -> img_m ?>"
                                                    class="rounded-circle img-thumbnail"
                                                    style="width:75px; height:75px; object-fit:cover" alt="">
                                                <div class="flex-container">
                                                    <h5><?= $fetch_cart -> name_m ?></h5>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="flex-container">
                                                    <h5><?= $fetch_cart -> price_m?> ฿</h5>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="flex-container">
                                                    <?php if($fetch_cart -> c_count > 1){ ?>
                                                    <a href="./service/cart.php?delItem=1&id=<?= $fetch_cart -> id_c; ?>"
                                                        class="nav-link">-</a>
                                                    <?php } ?>
                                                    <h5><?= $fetch_cart -> c_count?></h5>
                                                    <a href="./service/cart.php?plusItem=1&id=<?= $fetch_cart -> id_c; ?>"
                                                        class="nav-link">+</a>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="flex-container">
                                                    <h5><?= $fetch_cart -> c_count * $fetch_cart -> price_m ?> ฿</h5>
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="flex-container">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="deleteItemFromCart(<?= $fetch_cart -> id_c ?>)">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <button type="submit" name="submit_pay" class="btn btn-outline-success">Pay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function deleteItemFromCart(id) {
    Swal.fire({
            title: 'คุณต้องการลบสินค้าในตระกร้า ?',
            showDenyButton: true,
            confirmButtonText: 'ลบ',
            denyButtonText: `ยกเลิก`,
        })
        .then((result) => {
            if (result.isConfirmed) {
                return fetch(`./service/cart.php?delete=1&id=${id}`)
                    .then(res => {
                        if (res.status == 200) {
                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'ลบสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500,

                                })
                                .then(function() {
                                    location.reload();
                                })
                        }
                    })
            }
        })
}
</script>