<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Quản lý bình luận</b></a></li>
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
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Tên sản phẩm</th>
                <th>comment</th>
                <th>Date</th>
                <th>Tính năng</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($comments as $value) : ?>
                <tr>
                  <td><?= $value['id'] ?></td>
                  <td><?= $value['name'] ?></td>
                  <td><?= $value['product'] ?></td>
                  <td><?= $value['content'] ?></td>
                  <td><?= $value['updated_at'] ?></td>
                  <td>
                    <a onclick="return confirm('bạn chắc chắn muốn xóa?')" href="index.php?act=xoabl&id=<?= $value['id'] ?>"> <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button></a> 
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