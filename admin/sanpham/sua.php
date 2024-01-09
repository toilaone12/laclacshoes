<?php 
    $masp=$_GET['masp'];
    $sql_sua="SELECT * FROM `sanpham` WHERE MaSP=$masp";
    $rs_sua=mysqli_query($conn,$sql_sua);
    $kq_sua=mysqli_fetch_array($rs_sua);
?>
<div class="card mb-5">
  <div class="card-header">
    <div class="fs-30 text-center d-block">Sửa sản phẩm</div>
  </div>
  <div class="card-body">
    <form method="POST" action="sanpham/xuly.php" enctype="multipart/form-data">
      <input hidden name="masp" value="<?php echo $masp?>">
      <div class="row">
        <div class="col-lg-3">
          <div class="form-group"><label for="masv">Tên sản phẩm</label><input type="text" class="form-control" name="tensp" value="<?php echo $kq_sua['TenSP'];?>"></div>
        </div>
        <div class="col-lg-3 col-xl-3">
          <div class="form-group">
            <label>Thuộc danh mục</label>
            <select name="madm" class="form-control browser-default custom-select">
              <?php $sql1 = "select * from danhmuc";
              $rs1 = mysqli_query($conn, $sql1);
              while ($row = mysqli_fetch_array($rs1)) {
              ?>
                <option <?=$row['MaDM'] == $kq_sua['MaDM'] ? 'selected' : '' ?> value="<?php echo $row['MaDM'] ?>"><?php echo $row['MaDM'] . ' - ' . $row['TenDM']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-xl-3">
          <div class="form-group">
            <label>Thuộc nhà cung cấp</label>
            <select name="mancc" class="form-control browser-default custom-select">
              <?php $sql2 = "select * from nhacc";
              $rs2 = mysqli_query($conn, $sql2);
              while ($row2 = mysqli_fetch_array($rs2)) { ?>
                <option <?=$row2['MaNCC'] == $kq_sua['MaNCC'] ? 'selected' : '' ?> value="<?php echo $row2['MaNCC']; ?>"><?php echo $row2['MaNCC'] . ' - ' . $row2['TenNCC']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-2 col-xl-2">
          <div class="form-group">
            <label>Số lượng kho</label>
            <input type="number" class="form-control" name="soluong" value="<?=$kq_sua['SoLuongKho']?>" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="form-group"><label>Đơn giá</label><input type="text" class="form-control" name="dongia" value="<?=$kq_sua['DonGia']?>"  required></div>
        </div>
        <div class="col-lg-4">
          <span style="margin-left: -11px">Ảnh đại diện</span>
          <div class="form-group">
            <label class="custom-file-label" style="margin-top: 32px;">Ảnh đại diện</label>
            <input type="file" class="custom-file-input one-image" accept="image/*" name="anhnen">
          </div>
          <div class="file-image">
            <?=$kq_sua['AnhNen']?>
          </div>
        </div>
        <div class="col-lg-4 ml-3">
          <span style="margin-left: -11px">Ảnh kèm theo</span>
          <div class="form-group"><label class="custom-file-label" style="margin-top: 32px;">Ảnh kèm theo</label>
            <input type="file" class="custom-file-input multi-image" accept="image/*" name="anhsp[]" multiple>
          </div>
          <div class="file-multi-image">
            <?php
              $sqlGallery = 'SELECT * FROM anhsp WHERE MaSP = '.$kq_sua['MaSP'];
              $rsGallery = mysqli_query($conn,$sqlGallery);
              if($rsGallery->num_rows > 0){
                $rowGallery = mysqli_fetch_assoc($rsGallery);
                $listGallery = $rowGallery['Anh1'] ? '['.$rowGallery['Anh1'] : '';
                $listGallery .= $rowGallery['Anh2'] ? ', '.$rowGallery['Anh2'] : ']';
                $listGallery .= $rowGallery['Anh3'] ? ', '.$rowGallery['Anh3'] : ']';
                $listGallery .= $rowGallery['Anh4'] ? ', '.$rowGallery['Anh4'].']' : ']';
                echo $listGallery;
              }else{
                echo 'Không có';
              }
            ?>
          </div>
        </div>
      </div>
      <div class="form-group"><label>Mô Tả</label><textarea class="form-control" name="mota" required><?=$kq_sua['MoTa']?></textarea> </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label>Kích cỡ:</label><br>
            <div class="btn-group">
              <?php 
                $sql_size = "select * from size";
                $rs_size = mysqli_query($conn, $sql_size);
                while ($kq_size = mysqli_fetch_array($rs_size)) { 
                  $sql_size2 = "select DISTINCT MaSize from chitietsanpham where MaSP=".$masp." and MaSize=".$kq_size['MaSize'];
                  $rs_size2=mysqli_query($conn,$sql_size2);
                  // var_dump($sql_size2); die;
              ?>
                <div class="radio-container mr-4">
                  <input type="checkbox" class="checkbox-size" id="<?php echo $kq_size['MaSize']; ?>" <?php  while ($kq_size2=mysqli_fetch_array($rs_size2)) {if($kq_size['MaSize']===$kq_size2['MaSize']){ echo "checked";  }}?> name="size[]" value="<?php echo $kq_size['MaSize']; ?>">
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
                <?php 
                  $sql_mau = "select * from mau";
                  $rs_mau = mysqli_query($conn, $sql_mau);
                  while ($kq_mau = mysqli_fetch_array($rs_mau)) { 
                    $sql_mau2 = "select DISTINCT MaMau from chitietsanpham where MaSP=".$masp." and MaMau='".$kq_mau['MaMau']."'";
                    $rs_mau2=mysqli_query($conn,$sql_mau2);
                ?>
                  <div class="radio-container mr-4">
                    <input type="checkbox" class="checkbox-color" id="<?php echo $kq_mau['MaMau']; ?>" name="mau[]" <?php  while ($kq_mau2=mysqli_fetch_array($rs_mau2)) {if($kq_mau['MaMau']===$kq_mau2['MaMau']){ echo "checked";  }}?> value="<?php echo $kq_mau['MaMau']; ?>">
                    <label class="title-color" for="<?php echo $kq_mau['MaMau']; ?>"><?php echo $kq_mau['MaMau']; ?></label>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group m-6 m-auto"><br>
        <input type="submit" class="btn btn-outline-info mx-auto d-block w-25" value="Xác nhận" name="xlsua">
      </div>
    </form>
  </div>
</div>

