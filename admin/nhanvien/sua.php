<?php
$manv = $_GET['manv'];
$sql_sua = "SELECT * FROM `nhanvien` WHERE MaNV='$manv'";
$rs_sua = mysqli_query($conn, $sql_sua);
$kq_sua = mysqli_fetch_array($rs_sua);
$sql1 = "select *from quyen";
$rs1 = mysqli_query($conn, $sql1); ?>
<div class="card">
	<div class="card-header">
		<span class="fs-20">Sửa tài khoản</span>
	</div>
	<div class="card-body">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-md-10">
				<form method="POST" action="nhanvien/xuly.php" enctype="multipart/form-data">
					<input hidden name="manv" value="<?php echo $kq_sua['MaNV']; ?>">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">Họ Tên</label>
								<input type="text" class="form-control" name="tennv" autofocus value="<?php echo $kq_sua['TenNV']; ?>">
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">Email</label>
								<input type="email" class="form-control" name="email" autofocus value="<?php echo $kq_sua['Email']; ?>">
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">SĐT</label>
								<input type="text" class="form-control" name="sdt" autofocus value="<?php echo $kq_sua['SDT']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5 col-md-5">
							<div class="form-group">
								<label class="m-auto" for="">Địa Chỉ</label>
								<input type="text" class="form-control" name="dc" autofocus value="<?php echo $kq_sua['DiaChi']; ?>">
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label class="m-auto" for="">Quyền</label>
								<select class="browser-default custom-select" name="q" id="">
									<?php while ($row = mysqli_fetch_array($rs1)) { ?>
										<option <?php if ($kq_sua['Quyen'] == $row['id']) {
													echo "selected";
												} ?> value="<?php echo $row['id'] ?>"><?php echo $row['id'] . ' - ' . $row['Ten'] ?></option>}
									<?php	} ?>
								</select>
								<!-- <input type="text" class="form-control" name="q" autofocus value="<?php echo $kq_sua['Quyen']; ?>"> -->
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">Mật Khẩu</label>
								<input type="text" class="form-control" name="mk" autofocus value="<?php echo $kq_sua['MatKhau']; ?>">
							</div>
						</div>
					</div>
					<!-- <div class="form-group"><label for="masv">&emsp;</label><input type="submit" class="form-control badge-info" name="sua" value="Cập Nhập"></div> -->
					<button type="submit" name="sua" class="d-block mx-auto w-25 btn btn-outline-primary">Xác nhận</button>

				</form>
			</div>
		</div>
	</div>
</div>