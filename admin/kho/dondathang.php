<?php
$sql = "select * from hoadon  where (TinhTrang ='đã duyệt' or TinhTrang ='hoàn thành')  Order by NgayDat DESC ";
$rs = mysqli_query($conn, $sql);

?>
<div class="container-fluid">
	<div class="page-header">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">

			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Xem Đơn Hàng
		</h4>
	</div>
	<hr><br>
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<br>
				<table class="table table-hover text-center ">
					<thead class="badge-info">
						<tr>
							<th>Mã hóa đơn</th>
							<th>Mã khách hàng</th>
							<th>Mã nhân viên</th>
							<th>Ngày đặt</th>
							<th>Tổng tiền</th>
							<th>Tình trạng</th>
							<th>Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php
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
						?>
							<tr>
								<td><?php echo $row['MaHD']; ?></td>
								<td><?php echo $row['MaKH']; ?></td>
								<td><?php echo $row['MaNV']; ?></td>
								<td><?php echo $row['NgayDat']; ?></td>
								<td><?php echo number_format($row['TongTien']) . ' đ'; ?></td>
								<td><?php if ($row['TinhTrang'] === 'Đã duyệt') { ?>
										<label class="badge badge-warning"><span style="vertical-align: inherit;">
												<span style="vertical-align: inherit;">Đã duyệt</span></span>
										</label>
									<?php } elseif ($row['TinhTrang'] === 'hoàn thành') { ?>
										<label class="badge badge-secondary"><span style="vertical-align: inherit;">
												<span style="vertical-align: inherit;">Hoàn thành</span></span>
										</label>
									<?php } ?>
								</td>
								<td width="200"><a class="d-block fs-15 mb-3 text-capitalize btn btn-outline-primary" href="index.php?action=kho&view=chitietdh&mahd=<?php echo $row['MaHD']; ?>">Xem chi tiết </a></td>
							</tr>
						<?php	} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>