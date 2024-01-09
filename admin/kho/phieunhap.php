<?php
if (isset($_GET['mau'])) {
	// var_dump($_GET);
	$mau = $_GET['mau'];
	$t = $_GET['t'];
	$masp = $_GET['masp'];
	$sql = "SELECT *FROM chitietsanpham where MaSP=" . $masp . " and MaMau='" . $mau . "'";
	$rs = mysqli_query($conn, $sql);
	$sqlSP = "SELECT * FROM sanpham where MaSP=" . $masp;
	$rsSP = mysqli_query($conn, $sqlSP);
	$soluongkho = mysqli_fetch_assoc($rsSP)['SoLuongKho'];
	$tsl = 0;
?>
	<div class="container-fluid">
		<form action="kho/xuly.php" method="get" accept-charset="utf-8">
			<div class=" alert alert-primary">
				<h4 class="page-title">
					<span class="page-title-icon bg-gradient-primary text-white mr-2">
					</span>ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160;Xuất / Nhập Kho &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $t ?> &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $mau ?>
				</h4>
			</div><br>
			<div class="row justify-content-between">
				<div class="col-md-5">
					<table class="table table-active table-hover text-center">
						<thead class="badge-info">
							<tr>
								<th>Kích cỡ</th>
								<th>Số lượng</th>
								<th>Chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_array($rs)) {
								$tsl += $row['SoLuong']; ?>
								<tr>
									<td><?php echo $row['MaSize'] ?></td>
									<td><?php echo $row['SoLuong'] ?></td>
									<td class="form-check m-auto"><input class="form-check-input" value="<?php echo $row['MaSize'] ?>" type="checkbox" name="chon[]" id="<?php echo $row['MaSize'] ?>">
										<label class="form-check-label" for="<?php echo $row['MaSize'] ?>">&#160;</label>
									</td>
								</tr>
							<?php } ?>
							<tr>
								<td>Tổng số lượng sản phẩm bán:</td>
								<td><?php echo $tsl ?></td>
							</tr>
							<tr>
								<td>Số lượng kho:</td>
								<td><?php echo $soluongkho ?></td>
							</tr>
							<tr>
								<td colspan="3">
									<input class="btn btn-success" type="button" id="btn2" value="Hủy tất cả">
									<input class="btn btn-success" type="button" id="btn1" value="Chọn tất cả">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Số lượng xuất</label>
								<input onkeypress=" return isNumberKey(event)" class="form-control m-auto" type="text" name="so" placeholder="Nhập số lượng" required autofocus>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Giá xuất</label>
								<input onkeypress=" return isNumberKey(event)" class="form-control m-auto" type="text" name="dg" placeholder="Nhập đơn giá" required>
							</div>
						</div>
						<div class="col-lg-12">
							<textarea class="form-control" name="note" rows="2" placeholder="Ghi chú"></textarea>
						</div>
					</div>
					<br>
					<div class="col-12 row">
						<input hidden name="masp" value="<?php echo $masp ?>">
						<input hidden name="mau" value="<?php echo $mau ?>">
						<button class=" m-auto col-4 btn btn-outline-primary" name="action" value="xuathang" type="submit">Xuất hàng</button>
						<!-- <button class=" m-auto col-4 btn btn-outline-primary" name="action" value="nhaphang" type="submit">Nhập Hàng</button> -->
						<!-- <button class="m-auto btn btn-outline-primary w-25" name="action" value="tru" type="submit">-</button>
					<button class="m-auto btn btn-outline-primary w-25" name="action" value="edit" type="submit">Thay Đổi</button> -->
					</div>

				</div>
			</div>
		</form>
	</div>


<?php
}
if(isset($_GET['tb'])){
	$thongbao = $_GET['tb'];
	$anh = $_GET['h'];
	echo '<script>
	alert("'.$thongbao.'")
	location.href = "?action=kho&view=apply&masp='.$masp.'&t='.$t.'&h='.$anh.'&mau='.$mau.'"
	</script>';
}
?>

<script language="javascript">
	// Chức năng chọn hết
	document.getElementById("btn1").onclick = function() {
		// Lấy danh sách checkbox
		var checkboxes = document.getElementsByName('chon[]');
		// Lặp và thiết lập checked
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = true;
		}
	};
	// Chức năng bỏ chọn hết
	document.getElementById("btn2").onclick = function() {
		// Lấy danh sách checkbox
		var checkboxes = document.getElementsByName('chon[]');
		// Lặp và thiết lập Uncheck
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = false;
		}
	};

	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (charCode == 59 || charCode == 46)
			return true;
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>