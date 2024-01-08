<?php
$sql = "SELECT *FROM sanpham ";
$rs = mysqli_query($conn, $sql);
?>
<div class="container-fluid">

	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">
			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Xuất / Nhập Kho
		</h4>
	</div><br>

	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card"><br>
				<table class="table table-hover m-auto text-center">
					<thead class="badge-info">
						<tr>
							<th colspan="2">Thông tin sản phẩm</th>
							<th>Nhà cung cấp</th>
							<th>Tổng số lượng</th>
							<th>Giá cả</th>
							<th>Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							while ($row = mysqli_fetch_array($rs)) { 
								$sqlSupplier = "SELECT * FROM nhacc WHERE MaNCC = ".$row['MaNCC'];
								$rsSupplier = mysqli_query($conn,$sqlSupplier);
								// var_dump($sqlSupplier); die;s
								$tenNCC = mysqli_fetch_assoc($rsSupplier)['TenNCC'];
						?>
							<tr>
								<td width="100"><img src="../webroot/image/sanpham/<?php echo $row['AnhNen']; ?>" width="60" height="50"></td>
								<td width="300"><?php echo $row['TenSP'] ?></td>
								<td width="100"><?php echo $tenNCC ?></td>
								<td width="200"><?php echo $row['SoLuong'] ?> sản phẩm</td>
								<td width="150"><?= number_format($row['DonGia'],0,',',',') ?> đ</td>
								<td width="200"><a class="d-block fs-15 mb-3 text-capitalize btn btn-outline-primary" href="?action=kho&view=themsl&masp=<?php echo $row['MaSP'] ?>&t=<?php echo $row['TenSP'] ?>&h=<?php echo $row['AnhNen'] ?>">
										Xuất / Nhập Hàng
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>