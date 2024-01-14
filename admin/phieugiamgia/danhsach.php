<?php
include_once('../model/database.php');
$sql = "select * from phieugiamgia ";
$rs = mysqli_query($conn, $sql);
$sql1 = "select * from khachhang ";
$rs1 = mysqli_query($conn, $sql1);
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">

			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Phiếu giảm giá
		</h4>
	</div>
	<?php if (isset($_GET['view']) && $_GET['view'] == 'them') { ?>
		<?php include_once('phieugiamgia/them.php'); ?>
	<?php } else if (isset($_GET['view']) && $_GET['view'] == 'sua') { ?>
		<?php include_once('phieugiamgia/sua.php'); ?>
	<?php } else { ?>
		<div class="my-5 d-flex justify-content-end">
			<a href="?action=phieugiamgia&view=them" class="btn btn-outline-primary w-25 text-capitalize">Thêm phiếu giảm giá</a>
		</div>
	<?php } ?>
	<div class="card card-body">
		<div class="row">
			<table class="table table-hover m-auto text-center" style="font-size: 13px;">
				<thead class="badge-info">
					<tr>
						<th>STT</th>
						<th>Tên phiếu</th>
						<th>Mã code phiếu</th>
						<th>Số lượng</th>
						<th>Số tiền được giảm</th>
						<th>Thời hạn phiếu</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php $so = 0;
					$stt = 0;
					while ($row = mysqli_fetch_array($rs)) {
						$stt++; ?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $row['TenPhieu']; ?></td>
							<td><?php echo $row['CodePhieu']; ?></td>
							<td><?php echo $row['SoLuong']; ?></td>
							<td><?php echo number_format($row['SoTien'], 0, ',', ','); ?>đ</td>
							<td><?php echo date('d-m-Y', strtotime($row['ThoiHan'])); ?></td>
							<td width="300">
								<a class="mb-3 d-block btn btn-outline-primary mx-auto w-50 fs-14 text-capitalize" href="?action=phieugiamgia&view=sua&maphieu=<?php echo $row['MaPGG']; ?>"><i class="far fa-edit"></i></a>
								<a class="mb-3 d-block btn btn-outline-danger mx-auto w-50 fs-14 text-capitalize" href="?action=phieugiamgia&view=xoa&maphieu=<?php echo $row['MaPGG']; ?>"><i class="fas fa-backspace"></i></a>
								<a class="mb-3 d-block btn btn-outline-info mx-auto w-50 fs-14 text-capitalize open-modal-gift" data-id="<?=$row['MaPGG']?>" data-toggle="modal" data-target="#giveAGift"><i class="fa-solid fa-gift"></i></a>
							</td>
						</tr>
					<?php	} ?>

				</tbody>
			</table>
		</div>
	</div>

</div>
<div class="modal fade" id="giveAGift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tặng phiếu giảm giá</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="phieugiamgia/xuly.php" method="POST">
				<div class="modal-body list-gift">
					<input type="hidden" name="maphieu" id="mapgg">
					<div class="form-group">
						<label for="">Cho khách hàng</label>
						<select name="makh[]" multiple id="" class="form-control d-block">
							<?php while($row1 = mysqli_fetch_assoc($rs1)){?>
							<option value="<?=$row1['MaKH']?>"><?=$row1['TenKH']?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy bỏ</button>
					<button type="submit" class="btn btn-outline-primary" name="tang">Xác nhận</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
if (isset($_GET['thongbao'])) {
	$thongbao = $_GET['thongbao'];
	echo "<script>
		alert('" . $thongbao . "')
		location.href = '?action=phieugiamgia&view=them';
		</script>";
	// header('Location: ?action=danhmuc&view=themdm');
}

?>