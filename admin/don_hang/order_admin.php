<?php include_once 'views/admin/layout/header.php' ?>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4" style="font-size: 40px;">Danh sách đơn hàng</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">placed on</th>
                        <th scope="col">name</th>
                        <th scope="col">number</th>
                        <th scope="col">address</th>
                        <th scope="col">total products</th>
                        <th scope="col">total price</th>
                        <th scope="col">payment method</th>
                        <th scope="col" colspan="3">patment status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = connection();
                    $select_orders = $conn->prepare("SELECT * FROM `orders`");
                    $select_orders->execute();
                    if ($select_orders->rowCount() > 0) {
                        while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                            <td><?= $fetch_orders['placed_on'] ?></td>
                            <td><?= $fetch_orders['name'] ?></td>
                            <td><?= $fetch_orders['number'] ?></td>
                            <td><?= $fetch_orders['address'] ?></td>
                            <td><?= $fetch_orders['total_products'] ?></td>
                            <td><?= $fetch_orders['total_price'] ?></td>
                            <td><?= $fetch_orders['method'] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="order_id" value="<?= $fetch_orders['id'] ?>">
                                    <select name="payment_status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option selected disabled><?= $fetch_orders['payment_status'] ?></option>
                                        <option value="pending">Chưa hoàn thành</option>
                                        <option value="completed">Hoàn thành</option>
                                    </select>
                                    <input type="submit" value="Update" name="update_payment" class="btn btn-warning m-2" style="color: white;">
                                    <a href="index.php?action=order_admin&delete=<?= $fetch_orders['id'] ?>" onclick="return confirm('delete this order?');">Xóa</a>
                                </form>
                            </td>
                            </tr>



                    <?php

                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'views/admin/layout/footer.php' ?>