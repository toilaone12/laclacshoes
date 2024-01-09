<?php
include_once('../model/database.php');

// lấy danh sách sản phẩm  theo phân trang.
if (isset($_GET['trang'])) {
	$trang = $_GET['trang'];
} else {
	$trang = 1;
}
$from = ($trang - 1) * 10;
$sql = "SELECT * FROM `sanpham`   LIMIT $from,10 ";
$rs = mysqli_query($conn, $sql);
$so = mysqli_num_rows($rs);
?>

<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">

			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Sản Phẩm
		</h4>
	</div>
	<div class="card card-body ">
		<?php include_once('sanpham/main.php'); ?>
		<div class="row">

			<table class="table table-hover m-auto text-center" style="font-size: 13px;">
				<thead class="badge-info">
					<tr>
						<th>Ảnh nền</th>
						<th>Tên sản phẩm</th>
						<th>Danh mục</th>
						<th>Nhà cung cấp</th>
						<th>Số lượng</th>
						<th>Mô tả</th>
						<th>Đơn giá</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php $so = 0;
						while ($row = mysqli_fetch_array($rs)) { 
							$sqlDanhMuc = 'SELECT * FROM danhmuc WHERE MaDM = '.$row['MaDM'];
							$sqlNhaCC = 'SELECT * FROM nhacc WHERE MaNCC = '.$row['MaNCC'];
							$rsDanhMuc = mysqli_query($conn,$sqlDanhMuc);
							$rsNhaCCc = mysqli_query($conn,$sqlNhaCC);
							$tenDM = mysqli_fetch_assoc($rsDanhMuc)['TenDM']; 
							$tenNCC = mysqli_fetch_assoc($rsNhaCCc)['TenNCC']; 
					?>
						<tr>
							<td><img src="../webroot/image/sanpham/<?php echo $row['AnhNen']; ?>" width="60" height="50"></td>
							<td width="200"><?php echo $row['TenSP']; ?></td>
							<td><?php echo $tenDM; ?></td>
							<td><?php echo $tenNCC; ?></td>
							<td><?php echo $row['SoLuong']; ?></td>
							<td><a class="modal-description text-danger" data-toggle="modal" data-target="#descriptionProduct" title="<?php echo $row['MoTa']; ?>"><?php echo 'Xem chi tiết' ?></a></td>
							<td><?php echo number_format($row['DonGia']) . 'đ'; ?></td>
							<td width="390">
								<a class="mb-3 btn btn-outline-primary mx-auto w-25 fs-14 text-capitalize" href="index.php?action=sanpham&view=suasp&masp=<?php echo $row['MaSP']; ?>"><i class="far fa-edit"></i></a>
								<a class="mb-3 btn btn-outline-danger mx-auto w-25 fs-14 text-capitalize" href="sanpham/main.php?view=xoasp&masp=<?php echo $row['MaSP']; ?>"><i class="fas fa-backspace"></i></a>
							</td>
						</tr>
					<?php	} ?>

				</tbody>
			</table>
		</div>


	</div><br>
	<div class="row ">
		<?php
		$ds_spn1b = "SELECT MaSP FROM `sanpham`";
		$query_dssp2 = mysqli_query($conn, $ds_spn1b);
		$sosp = mysqli_num_rows($query_dssp2);
		$sotrang = ceil($sosp / 20); ?>
		<hr>
		<ul class="pagination justify-content-center">
			<?php for ($x = 1; $x <= $sotrang; $x++) { ?>
				<li class="page-item">
					<a class="page-link " href="index.php?action=sanpham&trang=<?php echo $x ?>"><?php echo $x; ?></a>
				</li>
			<?php } ?>


		</ul>

	</div>
<div class="modal fade" id="descriptionProduct" tabindex="-1" role="dialog" aria-labelledby="invoiceLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="invoiceLabel">Chi tiết sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="content-description">

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Đóng</button>
				<button type="submit" class="btn btn-outline-primary">Xác nhận</button>
			</div>
		</div>
	</div>
</div>
</div>