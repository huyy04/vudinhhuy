<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="view/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="view/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/css/style.css" rel="stylesheet">
    <!-- css -->
    <style>
        .navbar-nav .menu {
            list-style-type: none;
        }

        .navbar-nav .li-menu {
            position: relative;
        }

        .navbar-nav .li-menu:hover .sub-menu {
            display: block;
        }

        .navbar-nav .sub-menu {
            position: absolute;
            z-index: 999;
            width: 180px;
            top: 40px;
            left: -120px;
            background-color: #f5f5f5;
            padding: 0;
            display: none;
            border-radius: 6px;
            list-style-type: none;
        }

        .navbar-nav .sub-menu li {
            padding: 10px 10px;
            color: #000;
        }

        .navbar-nav .sub-menu li:hover {
            background-color: #ccc;
            border-radius: 6px;
            color: #fff;
        }

        .navbar-nav .sub-menu::after {
            content: "";
            top: -15px;
            left: 8px;
            position: absolute;
            width: 100%;
            height: 20px;
        }

        .font:hover {
            color: #d19c97;
            cursor: default;
        }

        .bill_history {
            max-width: 80%;
            margin: 0 auto;
        }
        .bill_history h2 {
            text-align: center;
            margin: 10px 0;
        }

        .bill_history span:hover a {
            color: #ccc;
        }

        .all_bill {
            max-width: 1200px;
            margin: 0 auto;
        }

        .all_bill-products {
            border: 1px solid #000;
            padding: 0px 15px;
        }

        .products_bill {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding-top: 20px;
        }

        .products_bill-1 {
            display: flex;
        }

        .all_bill .button-submit {
            background-color: #ef4444;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 5px;
            cursor: pointer;
        }

        .all_bill .button-submit:hover{
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
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
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Randy</span>Shop</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="index.php?act=category" method="post">
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="keyword">
                        <div style="cursor: pointer;" class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="index.php?act=cart" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">
                        <?php
                        // Kiểm tra xem session giỏ hàng đã tồn tại và không rỗng
                        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
                            // Tính tổng số lượng sản phẩm trong giỏ hàng
                            $totalItems = sizeof($_SESSION['giohang'] );
                            echo $totalItems;
                        } else {
                            // Nếu giỏ hàng trống, hiển thị 0
                            echo '0';
                        }
                        ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">TOP <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="index.php?act=category&iddm=1" class="dropdown-item">TEE</a>
                                <a href="index.php?act=category&iddm=4" class="dropdown-item">POLO</a>
                                <a href="index.php?act=category&iddm=3" class="dropdown-item">HOODIE & SWEATER</a>
                                <a href="index.php?act=category&iddm=6" class="dropdown-item">ÁO SƠ MI</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">BOTTOMS<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="index.php?act=category&iddm=2" class="dropdown-item">SHORT</a>
                                <a href="index.php?act=category&iddm=5" class="dropdown-item">QUẦN JEAN</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="index.php?act=cart" class="dropdown-item">Shopping Cart</a>
                                    <a href="<?php echo isset($_SESSION['user']) ? "index.php?act=checkout" : "./view/auth/login.php"; ?>" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="index.php?act=contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="navbar-nav ml-auto py-0">
                                <ul class="menu">
                                    <li class="li-menu">
                                        <i style="font-size: 30px;" class='icon bx bx-user'></i>
                                        <ul class="sub-menu">
                                            <li><a style="text-decoration: none;" href="">Xin chào, <?= $_SESSION['user']['name'] ?></a></li>
                                            <li><a style="text-decoration: none;" href="">Trang cá nhân</a></li>
                                            <?php if ($_SESSION['user']['is_Admin'] == 1) { ?>
                                                <li><a style="text-decoration: none;" href="/eshopper-shoppingcart/admin/index.php">Vào trang quản trị</a></li>
                                            <?php } ?>
                                            <li><a style="text-decoration: none;" href="index.php?act=purchase&id=<?= $_SESSION['user']['id'] ?>">Đơn hàng</a></li>
                                            <li><a style="text-decoration: none;" href="index.php?act=dangxuat">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <div class="navbar-nav ml-auto py-0">
                                <a href="./view/auth/login.php" class="nav-item nav-link">Login</a>
                                <a href="./view/auth/register.php" class="nav-item nav-link">Register</a>
                            </div>
                        <?php } ?>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="view/img/banner1.webp" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="view/img/banner2.webp" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="view/img/banner3.webp" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->