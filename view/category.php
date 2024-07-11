<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Danh sách</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Tất cả danh mục</h5>
                <?php foreach ($category as $value) : ?>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <a style="text-decoration: none;" href="index.php?act=category&iddm=<?= $value['id'] ?>" for="price-1"><?= $value['name'] ?></a>
                        <span class="badge border font-weight-normal">Product</span>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Price End -->

            <!-- Color Start -->
            
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Chọn khoảng giá</h5>
                <form action="index.php?act=category" method="post">
                    <input type="hidden" name="iddm" value="<?= $getId ?>">
                    <div class=" custom-checkbox d-flex align-items-center mb-3">
                        <input style="width: 100%; border-radius: 3px; border: 1px solid #ccc;" type="text" name="start" placeholder="Thấp nhất" required>
                        -
                        <input style="width: 100%; border-radius: 3px; border: 1px solid #ccc;" type="text" name="end" placeholder="Cao nhất" required>
                    </div>
                    <input style="border: none; cursor: pointer; border-radius: 3px; padding: 4px 20px; background-color: #d19c97; color: #fff" type="submit" name="submit" value="Lọc">
                </form>
            </div>
            <!-- Color End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div style="background-color: #fecaca; height: 50px;" class="d-flex align-items-center justify-content-between mb-4">
                        <form action="">
                            <div style="padding-left: 15px;">Sắp xếp theo: <span style="cursor: pointer; padding: 5px 10px; background-color: #ef4444; color: #fff; border-radius: 5px; margin-left: 5px;">Mới nhất</span>
                                <span style=" margin: 0 15px;">Bán chạy nhất</span>
                            </div>
                        </form>
                    </div>
                </div>
                <?php foreach ($sp_cungloai as $value) : ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <form action="index.php?act=addcart" method="post">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <a href="index.php?act=detail&idsp=<?= $value['id'] ?>"><img class="img-fluid w-100" src="./view/img/<?= $value['image'] ?>" alt=""></a>
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 style="font-size: 20px;" class="font text-truncate mb-3"><?= $value['name'] ?></h6>
                                    <div class="d-flex justify-content-around">
                                        <h6 style="color: #d19c97;"><strong>Giá: </strong><?= number_format($value['price']) ?>VNĐ</h6>
                                        <h6 style="font-size: 14px;" class="text-muted ml-2">Đã bán: <?= $value['quantity_sold'] ?></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="index.php?act=detail&idsp=<?= $value['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                    <div>
                                        <i class="fas fa-shopping-cart text-primary"></i>
                                        <input class=" btn text-dark p-0" style="background-color: #fff; border: none; font-size: 0.9rem; padding: 0; cursor: pointer;" type="submit" value="Thêm giỏ hàng" name="addtocart">
                                    </div>
                                </div>
                                <input type="hidden" value="<?= $value['id'] ?>" name="id">
                                <input type="hidden" value="<?= $value['name'] ?>" name="tensp">
                                <input type="hidden" value="<?= $value['image'] ?>" name="image">
                                <input type="hidden" value="<?= $value['price'] ?>" name="gia">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if(isset($ketqua)){
                    echo "<div style='margin-left: 20px; padding: 10px 0'>  $ketqua </div>";
                    
                } ?>
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->