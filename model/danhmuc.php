<?php
// load tất cả danh mục cùng loại
function loadsp_cungloai($iddm)
{
    $sql = "SELECT * FROM products WHERE groupProduct_Id = '$iddm'";
    $result = pdo_query($sql);
    return $result;
}
// load tất cả danh mục
function loadall_category()
{
    $sql = "SELECT * FROM groupproduct";
    $result = pdo_query($sql);
    return $result;
}

function insert_danhmuc($tenloai, $image)
{
    $sql = "insert into groupproduct (name, image) values ('$tenloai', '$image')";
    pdo_execute($sql);
}
function detele_danhmuc($id)
{
    $sql = "delete from groupproduct where id=" . $id;
    pdo_execute($sql);
}

//Load 1 danh mục lên 
function loadone($id)
{
    $sql = "SELECT * FROM groupproduct WHERE id = '$id'";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id, $tenloai, $image)
{
    $sql = "update groupproduct set name='$tenloai', image='$image' where id='$id'";
    pdo_execute($sql);
}


?>
