<?php include 'views/header.php' ?>
<div class="col-12">
    <div class=" rounded h-100 p-4">
        <h6 class="mb-4">Danh sách sản phẩm</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="font-size: 15px;">Danh mục</th>
                        <th scope="col" style="font-size: 15px;">Tên sản phẩm</th>
                        <th scope="col" style="font-size: 15px;">Giá sản phẩm</th>
                        <th scope="col" style="font-size: 15px;">Ảnh </th>
                        <th scope="col" style="font-size: 15px;">Ảnh 2</th>
                        <th scope="col" style="font-size: 15px;">Ảnh 3</th>
                        <th scope="col" style="font-size: 15px;">Mô tả sản phẩm</th>
                        <th scope="col" style="font-size: 15px;">Sửa</th>
                        <th scope="col" style="font-size: 15px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                        
                    <?php foreach ($list_sp as $sp) {
                        ?>

                            <tr>
                                <td><?php echo $sp['iddm']?></td>
                                <td><?=$sp['name']?></td>
                                <td><?=$sp['price']?></td>
                                <td><img src="<?php echo "uploaded_img/".$sp['img'] ?>" alt="" height="120" width="120"></td>
                                <td><img src="<?php echo "uploaded_img/".$sp['img2'] ?>" alt="" height="120" width="120"></td>
                                <td><img src="<?php echo "uploaded_img/".$sp['img3'] ?>" alt="" height="120" width="120"></td>
                                <td><?=$sp['mo_ta']?></td>
                                <td><a href="index.php?action=suasp&id_sp=<?php echo $sp['id_sp'] ?>" class="option-btn">Sửa</a></td>
                                <td><a href="index.php?action=xoasp&id_sp=<?php echo $sp['id_sp'] ?>" onclick="return confirm('Bạn có thực sự muốn xoá không???')" class="delete-btn" >Xóa</a></td>
                            </tr>
                            
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="index.php?action=add_sp" class="btn btn-outline-primary m-2">Thêm sản phẩm</a>
<?php  include 'views/footer.php' ?>