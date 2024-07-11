
<form action="index.php?act=update-user" method="POST" style="position: relative; left: 30%; top: 30px; width: 40%;" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" value="<?= $user['id'] ?>" name="id">
        <label for="exampleInputEmail1" class="form-label">Tên Đăng Nhập</label>
        <input type="text" name="userName" value="<?= $user['userName'] ?>" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
        <input type="text" name="address" value="<?= $user['address'] ?>" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Điện Thoại</label>
        <input type="number" name="phone" value="<?= $user['phone'] ?>" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên Người Dụng</label>
        <input type="text" name="user" value="<?= $user['name'] ?>" class="form-control" id="exampleInputEmail1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Chọn Vai Trò</label>
        <select name="is_Admin" id="">
            <option value="0" <?= $user['is_Admin'] == 0 ? 'selected' : '' ?>>Khách Hàng</option>
            <option value="1" <?= $user['is_Admin'] == 1 ? 'selected' : '' ?>>Admin</option>
        </select>
    </div>
    <input type="submit" name="capnhat" class="btn btn-primary" value="Submit">
    <?php 
        if(isset($thongbao) && ($thongbao) != ""){
            echo $thongbao;
        }
    ?>
</form>