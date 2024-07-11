 <!-- Cart Start -->
 <div class="container-fluid pt-5">
     <div class="row px-xl-5">
         <div class="col-lg-8 table-responsive mb-5">
             <table class="table table-bordered text-center mb-0">
                 <thead class="bg-secondary text-dark">
                     <tr>
                         <th>STT</th>
                         <th>Products</th>
                         <th>Price</th>
                         <th>Quantity</th>
                         <th>Total</th>
                         <th>Remove</th>
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
                                        <form method="post" action="index.php?act=updateCart&i=' . $i . '">
                                            <div class="input-group quantity mx-auto" style="width: 200px; ">
                                                <button style="height: 32px; display: flex; align-items: center" type="submit" class="btn btn-primary" name="decrement">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input name="quantity" type="text" class="form-control form-control-sm bg-secondary text-center" value="' . $value['4'] . '" />
                                                <button style="height: 32px; display: flex; align-items: center" type="submit" class="btn btn-primary" name="increment">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="align-middle">' . number_format($total) . 'VNĐ</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-primary"><a style="color: white; text-decoration: none;" href="index.php?act=deleteCart&i=' . $i . '">Xóa</a></button>
                                    </td>
                                </tr>';
                                $i++;
                            }
                        }
                        ?>
                 </tbody>
             </table>
         </div>
         <div class="col-lg-4">
             <div class="card border-secondary mb-5">
                 <div class="card-header bg-secondary border-0">
                     <h4 class="font-weight-semi-bold m-0">Giỏ hàng</h4>
                 </div>
                 <div class="card-body">
                     <div class="d-flex justify-content-between mb-3 pt-1">
                         <h6 class="font-weight-medium">Tổng phụ</h6>
                         <h6 class="font-weight-medium"><?= number_format($tong) ?>VNĐ</h6>
                     </div>
                     <div class="d-flex justify-content-between">
                         <h6 class="font-weight-medium">Tiền Ship</h6>
                         <h6 class="font-weight-medium">10,000VNĐ</h6>
                     </div>
                 </div>
                 <div class="card-footer border-secondary bg-transparent">
                     <div class="d-flex justify-content-between mt-2">
                         <h5 class="font-weight-bold">Tổng</h5>
                         <h5 class="font-weight-bold"><?= number_format($tong + 10) ?> VNĐ</h5>
                     </div>
                     <a style="text-decoration: none;" href="<?php echo isset($_SESSION['user']) ? "index.php?act=checkout" : "./view/auth/login.php"; ?>"><button class="btn btn-block btn-primary my-3 py-3">Thanh Toán</button></a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Cart End -->