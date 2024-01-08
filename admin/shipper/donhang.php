<?php
$am = $_SESSION['admin'];
$nv = $am['MaNV'];
$sql = "SELECT * FROM `hoadon` WHERE NgayGiao is not null and TinhTrang='Đã duyệt' ORDER BY NgayGiao ASc";
$rs = mysqli_query($conn, $sql);
$dem = mysqli_num_rows($rs);
$sql3 = "SELECT * FROM `hoadon` WHERE MaNVGH='$nv' and TinhTrang='hoàn thành'  ORDER BY NgayGiao ASc";
$rs13 = mysqli_query($conn, $sql3);
$order2 = mysqli_num_rows($rs13);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = getdate();
$thang = $date['year'] . '-' . $date['mon'];
$nam = $date['year'];
$lastDayOfMonth = date('Y-m-t');
$sql32 = "SELECT * FROM `hoadon` WHERE MaNVGH=$nv and TinhTrang='hoàn thành' and (NgayGiao BETWEEN '" . $thang . "-01' AND '" . $lastDayOfMonth . "') ORDER BY NgayGiao ASC";
// var_dump($sql32); die;
$rs132 = mysqli_query($conn, $sql32);
$order = mysqli_num_rows($rs132);
if (isset($_POST['dk'])) {
	$dk = $_POST['dk'];
} else {
	$dk = 'Chưa Giao';
}
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">
			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Giao Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $dk ?>
		</h4>
	</div>
	<br>
	<div class="row">
		<form action="?action=giaohang" method="POST" class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body ">
					<button type="sub" name="dk" value="Chưa Giao" class="btn btn-primary btn-sm text-capitalize fs-13">Chờ xử lý</button>
					<span class="counter counter-sm" style="top: -18px;"><?php echo $dem ?></span>
					<button type="sub" name="dk" value="Đã Giao" class="btn btn-primary btn-sm text-capitalize fs-13">Đã Giao</button>
					<span class="counter counter-sm" style="top: -18px;"><?php echo $order2 ?></span>
				</div>
			</div>
		</form>

		<div class="col-xl-4 col-md-4 mb-4">
			<div class="card border-left-warning shadow h-100 py-0">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Đơn Hàng (Tháng)</font>
								</font>
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"><?php echo $order ?></font>
								</font>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-4 mb-4">
			<div class="card border-left-warning shadow h-100 py-0">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Đơn Hàng (Tất cả đơn)</font>
								</font>
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"><?php echo $order2 ?></font>
								</font>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><br>
	<?php

	switch ($dk) {
		case 'Chưa Giao': ?>
			<div class="card">
				<div class="card-body">
					<table class="table table-hover m-auto text-center">
						<thead class="badge-info">
							<tr>
								<th>Mã Hóa Đơn</th>
								<th>Ngày Đặt</th>
								<th>Ngày Giao</th>
								<th>Tổng Tiền</th>
								<th>Tình trạng</th>
								<th>Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php $so = 0;
							while ($row = mysqli_fetch_array($rs)) {
								$sql1 = "select * from chitiethoadon where MaHD=" . $row['MaHD'];
								$rs1 = mysqli_query($conn, $sql1);
								$sql2 = "select * from nguoinhan where MaHD=" . $row['MaHD'];
								$rs2 = mysqli_query($conn, $sql2);
								$row2 = mysqli_fetch_array($rs2); ?>
								<tr>
									<td><?php echo $row['MaHD']; ?></td>
									<td><?php echo $row['NgayDat']; ?></td>
									<td><?php echo $row['NgayGiao']; ?></td>
									<td><?php echo number_format($row['TongTien']) . ' đ'; ?></td>
									<td><div class="badge badge-warning font-weight-light px-2 py-2 fs-12"><i class="fas fa-check mr-2"></i> <?php echo $row['TinhTrang']; ?></div></td>
									<td width="250">
										<a class="d-block fs-15 mb-3 text-capitalize btn btn-outline-primary" href="index.php?action=giaohang&view=ctgh&mahd=<?php echo $row['MaHD']; ?>">Xem chi tiết</a>
										<?php if ($row['TinhTrang'] === "Đã duyệt") {
											echo '<a class="d-block fs-15 mb-3 text-capitalize btn btn-outline-success" href="shipper/xuly.php?action=duyet&mahd=' . $row['MaHD'] . '" >Đã Giao Hàng <i class="fas fa-check"></i> </a>';
										} ?>
									</td>
								</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		<?php
			break;
		case 'Đã Giao': ?>
			<?php

			$sql12 = "SELECT * FROM `hoadon` WHERE MaNVGH='$nv' and TinhTrang='hoàn thành' ORDER BY NgayGiao ASc";
			$rs12 = mysqli_query($conn, $sql12);
			?>
			<div class="card">
				<div class="card-body">
					<table class="table table-hover m-auto text-center" style="font-size: 13px;">
						<thead class="badge-info">
							<tr>
								<th>Mã Hóa Đơn</th>
								<th>Ngày Đặt</th>
								<th>Ngày Giao</th>
								<th>Tổng Tiền</th>
								<th>Tình trạng</th>
								<th>Chi Tiết</th>
							</tr>
						</thead>
						<tbody>
							<?php $so = 0;
							while ($row12 = mysqli_fetch_array($rs12)) {
								$sql1 = "select * from chitiethoadon where MaHD=" . $row12['MaHD'];
								$rs1 = mysqli_query($conn, $sql1);

								$sql2 = "select * from nguoinhan where MaHD=" . $row12['MaHD'];
								$rs2 = mysqli_query($conn, $sql2);
								$row2 = mysqli_fetch_array($rs2); ?>
								<tr>
									<td>
										<div class="fs-15 d-block m-auto"><?php echo $row12['MaHD']; ?></div>
									</td>
									<td>
										<div class="fs-15 d-block m-auto"><?php echo $row12['NgayDat']; ?></div>
									</td>
									<td>
										<div class="fs-15 d-block m-auto"><?php echo $row12['NgayGiao']; ?></div>
									</td>
									<td>
										<div class="fs-15 d-block m-auto"><?php echo number_format($row12['TongTien']) . ' đ'; ?></div>
									</td>
									<td>
										<div class="badge badge-success fs-13 mt-2 font-weight-light py-2 px-2 text-capitalize"><i class="fas fa-check mr-2"></i><?php echo $row12['TinhTrang']; ?></div>
									</td>
									<td><a href="index.php?action=giaohang&view=ctgh&mahd=<?php echo $row12['MaHD']; ?>" class="btn btn-outline-primary fs-14 text-capitalize">Xem chi tiết </a></td>
								</tr>
							<?php	} ?>
						</tbody>
					</table>
				</div>
			</div>

	<?php break;
		default:
			# code...
			break;
	}
	?>



</div>