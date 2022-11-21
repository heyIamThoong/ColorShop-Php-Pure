<?php include_once 'views/admin/layout/header.php' ?>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">user id</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">number</th>
                        <th scope="col">message</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $conn =connection();
                $select_message = $conn->prepare("SELECT * FROM `messages`");
                $select_message->execute();
                if ($select_message->rowCount() > 0) {
                    while ($fetch_message = $select_message->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                           <td style="font-size: 15px;"><?= $fetch_message['user_id'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['name'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['email'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['number'] ?></td>
                           <td style="font-size: 15px;"><?= $fetch_message['message'] ?></td>
                           <td>
                            <a href="index.php?action=show_messages&delete=<?= $fetch_message['id'] ?>" onclick="return confirm('Bạn có muốn xóa tin nhắn này không ? ')" class="delete-btn">Xóa</a>
                           </td>
                          
                        </tr>
                <?php
                    }
                } ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once 'views/admin/layout/footer.php' ?>