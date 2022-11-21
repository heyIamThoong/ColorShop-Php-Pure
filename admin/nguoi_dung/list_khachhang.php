

<?php include 'views/header.php' ?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4" style="font-size:40px">Danh sách người dùng</h6>
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">user id</th>
                            <th scope="col">username</th>
                            <th scope="col">address</th>
                            <th scope="col">tell</th>
                            <th scope="col">email</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_khachhang as $kh) {
                            ?>
                            <tr>
                                    <td><?php echo $kh['id_kh'] ?></td>
                                    <td><?php echo $kh['name'] ?></td>
                                    <td><?php echo $kh['pass'] ?></td>
                                    <td><?php echo $kh['address'] ?></td>
                                    <td><?php echo $kh['email'] ?></td>
                                    <td>
                                    <a href="index.php?action=xoa_kh&id_kh=<?php echo $kh['id_kh']?>" onclick="return confirm('bạn có thật sự muốn xoá không???')"  class="delete-btn">Xóa</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                            
                    </tbody>
                </table>
        </div>
    </div>
</div>
<?php include 'views/footer.php' ?>
extract($kh);
                                // $xoa = "index.php?action=xoa_kh&id_kh=".$id_kh;
                                // echo'<tr>
                                //     <td>'.$id_kh.'</td>
                                //     <td>'.$name.'</td>
                                //     <td>'.$pass.'</td>
                                //     <td>'.$address.'</td>
                                //     <td>'.$email.'</td>
                                //     <td>
                                //     <a href="'.$xoa.'"  class="delete-btn">Xóa</a>
                                //     </td>
                                // </tr>';