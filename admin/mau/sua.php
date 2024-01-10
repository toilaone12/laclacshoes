<?php
$mamau = $_GET['mamau'];
$sql_sua = "SELECT * FROM `mau` WHERE MaMau='$mamau'";
$rs_sua = mysqli_query($conn, $sql_sua);
$kq_sua = mysqli_fetch_array($rs_sua)
?>
<div class="card mb-5">
  <div class="card-header">
    <div class="fs-30 text-center d-block">Sửa màu sắc</div>
  </div>
  <div class="card-body">
    <form method="GET" action="mau/xuly.php" enctype="multipart/form-data">
      <input hidden name="id" value="<?php echo $kq_sua['MaMau']; ?>">
      <div class="form-group mb-3">
        <label class="mb-2" for="mamau">Tên màu sắc</label>
        <input type="text" class="form-control" name="mamau" autofocus value="<?php echo $kq_sua['MaMau']; ?>">
      </div>
      <button type="submit" name="suamau" class="m-0 btn btn-outline-primary">Xác nhận</button>
    </form>
  </div>
</div>