<?php include 'views/header.php' ?>
<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Thêm sản phẩm</h6>
    <form action="index.php?action=add_sp" method="post" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <select name="name_dm" class="form-select" id="iddm" aria-label="Floating label select example">
                <option selected disabled>--Chọn danh mục--</option>
                <?php foreach ($list_dm as $dm) {
                    extract($dm);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                } ?>
            </select>
            <b style="color:red;"><?php echo isset($error_iddm) ? $error_iddm : "" ?></b><br>
            <label for="floatingSelect">Danh mục</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên sản phẩm"  >
            <label for="floatingInput">Tên sản phẩm</label>
            <b style="color:red;"><?php echo isset($error_name) ? $error_name : "" ?></b><br>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="price" class="form-control" placeholder="Price" id="price" >
            <label for="">Giá sản phẩm</label>
            <b style="color:red;"><?php echo isset($error_price) ? $error_price : "" ?></b><br>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ảnh</label>
            <input class="form-control" name="image"  accept="image/jpg, image/jpeg, image/png, image/webp"  type="file" id="img">
            <b style="color:red;"><?php echo isset($error_img) ? $error_img : "" ?></b><br>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ảnh2</label>
            <input class="form-control" name="image2"  accept="image/jpg, image/jpeg, image/png, image/webp"  type="file" id="img2">
            <b style="color:red;"><?php echo isset($error_img) ? $error_img : "" ?></b><br>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ảnh3</label>
            <input class="form-control" name="image3"  accept="image/jpg, image/jpeg, image/png, image/webp"  type="file" id="img3">
            <b style="color:red;"><?php echo isset($error_img) ? $error_img : "" ?></b><br>
        </div>
        <div class="form-floating">
            <textarea class="form-control"  name="details" placeholder="Leave a comment here" id="details" style="height: 150px;" ></textarea>
            <label for="floatingTextarea">Chi tiết sản phẩm</label>
            <b style="color:red;"><?php echo isset($error_detail) ? $error_detail : "" ?></b><br>
        </div>
        <button type="submit" style="margin-top:1.5px" class="btn btn-primary" name="add_sp" onclick="error()">Thêm Sản phẩm</button>
        <a href="index.php?action=list_sp" class="btn btn-primary m-2">Danh sách sản phẩm</a>
    </form>
</div>
<?php  include 'views/footer.php' ?>
<!-- <script>
    
    function error() {
    var iddm = document.getElementById('#iddm');
    var price = document.getElementById('#price');
    var img = document.getElementById('#img');
    var img2 = document.getElementById('#img2');
    var img3 = document.getElementById('#img3');
    var details = document.getElementById('#details');
    if(!isNaN(price.value)){
    alert("Giá bắt buộc phải nhập số");
    price.style.border = "1px solid red";
    return false
    }else{
        price.style.border = "1px solid white";
        return true;
    }
    if(iddm.value == ""){
        alert('iddm không được để trống');
        iddm.style.border = "1px solid red";
        return false;
    }else{
        iddm.style.border = "1px solid white";
        return true;
    }
    if(img.value == "" || img2.value == "" || img3.value == ""){
        alert('Ảnh không được để trống');
        return false;
    }else{
        return true;
    }
    if(details.value == ""){
        alert('Mô tả không được để trống');
        details.style.border = "1px solid red";
        return false;
    }else{
        details.style.border = "1px solid white";
        return true;
    }
    return true
}
</script> -->