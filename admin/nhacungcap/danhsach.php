<?php
include_once('../model/database.php');
$sql = "select * from nhacc";
$rs = mysqli_query($conn, $sql);

?>
<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">

			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Nhà cung cấp
		</h4>
	</div><br>

	<?php include_once('nhacungcap/main.php'); ?>
	<div class="card card-body">
		<div class="row">
			<table class="table table-hover m-auto text-center" style="font-size: 13px;">
				<thead class="badge-info">
					<tr>
						<th>Mã nhà cung cấp</th>
						<th>Tên nhà cung cấp</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php $so = 0;
					while ($row = mysqli_fetch_array($rs)) { ?>
						<tr>
							<td><?php echo $row['MaNCC']; ?></td>
							<td><?php echo $row['TenNCC']; ?></td>
							<td>
								<a class="mb-3 btn btn-outline-primary mx-auto w-25 fs-14 text-capitalize" href="index.php?action=nhacc&view=sua&mancc=<?php echo $row['MaNCC']; ?>"><i class="far fa-edit"></i></a>
								<a class="mb-3 btn btn-outline-danger mx-auto w-25 fs-14 text-capitalize" href="nhacungcap/main.php?view=xoa&mancc=<?php echo $row['MaNCC']; ?>"><i class="fas fa-backspace"></i></a>
							</td>
						</tr>
					<?php	} ?>

				</tbody>
			</table>
		</div>
	</div>

</div>

<?php
	if(isset($_GET['thongbao'])){
		$thongbao = $_GET['thongbao'];
		echo "<script>
		alert('".$thongbao."')
		location.href = '?action=nhacc&view=them';
		</script>";
		// header('Location: ?action=danhmuc&view=themdm');
	}

?>