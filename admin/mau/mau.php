<?php
$sql = "select * from Mau ";
$rs = mysqli_query($conn, $sql);

?>
<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">
			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Sản Phẩm&#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160;Màu
		</h4>
	</div><br>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-8">
					<table class="table table-hover table-bordered m-auto text-center" style="font-size: 13px;">
						<thead class="badge-info">
							<tr>
								<th>Tên màu sắc</th>
								<th>Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php $so = 0;
							while ($row = mysqli_fetch_array($rs)) { ?>
								<tr>
									<td><?php echo $row['MaMau']; ?></td>
									<td>
										<a class="mb-3 btn btn-outline-primary mx-auto w-25 fs-14 text-capitalize" href="index.php?action=mau&view=suamau&mamau=<?php echo $row['MaMau']; ?>"><i class="far fa-edit"></i></a>
										<a class="mb-3 btn btn-outline-danger mx-auto w-25 fs-14 text-capitalize" href="mau/main.php?view=xoamau&mamau=<?php echo $row['MaMau']; ?>"><i class="fas fa-backspace"></i></a>
									</td> <!-- sửa-->
								</tr>
							<?php	} ?>

						</tbody>
					</table>
				</div>
				<div class="col-lg-4">
					<?php include_once('main.php') ?>
				</div>
			</div>

		</div>
	</div>
</div>
<?php
	if(isset($_GET['thongbao'])){
		$thongbao = $_GET['thongbao'];
		echo "<script>
		alert('".$thongbao."')
		location.href = '?action=mau&view=themmau';
		</script>";
		// header('Location: ?action=danhmuc&view=themdm');
	}

?>