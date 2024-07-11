<?php 
    // load người bình luận sản phẩm
    function loadall_comments($idsp){
       $sql = "SELECT comments.content, comments.created_at, comments.updated_at, users.name FROM comments
                LEFT JOIN users ON comments.user_id = users.id
                LEFT JOIN products ON comments.product_id = products.id
                WHERE products.id = $idsp";
        $result = pdo_query($sql);
        return $result;
    }

    function insert_comment($content, $productId, $userId, $date){
        $sql = "INSERT INTO comments (user_id, product_id, content ,created_at) VALUES ('$userId', '$productId', '$content', '$date')";
        pdo_execute($sql);
    }

    function loadall_binhluan(){
        $sql = "SELECT comments.id, comments.content, comments.created_at, comments.updated_at, products.name as product ,users.name FROM comments
        LEFT JOIN users ON comments.user_id = users.id
        LEFT JOIN products ON comments.product_id = products.id";
        $result = pdo_query($sql);
        return $result;
    }

    function delete_comments($id){
        $sql = "DELETE FROM comments WHERE id = '$id'";
        pdo_execute($sql);
    }

?>