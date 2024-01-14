<?php
include_once('../model/database.php');
$mahd = $_GET['mahd'];
$sql = "select * from chitiethoadon where MaHD=$mahd";
$rs = mysqli_query($conn, $sql);
$rsPrint = mysqli_query($conn, $sql);
$sql2 = "select * from nguoinhan where MaHD=$mahd";
$rs2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($rs2);
$sql3 = "SELECT * FROM `hoadon` WHERE MaHD = $mahd";
$rs3 = mysqli_query($conn, $sql3);
$phuongthuc = mysqli_fetch_assoc($rs3)['PhuongThucThanhToan'];
// var_dump($rs); die;
?>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<br>
			<h4 class="m-auto">HÓA ĐƠN</h4><br>
			<hr>
			<div class="row justify-content-between">
				<div class="col-6 ml-4">
					<div class="fs-25">Người nhận</div>
					<div>
						<span class="fs-14">Mã Hóa Đơn: <?php echo $mahd ?></span>
					</div>
					<div>
						<span class="fs-14">Tên người nhận: <?php echo $row2['TenNN']; ?> </span>
					</div>
					<div>
						<span class="fs-14">Địa chỉ người nhận: <?php echo $row2['DiaChiNN'] ?> </span>
					</div>
					<div>
						<span class="fs-14">SĐT người nhận: <?php echo $row2['SDTNN'] ?> </span>
					</div>
					<div>
						<span class="fs-14">Phương thức thanh toán: <?php echo $phuongthuc == 1 ? 'Thanh toán khi nhận hàng' : ($phuongthuc == 2 ? 'Thanh toán bằng MoMo' : 'Thanh toán bằng VNPAY'); ?> </span>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="fs-25">Cửa hàng</div>
					<div>
						<span class="fs-14">Tên cửa hàng: Lạc Lạc Shop</span>
					</div>
					<div>
						<span class="fs-14">Số điện thoại: (+84) 985 104 987</span>
					</div>
					<div>
						<span class="fs-14">Email: laclacshoes@gmail.com</span>
					</div>
					<div>
						<span class="fs-14">Địa chỉ: 104A Nhà D2, 215 Tô Hiệu, Dịch Vọng, Cầu Giấy</span>
					</div>
				</div>
			</div>
			<br>
			<hr>

			<table class="table table-hover m-auto text-center" style="font-size: 13px;">
				<thead class="badge-info">
					<tr>
						<th>Mã Sản Phẩm</th>
						<th>Số Lượng </th>
						<th>Đơn Giá</th>
						<th>Thành Tiền</th>
						<th>Kích cỡ</th>
						<th>Màu</th>
					</tr>
				</thead>
				<tbody>
					<?php $so = 0;
					while ($row = mysqli_fetch_array($rs)) {
						$so = $so + $row['ThanhTien']; ?>
						<tr>
							<td><?php echo $row['MaSP']; ?></td>
							<td><?php echo $row['SoLuong']; ?></td>
							<td><?php echo number_format($row['DonGia']) . ' đ'; ?></td>
							<td><?php echo number_format($row['ThanhTien']) . ' đ'; ?></td>
							<td><?php echo $row['Size']; ?></td>
							<td><?php echo $row['MaMau']; ?></td>

						</tr>
					<?php } ?>

				</tbody>
			</table>
			<hr>
			<span class="ml-3 fs-18">Tổng tiền: <?php echo number_format($so) . ' đ'; ?></span>
			<hr>

		</div>

	</div>
</div>

<div class="modal fade" id="invoice" tabindex="-1" role="dialog" aria-labelledby="invoiceLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="invoiceLabel">Hóa đơn</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-body" id="form-invoice">
						<div class="row">
							<div class="col-xl-12 fs-30">
								Lạc Lạc Shoes
							</div>
						</div>
						<div class="row">
							<div class="col-xl-7">
								<ul class="list-unstyled float-start">
									<li style="font-size: 25px;">Khách hàng</li>
									<li>Người nhận: <?php echo $row2['TenNN']; ?></li>
									<li>Số điện thoại: <?php echo $row2['SDTNN'] ?></li>
									<li>Địa chỉ: <?php echo $row2['DiaChiNN'] ?></li>
								</ul>
							</div>
							<div class="col-xl-5">
								<ul class="list-unstyled float-end">
									<li style="font-size: 25px; color: red;">Cửa hàng</li>
									<li>104A Nhà D2, 215 Tô Hiệu, Dịch Vọng, Cầu Giấy</li>
									<li>(+84) 985 104 987</li>
									<li>laclacshoes@gmail.com</li>
								</ul>
							</div>
						</div>
						<p class="text-center mt-3 fs-28">Hóa đơn #<?php echo $mahd ?></p>
						<table class="table">
							<thead>
								<tr>
									<th scope="col" class="text-center">Mã Sản Phẩm</th>
									<th scope="col" class="text-center">Số Lượng </th>
									<th scope="col" class="text-center">Đơn Giá</th>
									<th scope="col" class="text-center">Thành Tiền</th>
									<th scope="col" class="text-center">Kích cỡ</th>
									<th scope="col" class="text-center">Màu</th>
								</tr>
							</thead>
							<tbody>
								<?php $so1 = 0;
								while ($rowPrint = mysqli_fetch_array($rsPrint)) {
									$so1 += $rowPrint['ThanhTien']; ?>
									<tr>
										<td class="text-center"><?php echo $rowPrint['MaSP']; ?></td>
										<td class="text-center"><?php echo $rowPrint['SoLuong']; ?></td>
										<td class="text-center"><?php echo number_format($rowPrint['DonGia']) . ' đ'; ?></td>
										<td class="text-center"><?php echo number_format($rowPrint['ThanhTien']) . ' đ'; ?></td>
										<td class="text-center"><?php echo $rowPrint['Size']; ?></td>
										<td class="text-center"><?php echo $rowPrint['MaMau']; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<div class="row">
							<div class="col-xl-12">
								<ul class="list-unstyled float-start">
									<li><span class="mr-1 float-start">Tổng tiền:</span><?php echo number_format($so) . ' đ'; ?></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<button type="submit" class="btn btn-primary print-bill">Xác nhận</button>
			</div>
		</div>
	</div>
</div>
<?php


?>