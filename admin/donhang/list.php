<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>ID đơn hàng</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Tình trạng</th>
                <th>Tính năng</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($donhang as $value) : ?>
                <tr>
                  <td><?= $value['id'] ?></td>
                  <td><?= $value['name'] ?></td>
                  <td><?= number_format($value['totalMoney']) ?>VNĐ</td>
                  <td><span class="badge bg-success"><?= $value['status'] ?></span></td>
                  <td>
                    <a href="index.php?act=bill-details&id=<?= $value['id'] ?>"><button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>Chi Tiết</button></a>
                    <a onclick="return confirm('bạn chắc chắn muốn xóa?')" href="index.php?act=xoa-donhang&id=<?= $value['id'] ?>"> <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button></a> 
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>