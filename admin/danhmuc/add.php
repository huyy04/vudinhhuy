
<form action="index.php?act=adddm" method="POST" style="position: relative; left: 30%; top: 30px; width: 40%;" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên Loại</label>
        <input type="text" name="tenloai" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Chọn Ảnh</label>
        <input style="padding-top: 9px;" type="file" class="form-control" id="exampleInputPassword1" name="image" required>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    <?php 
        if(isset($thongbao) && ($thongbao) != ""){
            echo $thongbao;
        }
    ?>
</form>