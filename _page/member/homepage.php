<div class="row">
    <div class="col-12">
        <h3>
            เมนูอาหารทั้งหมด
        </h3>

        <div class="row text-center">

            <?php
            $db_new_2 = new database();

            $db_new_2->select("restaurant_menu", "*");

            while ($fetch_new = $db_new_2->query->fetch_object()) {
            ?>
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4" style="height:275px;">
                        <img src="./../../_system/upload/<?= $fetch_new->img_m ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0"><?= $fetch_new->name_m ?></h5><span class="small text-uppercase text-muted">ราคา
                            : <?= $fetch_new->price_m ?></span>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quan" min="1" value="1" name="" id="">
                            <button class="btn btn-outline-secondary" type="button" onClick="addFoodToCart('<?= $fetch_new->id_m ?>','<?= $fetch_new->price_m ?>','<?= $fetch_new->name_m ?>')">เพิ่ม</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<script>
    function addFoodToCart(id, price, name) {
        const quan = document.getElementById("quan").value;


        Swal.fire({
                icon: 'question',
                title: 'ยืนยัน',
                text: `เพิ่ม ${name} เข้าตระกร้า ทั้งหมด ${quan} ชิ้น ราคา ${quan * price} `,
                showCancelButton: true,
                preConfirm: () => {
                    return {
                        id: id,
                        quan: quan
                    }
                }
            })
            .then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData();

                    const {
                        id,
                        quan
                    } = result.value;

                    formData.append("id", id);
                    formData.append("quan", quan);
                    formData.append("own", <?= $userid ?>);

                    const xhr = new XMLHttpRequest();
                    const url = "./service/addToCart.php";

                    xhr.open("POST", url, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const response = xhr.responseText;
                            if (response === 'success') {
                                Swal.fire('เพิ่มสำเร็จ', "เพิ่มเข้าสำเร็จ", 'success');
                            } else {
                                Swal.fire('เพิ่มไม่สำเร็จ !', "คุณอาจจะมีสินค้าในตระกร้าแล้ว", "error")
                            }
                        }
                    }

                    xhr.send(formData);
                }
            })


    }
</script>