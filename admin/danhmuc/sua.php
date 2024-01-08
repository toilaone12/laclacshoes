<?php
$madm = $_GET['madm'];
$sql_sua = "SELECT * FROM `danhmuc` WHERE MaDM='$madm'";
$rs_sua = mysqli_query($conn, $sql_sua);
$kq_sua = mysqli_fetch_array($rs_sua) ?>
<div class="card mb-5">
  <div class="card-header">
    <div class="fs-30 text-center d-block">Sửa danh mục</div>
  </div>
  <div class="card-body">
    <form method="GET" action="danhmuc/xuly.php">
      <div class="form-group d-none"></div><input hidden name="madm" value="<?php echo $kq_sua['MaDM']; ?>">
      <div class="form-group mb-3">
        <label class="mb-2 fs-16" for="tendm">Tên danh mục</label>
        <input type="text" class="form-control" name="tendm" autofocus value="<?php echo $kq_sua['TenDM']; ?>">
      </div>
      <button type="submit" name="suadm" class="m-0 btn btn-outline-primary">Xác nhận</button>
    </form>
  </div>
</div>

<hr class=" badge-danger">