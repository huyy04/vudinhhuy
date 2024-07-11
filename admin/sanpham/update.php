
<form action="index.php?act=updatesp" method="POST" style="position: relative; left: 30%; top: 30px; width: 40%;" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" value="<?= $sp['id'] ?>" name="id">
        <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
        <input type="text" name="tensp" value="<?= $sp['name'] ?>" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Chọn Ảnh</label>
        <input style="padding-top: 9px;" type="file" class="form-control" id="exampleInputPassword1" name="image" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số Lượng</label>
        <input type="number" name="soluong" value="<?= $sp['amount'] ?>" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá Tiền</label>
        <input type="number" name="giatien" value="<?= $sp['price'] ?>" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Danh Mục</label>
        <select name="categoryid" id="">
            <?php foreach($danhmuc as $value): ?>
                <option value="<?= $value['id'] ?>" <?= ($value['id'] == $sp['groupProduct_Id']) ? 'selected' : '' ?>><?= $value['name'] ?></option>
            <?php endforeach; ?>    
        </select>
    </div>
    <input type="submit" name="capnhat" class="btn btn-primary" value="Submit">
    <?php 
        if(isset($thongbao) && ($thongbao) != ""){
            echo $thongbao;
        }
    ?>
</form>