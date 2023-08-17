<?php 
$db -> select("restaurant_menu","*");


?>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="row">
            <?php  while($fetch_food = $db-> query -> fetch_object()) { 
                $dbnew = new database();

                
                $id_food = $fetch_food -> id_m;
                $dbnew -> select("restaurant_detail"," COUNT(id_f) as SUMSELL ","WHERE id_f = '$id_food'");

                $fetch_sumsell = $dbnew -> query -> fetch_object();
                ?>
            <div class="col">
                <div class="card mb-3" style="width: 18rem;">
                    <img src="../../_system/upload/<?= $fetch_food -> img_m ?>" class="card-img-top" style="max-height:150px; object-fit:cover" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $fetch_food -> name_m ?></h5>
                        <p class="card-text">ราคา : <?= $fetch_food -> price_m ?></p>
                        <p class="card-text">ยอดขาย : <?= $fetch_sumsell -> SUMSELL ?></p>
                        <button class="btn btn-primary"
                            onClick="EditFood('<?=$id_food ?>','<?= $fetch_food -> name_m ?>','<?= $fetch_food -> price_m ?>','<?= $fetch_food -> img_m ?>')">แก้ไข</a>

                            <button class="btn btn-danger" onClick="DeleteFood('<?=$id_food ?>')">ลบ</a>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    <div class="col-3"></div>
</div>


<script>
function EditFood(id, foodname, foodprice, foodimg) {
    event.preventDefault();


    Swal.fire({
        title: 'แบบฟอร์ม',
        html: ` <input type="text" id="foodname" value="${foodname}" class="swal2-input"> 
        <input type="text" id="foodprice" value ="${foodprice}" class="swal2-input"> 
        <input type="file" name="newimg" id="newImgInput" onChange="PreviewImage()"   class="swal2-input"> 

        <img src="../../_system/upload/${foodimg}" class="img-fluid" id="previewImg" >
        `,
        showCancelButton: true,
        confirmButtonText: 'แก้ไข',
        cancelButtonText: 'ยกเลิก',
        preConfirm: () => {
            const foodname = document.getElementById('foodname').value;
            const foodprice = document.getElementById('foodprice').value;
            const newImg = document.getElementById('newImgInput');
            const newFile = newImg.files[0];

            if (!foodname) {
                Swal.showValidationMessage('กรุณาใส่ชื่อ !');
            } else if (!foodprice) {
                Swal.showValidationMessage('กรุณาใส่ราคา !');
            }

            return {
                foodname: foodname,
                foodprice: foodprice,
                file: newFile,
                id: id
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const {
                file,
                foodname,
                foodprice,
                id
            } = result.value;

            const formData = new FormData();
            
            formData.append('file', file);     
            formData.append('foodname', foodname);
            formData.append('foodprice', foodprice);
            formData.append('id', id);


            const xhr = new XMLHttpRequest();
            const url = './service/edit.php';

            xhr.open("POST", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;
                    Swal.fire({
                        title : 'แก้ไขสำเร็จ', 
                        timer:2000,
                        timerProgressBar:true,
                        text:response,
                        icon: 'success'})
                        .then(function(){
                            location.reload();
                        })
                }
            }

            xhr.send(formData)
            

        } else if (result.isDenied) {
            Swal.fire('ยกเลิกการแก้ไข', '', 'info');
        }
    });


}

function DeleteFood(id) {
    Swal.fire({
        title: 'ต้องการที่จะลบจริงๆ ใช่ไหม !',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Delete',
        denyButtonText: `ยกเลิก`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            const formData = new FormData();

            formData.append('id', id);


            const xhr = new XMLHttpRequest();
            const url = './service/delete.php';

            xhr.open("POST", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;
                    Swal.fire({
                        title : 'สำเร็จ', 
                        timer:2000,
                        timerProgressBar:true,
                        text:response,
                        icon: 'success'})
                        .then(function(){
                            location.reload();
                        })
                }
            }

            xhr.send(formData)

            location.reload();

        } else if (result.isDenied) {
            Swal.fire('ยกเลิกการลบ', '', 'info')
        }
    })
}


function PreviewImage() {
    var oFReader = new FileReader();

    oFReader.readAsDataURL(document.getElementById("newImgInput").files[0]);
    oFReader.onload = function(event) {
        document.getElementById("previewImg").src = event.target.result;
    }
}
</script>