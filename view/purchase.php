<!-- <div class="bill_history">
    <?php if (count($results) == 0) { ?>
        <div style="padding-left: 15px;">Bạn chưa có đơn hàng nào! <span style="cursor: pointer; padding: 5px 10px; background-color: #ef4444; color: #fff; border-radius: 5px; margin-left: 5px;"><a style="text-decoration: none; color:#fff" href="index.php">Quay về trang chủ</a></span>
        </div>
    <?php } else { ?>
        <h2>Lịch sử Đơn hàng</h2>
        <table style="width: 100%;" class="table">
            <thead>
                <tr>
                    <th scope="col">ID đơn hàng</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $value) : ?>
                    <tr>
                        <th scope="row"><?= $value['orderId'] ?></th>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['amount'] ?></td>
                        <td><?= number_format($value['price']) ?>VNĐ</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <div class="d-flex" style="align-content: center; justify-content: space-between; padding: 30px 0;">
                    <div style="color: #f59E0B; font-size: 20px;">Ngày Đặt: <?= $value['updated_at'] ?></div>
                    <div style="text-decoration: underline; font-size: 20px;">Tổng: <span style="color: #10b981;"><?= number_format($value['totalMoney']) ?>VNĐ</span></div>
                    <div style="font-size: 20px; float: right;">Trạng Thái: <span style="color: #f87171;"><?= $value['status'] ?></span></div>
                </div>
        </table>
    <?php } ?>
</div> -->
<?php if (count($results) == 0) echo ' <div style="padding-left: 15px;">Bạn chưa có đơn hàng nào! <span style="cursor: pointer; padding: 5px 10px; background-color: #ef4444; color: #fff; border-radius: 5px; margin-left: 5px;"><a style="text-decoration: none; color:#fff" href="index.php">Quay về trang chủ</a></span>
        </div>' ?>
<?php foreach ($results as $value) : ?>
    <div class="all_bill" style="padding: 10px 0;">
        <div class="all_bill-products">
            <div class="d-flex" style="justify-content: space-between; align-items: center;">
                <h3 style="font-weight: 400; padding: 10px 0;">ID Đơn Hàng: <?= $value['orderId'] ?></h3>
               <?php if($value['status'] == 'chờ xác nhận'){ ?>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?= $value['orderId'] ?>">
                        <button class="button-submit" name="huy-prd" type="submit">Hủy đơn hàng</button>
                    </form>
                <?php } ?>
            </div>

            <?php foreach ($value['products'] as $key2 => $value2) : ?>
                <div class="products_bill">
                    <div class="products_bill-1">
                        <img width="100px" height="100px" src="./view/img/<?= $value2['image'] ?>" alt="">
                        <div style="padding: 0 20px;" class="product-content">
                            <div style="font-size: 20px;"><?= $value2['name'] ?></div>
                            <div>số lượng: <?= $value2['amount'] ?></div>
                        </div>
                    </div>
                    <div style="font-size: 20px;">
                        Giá tiền: <?= number_format($value2['price']) ?> VNĐ
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="d-flex" style="align-content: center; justify-content: space-between; padding: 30px 0;">
                <div style="color: #f59E0B; font-size: 20px;">Ngày Đặt: <?= $value['updated_at'] ?></div>
                <div style="text-decoration: underline; font-size: 20px;">Tổng: <span style="color: #10b981;"><?= number_format($value['totalMoney']) ?>VNĐ</span></div>
                <div style="font-size: 20px; float: right;">Trạng Thái: 
                    <?php if(strtolower($value['status']) == 'chờ xác nhận') echo '<span style="color: #f87171;">Chờ xác nhận</span>'?>
                    <?php if(strtolower($value['status']) == 'đã hủy') echo '<span style="color: #f87171;">Đã hủy</span>'?>
                    <?php if(strtolower($value['status']) == 'đang xử lý') echo '<span style="color: #f87171;">Đang xử lý</span>'?>
                    <?php if(strtolower($value['status']) == 'đang giao hàng') echo '<span style="color: #f87171;">Đang giao hàng</span>'?>
                    <?php if(strtolower($value['status']) == 'giao hàng thành công') echo '<span style="color: #f87171;">Giao hàng thành công</span>'?>
                </div>
            </div>
        </div>

    </div>
<?php endforeach; ?>