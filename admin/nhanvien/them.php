<?php
$sql1 = "select *from quyen";
$rs1 = mysqli_query($conn, $sql1);
?>
<div class="card">
	<div class="card-header">
		<span class="fs-20">Thêm tài khoản</span>
	</div>
	<div class="card-body">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-md-10">
				<form method="POST" action="nhanvien/xuly.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">Họ Tên</label>
								<input type="text" class="form-control" name="tennv" autofocus required>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">Email</label>
								<input type="email" class="form-control" name="email" required>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">SĐT</label>
								<input type="text" class="form-control" name="sdt" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-5 col-md-5">
							<div class="form-group">
								<label class="m-auto" for="">Địa Chỉ</label>
								<input type="text" class="form-control" name="dc" required>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label class="m-auto" for="">Quyền</label>
								<select class="browser-default custom-select" name="q" id="">
									<option value=""></option>
									<?php while ($row = mysqli_fetch_array($rs1)) { ?>
										<option value="<?php echo $row['id'] ?>"><?php echo $row['id'] . ' - ' . $row['Ten'] ?></option>}
									<?php	} ?>

								</select>
								<!-- <input type="text" class="form-control" name="q" required> -->
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label class="m-auto" for="">Mật Khẩu</label>
								<input type="password" class="form-control" name="mk" required>
							</div>
						</div>
					</div>
					<!-- <div class="form-group"><label for="masv">&emsp;</label><input type="submit" class="form-control badge-info" name="them" value="Thêm"></div> -->
					<button type="submit" name="them" class="d-block mx-auto w-25 btn btn-outline-primary">Xác nhận</button>
				</form>
			</div>
		</div>
	</div>
</div>