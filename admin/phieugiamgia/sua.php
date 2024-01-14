<?php
$maphieu = $_GET['maphieu'];
$sql_sua = "SELECT * FROM `phieugiamgia` WHERE MaPGG='$maphieu'";
$rs_sua = mysqli_query($conn, $sql_sua);
$kq_sua = mysqli_fetch_array($rs_sua) ?>
<div class="card mb-5">
  <div class="card-header">
    <div class="fs-30 text-center d-block">Sửa phiếu giảm giá</div>
  </div>
  <div class="card-body">
    <form method="POST" action="phieugiamgia/xuly.php">
      <input hidden name="maphieu" value="<?php echo $kq_sua['MaPGG']; ?>">
      <div class="row">
        <div class="col-lg-5 col-md-5">
          <div class="form-group mb-3">
            <label class="mb-2 fs-16" for="tenphieu">Tên phiếu giảm giá <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
            <input type="text" class="form-control" name="tenphieu" value="<?=$kq_sua['TenPhieu']?>" required>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="form-group mb-3">
            <label class="mb-2 fs-16" for="maphieu">Mã phiếu giảm giá <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
            <input type="text" class="form-control" name="codephieu" value="<?=$kq_sua['CodePhieu']?>" required>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="form-group mb-3">
            <label class="mb-2 fs-16" for="soluong">Số lượng <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
            <input type="number" class="form-control" name="soluong" value="<?=$kq_sua['SoLuong']?>" required>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="form-group mb-3">
            <label class="mb-2 fs-16" for="sotien">Tiền được giảm <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
            <input type="number" class="form-control" name="sotien" value="<?=$kq_sua['SoTien']?>" required>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="form-group mb-3">
            <label class="mb-2 fs-16" for="thoihan">Thời hạn phiếu <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
            <input type="date" class="form-control" min="<?= date('Y-m-d') ?>" value="<?=$kq_sua['ThoiHan']?>" name="thoihan" required>
          </div>
        </div>
      </div>

      <button type="submit" name="sua" class="m-0 btn btn-outline-primary">Xác nhận</button>
    </form>
  </div>
</div>

<hr class=" badge-danger">