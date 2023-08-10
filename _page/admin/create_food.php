<h3>สร้างเมนูอาหาร</h3>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="foodname" class="form-control mb-3" placeholder="ชื่อเมนู" id="" required>
            <input type="text" name="foodprice" class="form-control mb-3" placeholder="ราคาเมนูอาหาร" id="" required>
            <label for="" class="form-label">รูปอาหาร</label>
            <input type="file" id="img_upload" name="img" onchange="PreviewImage()" class="form-control mb-3" id="" required>
            <button type="submit" name="create_food"  class="btn btn-primary">สร้าง</button>
        </form>



        <div class="card mt-5">
            <div class="card-body">
                <img src="" alt="" id="previewImg" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>


<script type="text/javascript">
function PreviewImage() {
    var oFReader = new FileReader();

    oFReader.readAsDataURL(document.getElementById("img_upload").files[0]);
    oFReader.onload = function(event) {
        document.getElementById("previewImg").src = event.target.result;
    }
}
</script>