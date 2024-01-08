<?php
include_once('../model/database.php');
$sql = "SELECT * FROM `hoadon`";
$rs = mysqli_query($conn, $sql);
// $dem = mysqli_num_rows($rs);
$arrStatus = array(
    'chua duyet' => 0,
    'Da duyet' => 0,
    'Huy Bo' => 0,
    'hoan thanh' => 0
);
while($row = mysqli_fetch_assoc($rs)) {
    $status = convert_vn2latin($row['TinhTrang']);
	if (array_key_exists($status, $arrStatus)) {
        $arrStatus[$status]++;
    }
}
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">

			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Đơn Đặt Hàng
		</h4>
	</div>
	<div class="row">
		<form action="?action=xldathang" method="GET" class="col-md-9 grid-margin stretch-card">
			<input hidden name="action" value="xldathang">
			<div class="card">
				<div class="card-body ">
					<button type="sub" name="dk" value="chưa duyệt" class="btn rounded text-capitalize btn-warning ">Chờ xử lý</button>
					<span class="counter counter-lg" style="top: -23px;"><?php echo $arrStatus['chua duyet'] ?></span>
					<button type="sub" name="dk" value="Đã duyệt" class="btn rounded text-capitalize btn-primary">Đã Duyệt</button>
					<span class="counter counter-lg" style="top: -23px;"><?php echo $arrStatus['Da duyet'] ?></span>
					<button type="sub" name="dk" value="Hủy bỏ" class="btn rounded text-capitalize btn-danger">Đơn Hủy</button>
					<span class="counter counter-lg" style="top: -23px;"><?php echo $arrStatus['Huy Bo'] ?></span>
					<button type="sub" name="dk" value="hoàn thành" class="btn rounded text-capitalize btn-primary">Hoàn Thành</button>
					<span class="counter counter-lg" style="top: -23px;"><?php echo $arrStatus['hoan thanh'] ?></span>
					<?php 
						if(isset($_GET['view']) && $_GET['view'] == 'ctdh'){
							$sqlCheck = 'SELECT * FROM hoadon WHERE MaHD = '.$_GET['mahd'];
							$rsCheck = mysqli_query($conn, $sqlCheck);
							$status = convert_vn2latin(mysqli_fetch_assoc($rsCheck)['TinhTrang']);
							if($status == 'hoan thanh' || $status == 'Da duyet'){
					?>
					<button type="button" class="btn rounded text-capitalize btn-success" data-toggle="modal" data-target="#invoice">In hóa đơn</button>
					<?php 
							}
						} 
					?>
				</div>
			</div>
		</form>
	</div>
	<br>
	<?php
	if (isset($_GET['view'])) {
		$view = $_GET['view'];
		switch ($view) {
			case 'ctdh':
				include_once('dondathang/chitietdathang.php');
				break;
		}
	} else {
		include_once('dondathang/dondathang.php');
	}
	?>
</div>