 <!-- Cart Start -->
 <div class="container-fluid pt-2">
     <div class="row px-xl-5">
         <div style="padding-right: 50px; border-right: 1px solid #ccc;" class="col-lg-8 table-responsive mb-5">
             <table class="table table-bordered text-center mb-0">
                 <thead class="bg-secondary text-dark">
                     <tr>
                         <th>STT</th>
                         <th>Sản phẩm</th>
                         <th>Giá</th>
                         <th>Số lượng</th>
                         <th>Tổng</th>
                     </tr>
                 </thead>
                 <tbody class="align-middle">
                     <?php
                        $i = 0;
                        $tong = 0;
                        if (isset($_SESSION['giohang']) && sizeof($_SESSION['giohang']) > 0) {
                            foreach ($_SESSION['giohang'] as $value) {
                                $total = floatval($value['3']) * floatval($value['4']);
                                $tong += $total;
                                echo '<tr>
                                    <td class="align-middle">' . ($i + 1) . '</td>
                                    <td class="align-middle">
                                        <img src="view/img/' . $value['2'] . '" alt="" style="width: 50px" />' . $value['1'] . '
                                    </td>
                                    <td class="align-middle">' . number_format($value['3']) . 'VNĐ</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px">
                                            <input type="text" class="form-control form-control-sm bg-secondary text-center" value="' . $value['4'] . '" />
                                        </div>
                                    </td>
                                    <td class="align-middle">' . number_format($total + 10) . 'VNĐ</td>
                                </tr>';
                                $i++;
                            }
                        }
                        ?>
                 </tbody>
             </table>
             <div style="float: right; padding: 20px 30px; font-size: 22px;">Tổng tiền: <?= number_format($tong + 10) ?>VNĐ</div>
         </div>
         <div class="col-lg-4">
             <div class="mb-4">
                 <h4 class="font-weight-semi-bold mb-4">Địa chỉ thanh toán</h4>
                 <form action="index.php?act=thanhtoan" method="POST">
                
                    <?php foreach($_SESSION['giohang'] as $value): ?>
                         <input type="hidden" name="prdId[]" value="<?= $value['0'] ?>"> 
                         <input type="hidden" name="sl[]" value="<?= $value['4'] ?>">
                     <?php endforeach; ?>
                     <input type="hidden" name="totalMoney" value="<?= ($tong + 10) ?>">
                     <input type="hidden" name="currentDateTime" value="<?= date('Y-m-d H:i:s') ?>">
                    <div class="row">
                         <div class="col-md-6 form-group">
                             <label>Họ tên</label>
                             <input class="form-control" name="name" value="<?= $_SESSION['user']['name'] ?>" type="text" />
                         </div>
                         <div class="col-md-6 form-group">
                             <label>Email</label>
                             <input class="form-control" name="email" value="<?= $_SESSION['user']['userName'] ?>" type="email"/>
                         </div>
                         <div class="col-md-6 form-group">
                             <label>Địa chỉ</label>
                             <input class="form-control" name="address" value="<?= $_SESSION['user']['address'] ?>" type="text"/>
                         </div>
                         <div class="col-md-6 form-group">
                             <label>Số điện thoại</label>
                             <input class="form-control" name="phone" type="text" value="<?= $_SESSION['user']['phone'] ?>" />
                         </div>
                     </div>
                    
                         <div class="card-header bg-secondary border-0">
                             <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                         </div>
                         <div class="card-body">
                             <div class="form-group">
                                 <div class="custom-control custom-radio">
                                     <input type="radio" class="custom-control-input" value="tienmat" name="payment" id="paypal" />
                                     <label class="custom-control-label" for="paypal">Thanh toán khi nhận hàng</label>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="custom-control custom-radio">
                                     <input type="radio" class="custom-control-input" name="payment" value="vnpay" id="directcheck" />
                                     <label class="custom-control-label" for="directcheck">Thanh toán ví vnpay</label>
                                 </div>
                             </div>
                             <div class="">
                                 <div class="custom-control custom-radio">
                                     <input type="radio" class="custom-control-input" value="online" name="payment" id="banktransfer" />
                                     <label class="custom-control-label" for="banktransfer">Thanh toán Online</label>
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer border-secondary bg-transparent">
                            <input onclick="alert('Đặt hàng thành công!')" type="submit" value="Thanh Toán" name="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                         </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Cart End -->