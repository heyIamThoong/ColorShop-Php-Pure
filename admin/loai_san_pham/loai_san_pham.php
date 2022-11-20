<?php include 'views/header.php' ?>
<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">Thêm danh mục</h6>
    <form action="index.php?action=add_dm" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control" disabled>

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tên danh mục</label>
            <input type="text" name="category" class="form-control" >
            <b style="color:red;"><?php echo isset($_SESSION['error_dm']) ? $_SESSION['error_dm'] : "" ?></b><br>
        </div>
        <button type="submit" class="btn btn-primary" name="btn_dm">Thêm danh mục</button>
    </form>
</div>


    <div class="rounded h-100 p-4" style="margin-top:-400px">
        <h6 class="mb-4">Danh sách danh mục</h6>
        <table class="table">
            <thead>
                <tr>
                    
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($list_dm as $danhmuc){
                    ?>

                            <tr>
                                <td scope="row" style="padding-top:23px"><?php echo $danhmuc['id'] ?></td>
                                <td style="padding-top:23px"><?php echo $danhmuc['name'] ?></td>
                                <td>
                                    <a href="index.php?action=suadm&id=<?php echo $danhmuc['id']?>" class="btn btn-warning m-2" >Sửa</a>
                                    <a href="index.php?action=xoadm&id=<?php echo $danhmuc['id']?>" onclick="return confirm('bạn có thật sự muốn xoá không??')" class="btn btn-warning m-2" >Xóa</a>
                                </td>
                            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
<?php  include 'views/footer.php'; ?>
