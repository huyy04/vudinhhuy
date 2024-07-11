<?php 
    function loadall_users(){
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $result = pdo_query($sql);
        return $result;
    }

    function loadone_user($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = pdo_query_one($sql);
        return $result;
    }

    function update_user($id, $userName, $name, $address, $phone, $is_Admin){
        $sql = "UPDATE users SET userName = '$userName', name = '$name', address = '$address', phone = '$phone', is_Admin = '$is_Admin' WHERE id = '$id'";
        pdo_execute($sql);
    }

    function delete_user($id){
        $sql = "DELETE FROM users WHERE id = $id";
        pdo_execute($sql);
    }

    function insert_taikhoan($username, $phone, $address, $email, $password){
        $sql = "INSERT INTO users (name, userName, password, address, phone) values ('$username', '$email', '$password', '$address', '$phone')";
        pdo_execute($sql);
    }

    function get_user_by_name($name){
        $sql = "SELECT * FROM users WHERE userName = '$name'";
        return pdo_query_one($sql);
    }

    function getUserByUsername($user, $password){
        $sql = "SELECT * FROM users WHERE `userName` = '$user' and `password` = '$password'";
       return pdo_query_one($sql);
    }

    function dangxuat() {
        // Xóa thông tin người dùng khỏi session
        unset($_SESSION['user']);
    }

    function count_comment($id){
        $sql= "SELECT COUNT(*) FROM comments where product_id = $id";
        $return = pdo_query($sql);
        return $return;
    }
?>