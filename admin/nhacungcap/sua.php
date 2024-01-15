<?php
$mancc = $_GET['mancc'];
$sql_sua = "SELECT * FROM `nhacc` WHERE MaNCC ='$mancc'";
$rs_sua = mysqli_query($conn, $sql_sua);
$kq_sua = mysqli_fetch_array($rs_sua) ?>
<div class="card mb-5">
  <div class="card-header">
    <div class="fs-30 text-center d-block">Sửa nhà cung cấp</div>
  </div>
  <div class="card-body">
    <form method="GET" action="nhacungcap/xuly.php">
      <div class="form-group d-none"></div><input hidden name="mancc" value="<?php echo $kq_sua['MaNCC']; ?>">
      <div class="form-group mb-3">
        <label class="mb-2 fs-16" for="tenncc">Tên nhà cung cấp</label>
        <input type="text" class="form-control" name="tenncc" autofocus value="<?php echo $kq_sua['TenNCC']; ?>">
      </div>
      <button type="submit" name="sua" class="m-0 btn btn-outline-primary">Xác nhận</button>
    </form>
  </div>
</div>

<hr class=" badge-danger">