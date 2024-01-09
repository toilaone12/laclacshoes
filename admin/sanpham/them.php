<hr class="badge-danger">
<form method="POST" action="sanpham/xuly.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-lg-4">
      <div class="form-group"><label for="masv">Tên sản phẩm</label><input type="text" class="form-control" name="tensp"></div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label>Thuộc danh mục</label>
        <select name="madm" class="form-control browser-default custom-select">
          <?php $sql1 = "select * from danhmuc";
          $rs1 = mysqli_query($conn, $sql1);
          while ($row = mysqli_fetch_array($rs1)) {
          ?>
            <option value="<?php echo $row['MaDM'] ?>"><?php echo $row['MaDM'] . ' - ' . $row['TenDM']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label>Thuộc nhà cung cấp</label>
        <select name="mancc" class="form-control browser-default custom-select">
          <?php $sql2 = "select * from nhacc";
          $rs2 = mysqli_query($conn, $sql2);
          while ($row2 = mysqli_fetch_array($rs2)) { ?>
            <option value="<?php echo $row2['MaNCC']; ?>"><?php echo $row2['MaNCC'] . ' - ' . $row2['TenNCC']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="form-group"><label>Đơn giá</label><input type="text" class="form-control" name="dongia" required></div>
    </div>
    <div class="col-lg-4">
      <span style="margin-left: -11px">Ảnh đại diện</span>
      <div class="form-group">
        <label class="custom-file-label" style="margin-top: 32px;">Ảnh đại diện</label>
        <input type="file" class="custom-file-input" name="anhnen" required>
      </div>
    </div>
    <div class="col-lg-4 ml-3">
      <span style="margin-left: -11px">Ảnh kèm theo</span>
      <div class="form-group"><label class="custom-file-label" style="margin-top: 32px;">Ảnh kèm theo</label>
        <input type="file" class="custom-file-input" name="anhsp[]" multiple required>
      </div>
    </div>
  </div>
  <div class="form-group"><label>Mô Tả</label><textarea class="form-control" name="mota" required></textarea> </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Kích cỡ:</label><br>
        <div class="btn-group">
          <?php $sql_size = "select * from size";
          $rs_size = mysqli_query($conn, $sql_size);
          while ($kq_size = mysqli_fetch_array($rs_size)) { ?>
            <div class="radio-container mr-4">
              <input type="checkbox" class="checkbox-size" id="<?php echo $kq_size['MaSize'];?>" name="size[]" value="<?php echo $kq_size['MaSize']; ?>">
              <label class="title-size" for="<?php echo $kq_size['MaSize']; ?>"><?php echo $kq_size['MaSize']; ?></label>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label>Màu :</label>
        <div class="form-group">
          <div class="btn-group m-auto row">
            <?php $sql_mau = "select * from mau";
            $rs_mau = mysqli_query($conn, $sql_mau);
            while ($kq_mau = mysqli_fetch_array($rs_mau)) { ?>
              <!-- <div class=" custom-checkbox custom-control ">
                <input type="checkbox" class="custom-control-input" id="<?php echo $kq_mau['MaMau']; ?>" name="mau[]" value="<?php echo $kq_mau['MaMau']; ?>" <?php if ($kq_mau['MaMau'] === 'none') {                                                                                                                                          } ?>>
                <label class="custom-control-label" for="<?php echo $kq_mau['MaMau']; ?>">
                  <h5><?php echo $kq_mau['MaMau']; ?></h5>
                </label>
              </div> -->
              <div class="radio-container mr-4">
                <input type="checkbox" class="checkbox-color" id="<?php echo $kq_mau['MaMau'];?>" name="size[]" value="<?php echo $kq_mau['MaMau']; ?>">
                <label class="title-color" for="<?php echo $kq_mau['MaMau']; ?>"><?php echo $kq_mau['MaMau']; ?></label>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group m-6 m-auto"><br>
    <input type="submit" class="form-control badge-info" value="Thêm" name="xlthem">
  </div>
</form>
<hr>
<hr class="badge-danger">