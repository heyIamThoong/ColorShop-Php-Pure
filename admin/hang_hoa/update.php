<?php include 'views/header.php' ?>
<?php if(is_array($listone_sanpham)){
    extract($listone_sanpham);
    $hinhpath = "uploaded_img/".$img;
    $hinhpath2 = "uploaded_img/".$img2;
    $hinhpath3 = "uploaded_img/".$img3;
?>
<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Sửa sản phẩm</h6>
   
            <form action="index.php?action=update_sp" method="post" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên sản phẩm" required value="<?=$name?>">
                    <label for="floatingInput">Tên sản phẩm</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="price" class="form-control" placeholder="Price" required value="<?=$price?>">
                    <label for="">Giá sản phẩm</label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh</label>
                    <img src="<?=$hinhpath?>" alt="" height="120" width="120" style="padding-bottom: 10px; margin-left: 5px;">
                    <input class="form-control" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" type="file">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh2</label>
                    <img src="<?=$hinhpath2?>" alt="" height="120" width="120" style="padding-bottom: 10px; margin-left: 5px;">
                    <input class="form-control" name="image2" accept="image/jpg, image/jpeg, image/png, image/webp" type="file">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh3</label>
                    <img src="<?=$hinhpath3?>" alt="" height="120" width="120" style="padding-bottom: 10px; margin-left: 5px;">
                    <input class="form-control" name="image3" accept="image/jpg, image/jpeg, image/png, image/webp" type="file">
                </div>
                <div class="form-floating">
                    <textarea class="form-control" required name="details" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"><?=$mo_ta?></textarea>
                    <label for="floatingTextarea">Chi tiết sản phẩm</label>
                </div>
                <input type="hidden" value="<?=$id_sp?>" name="id_sp">
                <button type="submit" style="margin-top:1.5px" class="btn btn-primary" name="update_sp">Sửa Sản phẩm</button>
                <a href="index.php?action=list_sp" class="btn btn-primary m-2">Danh sách sản phẩm</a>
            </form>
</div>
<?php } ?>
<?php  include 'views/footer.php' ?>
