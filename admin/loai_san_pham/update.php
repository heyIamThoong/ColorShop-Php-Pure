<?php include 'views/header.php' ?>
<?php
    if(is_array($listone_danhmuc)){
        extract($listone_danhmuc);
?>
<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Sửa danh mục</h6>
    <form action="index.php?action=update_dm" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">Mã sản phẩm</label>
            <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tên danh mục</label>
            <input type="text" name="category" class="form-control" value="<?php echo $name ?>" >
        </div>
        <button type="submit" class="btn btn-primary" name="update_dm">Sửa</button>
    </form>
</div>
<?php
    }
?>
<?php  include 'views/footer.php' ?>