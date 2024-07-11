
<form action="index.php?act=updatedm" method="POST" style="position: relative; left: 30%; top: 30px; width: 40%;" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" name="id" value="<?= $dm['id'] ?>">
        <label for="exampleInputEmail1" class="form-label">Tên Loại</label>
        <input type="text" name="tenloai" value="<?= $dm['name'] ?>" class="form-control" placeholder="Mời nhập tên loại" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Chọn Ảnh</label>
        <input style="padding-top: 9px;" type="file" class="form-control" id="exampleInputPassword1" name="image" required>
    </div>
    <button type="submit" name="capnhat" class="btn btn-primary">Submit</button>
</form>