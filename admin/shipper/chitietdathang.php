<?php
include_once('../model/database.php');
$mahd = $_GET['mahd'];
$sql = "select * from chitiethoadon where MaHD=$mahd ";
$rs = mysqli_query($conn, $sql);
$sql2 = "select * from nguoinhan where MaHD=$mahd ";
$rs2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($rs2);
$sql23 = "select * from khachhang where MaKH=(select MaKH from hoadon where MaHD='$mahd') ";
$rs22 = mysqli_query($conn, $sql23);
$row22 = mysqli_fetch_array($rs22);


?>

<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">
			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Đơn Đặt Hàng
		</h4>
	</div>
	<br>

	<div class="card">
		<br>
		<h4 class="m-auto">HÓA ĐƠN #<?php echo $mahd ?></h4><br>
		<hr>
		<div class="row justify-content-between">
			<div class="col-6 ml-4">
				<div class="fs-25">Người nhận</div>
				<div>
					<span class="fs-14">Mã Hóa Đơn: <?php echo $mahd ?></span>
				</div>
				<div>
					<span class="fs-14">Tên Người Đặt: <?php echo $row22['TenKH']; ?> </span>
				</div>
				<div>
					<span class="fs-14">Tên Người Nhận: <?php echo $row2['TenNN']; ?> </span>
				</div>
				<div>
					<span class="fs-14">Địa Chỉ Người Nhận: <?php echo $row2['DiaChiNN'] ?> </span>
				</div>
				<div>
					<span class="fs-14">SĐT Người Nhận: <?php echo $row2['SDTNN'] ?> </span>
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
					<th>Size</th>
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
				<?php	} ?>

			</tbody>
		</table><br>
		<hr>
		<span class="ml-3 fs-18">Tổng tiền: <?php echo number_format($so) . ' đ'; ?></span>
		<br>
		<hr>

	</div>
</div>