

    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Chi tiết đơn hàng</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <?php if(strtolower($getOneOrderDetails['status']) == 'đã hủy' || strtolower($getOneOrderDetails['status']) == 'giao thành công'){ ?>
                            <div>.....</div>
                        <?php }else { ?>
                            <div style="padding: 10px 0;">
                                <h3>Cập nhật trạng thái</h3>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                    <select name="order_status" id="">
                                        <option value="đang xử lý">Đang xử lý</option>
                                        <option value="đang giao hàng">Đang giao hàng</option>
                                        <option value="giao thành công">Giao thành công</option>
                                    </select>
                                    <button class="btn-submit" style="background-color: #ef4444; color: #fff; border: none; border-radius: 3px; padding: 5px; margin-left: 10px; cursor: pointer;" name="submit" type="submit">Cập nhật</button>
                                </form>
                                <?php if (isset($thongbao)) {
                                    echo $thongbao;
                                } ?>
                            </div>
                        <?php } ?>
                        <div style="padding: 15px 0;">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>ID đơn hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Ảnh</th>
                                        <th>Giá tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getOrderDetails as $value) : ?>
                                        <tr>
                                            <td><?= $value['orderId'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['amount'] ?></td>
                                            <td>
                                                <img src="../view/img/<?= $value['image'] ?>" alt="" width="50px" height="50px">
                                            </td>
                                            <td><?= number_format($value['price']) ?>VNĐ</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <div>
                                <div style="font-size: 20px;">Tổng tiền: <span style="color: red"><?= number_format($value['totalMoney']) ?> VNĐ</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
