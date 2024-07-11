<?php 
    include "../model/pdo.php";
    include "../model/sanpham.php";
    include "../model/danhmuc.php";
    include "../model/comment.php";
    include "../model/taikhoan.php";
    include "../model/donhang.php";
    $danhmuc = loadall_category();
    $sp = load_products();
    include "header.php";
    if(isset($_GET['act']) && ($_GET['act']) != ""){
        $act = $_GET['act'];
        switch($act){
            case 'listsp':
                $sanpham = load_products();
                include "sanpham/list.php";
                break;
            case 'addsp':
                if(isset($_POST['themmoi'])){
                    $name = $_POST['tensp'];
                    $soluong = $_POST['soluong'];
                    $giatien = $_POST['giatien'];
                    $categoryid = $_POST['categoryid'];
                    // xử lý ảnh
                    $file = $_FILES['image'];
                    $image = $file['name'];
                    move_uploaded_file($file['tmp_name'], '../view/img/' . $image);
                    insert_sanpham($name, $image, $giatien, $soluong, $categoryid);
                    $thongbao = "Thêm sản phẩm thành công!";
                }
                include "./sanpham/add.php";
                break;
            
            case 'suasp':
                if(isset($_GET['id']) && ($_GET['id']) > 0){
                    $id = $_GET['id'];
                    $sp = loadone_sanpham($id);
                }
                include "./sanpham/update.php";
                break;

            case 'updatesp':
                if(isset($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $name = $_POST['tensp'];
                    $soluong = $_POST['soluong'];
                    $giatien = $_POST['giatien'];
                    $categoryid = $_POST['categoryid'];
                    // xử lý ảnh
                    $file = $_FILES['image'];
                    $image = $file['name'];
                    move_uploaded_file($file['tmp_name'], '../view/img/' . $image);
                    update_sanpham($id, $name, $image, $giatien, $soluong, $categoryid);
                    $thongbao = "Cập nhật sản phẩm thành công!";
                }
                $sanpham = load_products();
                include "./sanpham/list.php";
                break;


            case 'xoasp':
                if(isset($_GET['id']) && ($_GET['id']) > 0){
                    $id = $_GET['id'];
                    delete_sanpham($id);
                }
                $sanpham = load_products();
                include "./sanpham/list.php";
                break;

            case 'list-user':
                $user = loadall_users();
                include "user/list.php";
                break;
            
            case 'capnhat-user':
                if(isset($_GET['id']) && ($_GET['id']) > 0){
                    $id = $_GET['id'];
                    $user = loadone_user($id);
                }
                include "./user/update.php"; 
                break;

            case 'update-user':
                if(isset($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $userName = $_POST['userName'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $name = $_POST['user'];
                    $is_Admin = $_POST['is_Admin'];
                    update_user($id, $userName, $name, $address, $phone, $is_Admin);
                    $thongbao = "Cập nhật sản phẩm thành công!";
                }
                $user = loadall_users();
                include "./user/list.php";
                break;
            
            case 'delete-user':
                if(isset($_GET['id']) && ($_GET['id']) > 0){
                    $id = $_GET['id'];
                    delete_user($id);
                } 
                $user = loadall_users();
                include "./user/list.php";
                break;

            case 'listdm':
                $danhmuc = loadall_category();
                include "danhmuc/list.php";
                break;
            
            case 'adddm':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    $tenloai = $_POST['tenloai'];
                    $file = $_FILES['image'];
                    $image = $file['name'];
                    move_uploaded_file($file['tmp_name'], 'upload/' . $image);
                    insert_danhmuc($tenloai, $image);
                    $thongbao = "thêm thành công";
                }
                include "./danhmuc/add.php";
                break;
            
            case 'suadm':
                if(isset($_GET['id']) && ($_GET['id']) > 0){
                    $id = $_GET['id'];
                    $dm = loadone($id);
                }
                include "./danhmuc/update.php";
                break;
            
            case 'updatedm':
                if(isset($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $tenloai = $_POST['tenloai'];
                    // xử lý ảnh
                    $file = $_FILES['image'];
                    $image = $file['name'];
                    move_uploaded_file($file['tmp_name'], 'upload/' . $image);
                    update_danhmuc($id, $tenloai, $image);
                    
                }
                $danhmuc = loadall_category();
                include "./danhmuc/list.php";
                break;

            case 'xoadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    detele_danhmuc($_GET['id']);
                }
                $danhmuc = loadall_category();
                include "danhmuc/list.php";
                break;

            case 'list-comment':
                $comments = loadall_binhluan();
                include "comment/list.php";
                break;
            
            case 'xoabl':
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_comments($id);
                }
                $comments = loadall_binhluan();
                include "comment/list.php";
                break;

            case 'list-donhang':
                $donhang = loadall_donhang();
                include "donhang/list.php";
                break;

            case 'xoa-donhang':
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_donhang($id);
                }
                $donhang = loadall_donhang();
                include "./donhang/list.php";
                break;

            case 'bill-details':
                // Hiển thị
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $getOneOrderDetails = getOneOrderDetails($_GET['id']);
                    $getOrderDetails = loadall_order_details($id);
                    if(isset($_POST['submit'])){
                        $id = $_POST['id'];
                        $orderStatus = $_POST['order_status'];
                        updateStatus($id, $orderStatus);
                        $thongbao = "cập nhật thành công!";
                    }
                }
               
                include './donhang/ctdonhang.php';
                break;

            case 'list-thongke':
                include "thongke/thong-ke.php";
                break;
        }
    }else {
        include "home.php";
    }
    include "footer.php";
?>