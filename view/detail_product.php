<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="view/img/<?= $sp['image'] ?>" alt="Image" />
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= $sp['name'] ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">Giá: <?= number_format($sp['price']) ?>VNĐ</h3>
            <p class="mb-4">
                🔹 Bảng size Outerity
                S: Dài 69 Rộng 52.5 | 1m50 - 1m65, 45 - 55Kg
                M: Dài 73 Rộng 55 | 1m60 - 1m75, 50 - 65Kg
                L: Dài 76.5 Rộng 57.5 | 1m7 - 1m8, 65Kg - 80Kg
                👉 Nếu chưa biết lựa size bạn có thể inbox để được chúng mình tư vấn.
                <br>
                ‼LƯU Ý ▪Khi giặt sản phẩm bằng tay: Vui lòng hoà tan kĩ nước giặt, bột giặt với nước sau đó mới cho sản phẩm vào. ▪️Khi giặt sản phẩm bằng máy giặt: Vui lòng đổ nước giặt, bột giặt vào khay của máy.
                <br>
                🚫TUYỆT ĐỐI KHÔNG đổ nước giặt, bột giặt trực tiếp vào sản phẩm. Như vậy sẽ ảnh hưởng đến màu sắc của sản phẩm và làm cho áo có tình trạng loang màu. Outerity xin cảm ơn ạ🖤
            </p>
            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Kích cỡ:</p>
                <form>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-1" name="size" />
                        <label class="custom-control-label" for="size-1">XS</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-2" name="size" />
                        <label class="custom-control-label" for="size-2">S</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-3" name="size" />
                        <label class="custom-control-label" for="size-3">M</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-4" name="size" />
                        <label class="custom-control-label" for="size-4">L</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-5" name="size" />
                        <label class="custom-control-label" for="size-5">XL</label>
                    </div>
                </form>
            </div>
            <div class="d-flex mb-4">
                <p class="text-dark font-weight-medium mb-0 mr-3">Màu:</p>
                <form>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-1" name="color" />
                        <label class="custom-control-label" for="color-1">Black</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-2" name="color" />
                        <label class="custom-control-label" for="color-2">White</label>
                    </div>
                </form>
            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 260px">
                    <form class="d-flex align-items-center" action="index.php?act=addcart" method="post">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary" onclick="decrementValue()">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" class="form-control bg-secondary text-center" min="1" max="50" value="1" required="" name="sl" id="number">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary" onclick="incrementValue()">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <input type="hidden" value="<?= $sp['id'] ?>" name="id">
                        <input type="hidden" value="<?= $sp['name'] ?>" name="tensp">
                        <input type="hidden" value="<?= $sp['image'] ?>" name="image">
                        <input type="hidden" value="<?= $sp['price'] ?>" name="gia">
                        <input style="width: 300px; margin-left: 15px;" type="submit" value="Đặt Hàng" name="addtocart" class="btn btn-primary px-3">
                    </form>
                    <script>
                        function incrementValue() {
                            var value = parseInt(document.getElementById('number').value, 10);
                            value = isNaN(value) ? 0 : value;
                            value++;
                            document.getElementById('number').value = parseInt(value);
                        }

                        function decrementValue() {
                            var value = parseInt(document.getElementById('number').value, 10);
                            value = isNaN(value) ? 0 : value;

                            if (value > 0) {
                                value--;
                            }

                            document.getElementById('number').value = parseInt(value);
                        }
                    </script>
                </div>
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Chia sẻ lên:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                <?php
                $arr = $total[0]['COUNT(*)'];
                ?>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá (<?php echo $arr; ?>)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Mô tả về sản phẩm</h4>
                    <p>
                        🔹 Chính sách đổi trả Outerity. <br>
                        - Miễn phí đổi hàng cho khách mua ở Outerity trong trường hợp bị lỗi từ nhà sản xuất, giao nhầm hàng, nhầm size. <br>
                        - Quay video mở sản phẩm khi nhận hàng, nếu không có video unbox, khi phát hiện lỗi phải báo ngay cho Outerity trong 1 ngày tính từ ngày giao hàng thành công. Qua 1 ngày chúng mình không giải quyết khi không có video unbox. <br>
                        - Sản phẩm đổi trong thời gian 3 ngày kể từ ngày nhận hàng <br>
                        - Sản phẩm còn mới nguyên tem, tags, sản phẩm chưa giặt và không dơ bẩn, hư hỏng bởi những tác nhân bên ngoài cửa hàng sau khi mua hàng. <br>
                    </p>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Tất Cả Bình Luận <?= $sp['name'] ?></h4>

                            <?php foreach ($comments as $comment) : ?>
                                <div class="media mb-4">
                                    <img src="view/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px" />
                                    <div class="media-body">
                                        <h6>
                                            <?= $comment['name'] ?><small> - <i> <?= $comment['updated_at'] ?></i></small>
                                        </h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>
                                            <?= $comment['content'] ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="col-md-6">
                                <h4 class="mb-4">Bình Luận</h4>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Đánh giá của bạn * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form action="index.php?act=comment&idsp=<?= $sp['id'] ?>" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="idsp" value="<?= $sp['id'] ?>">
                                        <input type="hidden" name="currentDateTime" value="<?= date('Y-m-d H:i:s') ?>">
                                        <textarea name="noidung" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="submit" value="Leave Your Review" class="btn btn-primary px-3" />
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-6">
                                Vui lòng đăng nhập để thực hiện bình luận
                                <a href="/eshopper-shoppingcart/view/auth/login.php">Login</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->