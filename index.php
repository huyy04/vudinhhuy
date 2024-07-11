<?php
ob_start();
session_start();

include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/comment.php";
include "./model/danhmuc.php";
include "./model/taikhoan.php";
include "./model/donhang.php";
$category = loadall_category();
$products = loadall_products();
$bestSeller = loadall_bestseller();

include "./view/header.php";
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'contact':
            include "./view/about.php";
            break;
        case 'category':
            if(isset($_POST['keyword']) && ($_POST['keyword']) != ""){
                $keyw = $_POST['keyword'];
            }else {
                $keyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
               $iddm = 0;
            }
            $search=search_products($keyw, $iddm);
            $sp_cungloai = loadsp_cungloai($iddm);
            if (!empty($keyw)) {
                // Nếu có từ khóa tìm kiếm, thực hiện tìm kiếm và cập nhật danh sách sản phẩm
                $sp_cungloai = search_products($keyw, $iddm);
                if(empty(trim($keyw))){
                    $ketqua = "Không tìm thầy sản phẩm!";
                }
            }
            $getId = $iddm;
            $getName = $keyw;
            if(isset($_POST['submit'])){
                $iddm = $_POST['iddm'];
                $start = ($_POST['start']);
                $end = ($_POST['end']);
                $sp_cungloai = filter_category($iddm ,$start, $end);
            }
            include "./view/category.php";
            break;
        
           
            break;
        case 'detail':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sp = loadone_sanpham($_GET['idsp']);
                $comments = loadall_comments($_GET['idsp']);
                $total = count_comment($_GET['idsp']);
                include "./view/detail_product.php";
            } else {
                include "./view/home.php";
            }
            break;
        case 'comment':
            if(isset($_POST['submit']) && ($_POST['submit'])){
                $name = $_SESSION['user']['id'];
                $content = $_POST['noidung'];
                $productId = $_POST['idsp'];
                $date = $_POST['currentDateTime'];
                insert_comment($content, $productId, $name, $date);
                header("location: index.php?act=detail&idsp=". $productId);
            }
            break;
        case 'cart':
            include "./view/cart.php";
            break;
        case 'addcart':
            // Lấy dữ liệu từ form để lưu giỏ hàng
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $image = $_POST['image'];
                $price = $_POST['gia'];
                if(isset($_POST['sl']) && ($_POST['sl']) > 0){
                    $amount = $_POST['sl'];
                }else {
                    $amount = 1;
                }
                $fg = 0; // nếu $fg = 0 thì số lượng không đổi
                $i = 0;
                foreach ($_SESSION['giohang'] as $value) {
                    if ($value['1'] === $tensp) {
                        $amountNew = $amount + $value['4'];
                        $_SESSION['giohang'][$i]['4'] = $amountNew;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }
                // khởi tạo 1 mảng con trc khi đưa vào giỏ hàng
                if ($fg == 0) {
                    $item = array($id, $tensp, $image, $price, $amount);
                    $_SESSION['giohang'][] = $item;
                }
                header("location: index.php?act=cart");
            }
            break;
        
        case 'deleteCart':
            if(isset($_GET['i']) && ($_GET['i']) > 0){
                if(isset($_SESSION['giohang'])){
                    array_splice($_SESSION['giohang'], $_GET['i'], 1);
                }
            }else {
                if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            }
            if(isset($_SESSION['giohang']) && ($_SESSION['giohang']) > 0){
                header("location: index.php?act=cart");
            }else {
                header("location: index.php");
            }
            break;

        case 'updateCart':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['act']) && $_GET['act'] === 'updateCart') {
                $i = $_GET['i'];
                $quantity = $_POST['quantity'];
            
                if (isset($_POST['increment'])) {
                    // Tăng số lượng
                    $_SESSION['giohang'][$i]['4']++;
                } elseif (isset($_POST['decrement'])) {
                    // Giảm số lượng, nhưng đảm bảo không dưới 1
                    $_SESSION['giohang'][$i]['4'] = max(1, $_SESSION['giohang'][$i]['4'] - 1);
                }
            
                // Redirect về trang giỏ hàng
                header('Location: index.php?act=cart');
                exit();
            }
            break;

        case 'dangky':
            if (isset($_POST['dangky'])) {
                $username = $_POST['username'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                // Kiểm tra trùng lặp email trước khi đăng nhập
                $emailExists = get_user_by_name($_POST['email']);

                if ($emailExists) {
                    header("location: ./view/auth/register.php?register&error=Tài khoản đã tồn tại!");
                    exit();
                } else {
                    // Băm mật khẩu trước khi lưu vào cơ sở dữ liệu
                    // $hash = password_hash($password, PASSWORD_DEFAULT);
                    insert_taikhoan($username, $phone, $address, $email, $password);
                    header("location: ./view/auth/login.php?message=Đăng ký thành công!");
                }
            }
            include "./view/home.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap'])  && ($_POST['dangnhap'] != "")) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $emailExists = get_user_by_name($_POST['user']);

                if (!$emailExists) {
                    header("location: ./view/auth/login.php?login&error=Tài khoản không tồn tại!");
                    exit();
                }
                $userDb = getUserByUsername($user, $password);
                if (is_array($userDb)) {
                    $_SESSION['user'] = $userDb;
                    header("location: index.php");
                    if($_SESSION['user']['is_Admin'] == 1){
                        header("location: ./admin/index.php");
                    }
                } else {
                    header("location: ./view/auth/login.php?error2= Tài khoản hoặc mật khẩu không đúng!");
                }
            }
            include "./view/home.php";
            break;

        case 'dangxuat':
            dangxuat();
            header("location: index.php");
            exit();
            break;

        case 'checkout':
            include "./view/checkout.php";
            break;
        
        case 'thanhtoan':
            if(isset($_POST['submit']) && ($_POST['submit'])){
                // lấy dữ liệu
                $user_id = $_SESSION['user']['id'];
                $product_id = $_POST['prdId'];
                $totalMoney = $_POST['totalMoney'];
                $payment = $_POST['payment'];
                $amount = $_POST['sl'];
                $date = $_POST['currentDateTime'];
                //chèn dữ liệu
                $lastOrder= insert_donhang($user_id, $totalMoney, $payment, $date);
                
                $orderId = $lastOrder['id'];
                    for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
                        $product_id = $_POST['prdId'][$i];
                        $amount = $_POST['sl'][$i];
                        $currentQuantity = intval($amount);
                        insert_order_details($orderId, $product_id,  $amount);
                        update_product_quantity($product_id, $currentQuantity);
                    }

           
                header("location: index.php?act=purchase");
                unset($_SESSION['giohang']);
                exit();
            }
            include "./view/checkout.php";
            break;
        
        case 'purchase':
            if(isset($_POST['huy-prd'])){
                update_order_by_id($_POST['order_id']);
                header('location: index.php?act=purchase');
            }
            $orders = loadall_order($_SESSION['user']['id']);
            $results = [];

    foreach ($orders as $key => $value) {
        $keyI = array_search($value['orderId'], array_column($results, 'orderId'));
        extract($value);
        if ($keyI === false) {
            $order = array(
                'orderId' => $orderId,
                'status' => $status,
                'totalMoney' => $totalMoney,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'products' => array(
                    [
                        "prdId" => $prdId,
                        'name' => $name,
                        'image' => $image,
                        'price' => $price,
                        'amount' => $amount
                    ],
                ),
            );
            array_push($results, $order);
        } else {
            array_push($results[$keyI]['products'], array(

                "prdId" => $prdId,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'amount' => $amount

            ));
        }
    }
            include "./view/purchase.php";
            break;
    }
} else {
    include "./view/home.php";
}

include "./view/footer.php";
