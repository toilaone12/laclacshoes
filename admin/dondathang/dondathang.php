<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<br>
			<table class="table table-hover  text-center ">
				<thead class="badge-info">
					<tr>
						<th>Mã Hóa Đơn</th>
						<th>Người nhận</th>
						<th>Nhân Viên</th>
						<th>Ngày Đặt</th>
						<th>Tổng Tiền</th>
						<th>Tình trạng</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// lấy danh sách sản phẩm  theo phân trang.
					if (isset($_GET['trang'])) {
						$trang = $_GET['trang'];
					} else {
						$trang = 1;
					}
					$from = ($trang - 1) * 30;

					if (isset($_GET['dk'])) {
						$dk = $_GET['dk'];
						$sql = "SELECT * from hoadon  where TinhTrang='" . $dk . "' Order  by NgayDat DESC LIMIT $from,30";
						// var_dump($sql); die;
					} else {
						$sql = "select * from hoadon Order  by NgayDat DESC LIMIT $from,30";
					}

					$rs = mysqli_query($conn, $sql);
					$so = 0;
					while ($row = mysqli_fetch_array($rs)) { 
						$sql2 = "select * from nguoinhan where MaHD=".$row['MaHD'];
						$tenNV = '';
						if($row['MaNV']){
							$sql3 = "select * from nhanvien where MaNV=".$row['MaNV'];
							$rs3 = mysqli_query($conn, $sql3);
							$tenNV = mysqli_fetch_array($rs3)['TenNV'];
						}else{
							$tenNV = 'Chưa có';
						}
						$rs2 = mysqli_query($conn, $sql2);
						$tenKH = mysqli_fetch_array($rs2)['TenNN'];
						// var_dump($tenNV); die;
					?>
						<tr>
							<td width='130'><?php echo $row['MaHD']; ?></td>
							<td><?php echo $tenKH?></td>
							<td><?php echo $tenNV?></td>
							<td><?php echo $row['NgayDat']; ?></td>
							<td><?php echo number_format($row['TongTien']) . ' đ'; ?></td>
							<td><?php if ($row['TinhTrang'] === 'chưa duyệt') { ?>
									<label class="badge badge-warning px-2 py-2 fs-12">
										<span style="vertical-align: inherit;">
											<span style="vertical-align: inherit;"><i class="fa-solid fa-spinner mr-2"></i>Đang chờ xử lý</span>
										</span>
									</label>
								<?php } elseif ($row['TinhTrang'] === 'Đã duyệt') { ?>
									<label class="badge badge-warning px-2 py-2 fs-12">
										<span style="vertical-align: inherit;">
											<span style="vertical-align: inherit;"><i class="fa-solid fa-check mr-2"></i>Đã duyệt</span>
										</span>
									</label>
								<?php } elseif ($row['TinhTrang'] === 'hoàn thành') { ?>
									<label class="badge badge-success px-2 py-2 fs-12">
										<span style="vertical-align: inherit;">
											<span style="vertical-align: inherit;"><i class="fa-solid fa-check mr-2"></i>Hoàn thành</span>
										</span>
									</label>
								<?php } elseif ($row['TinhTrang'] === 'Hủy Bỏ') { ?>
									<label class="badge badge-danger px-2 py-2 fs-12">
										<span style="vertical-align: inherit;">
											<span style="vertical-align: inherit;"><i class="fa-solid fa-xmark mr-2"></i>Hủy Bỏ</span>
										</span>
									</label>
								<?php } ?>

							</td>
							<td width="235">
								<a class="d-block mb-3 btn btn-outline-primary w-75 nav-link fs-14 text-capitalize" href="index.php?action=xldathang&view=ctdh&mahd=<?php echo $row['MaHD']; ?>"><i class="fas fa-list"></i> Chi tiết </a>
								<?php if ($row['TinhTrang'] === "chưa duyệt") {
									echo '<a class="d-block mb-3 btn btn-outline-success w-75 fs-14 text-capitalize" href="dondathang/xuly.php?action=duyet&mahd=' . $row['MaHD'] . '" ><i class="fas fa-check"></i> Duyệt</a>';
								} ?>
								<?php if ($row['TinhTrang'] === "chưa duyệt") { ?>
									<a class="d-block mb-3 btn btn-outline-danger w-75 fs-14 text-capitalize" href="dondathang/xuly.php?action=huy&mahd=<?php echo $row['MaHD']; ?>"><i class="fas fa-xmark"></i> Hủy đơn</a>
								<?php } ?>
							</td>
						</tr>
					<?php	} ?>
				</tbody>
			</table>
		</div><br>
	</div>
	<div class="row m-auto">
		<?php $dk2 = '';
		if (isset($_GET['dk'])) {
			$dk2 = $_GET['dk'];
			$ds_spn1b = "SELECT * from hoadon  where TinhTrang='" . $dk2 . "'";
		} else {
			$ds_spn1b = "select * from hoadon";
		}
		$query_dssp2 = mysqli_query($conn, $ds_spn1b);
		$sosp = mysqli_num_rows($query_dssp2);
		$sotrang = ceil($sosp / 30); ?>
		<hr>
		<ul class="pagination justify-content-center">
			<?php for ($x = 1; $x <= $sotrang; $x++) {
				if ($dk2 === '') { ?>
					<li class="page-item">
						<a class="page-link " href="index.php?action=xldathang&trang=<?php echo $x ?>"><?php echo $x; ?></a>
					</li>
				<?php } else { ?>
					<li class="page-item">
						<a class="page-link " href="index.php?action=xldathang&trang=<?php echo $x ?>&dk=<?php echo $dk2 ?>"><?php echo $x; ?></a>
					</li>
			<?php      }
			} ?>


		</ul>

	</div>
</div>