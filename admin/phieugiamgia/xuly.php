
<?php
include_once('../../model/database.php');
// Thêm màu
if (isset($_POST['them'])) {
	$tenphieu = $_POST['tenphieu'];
	$maphieu = $_POST['maphieu'];
	$soluong = $_POST['soluong'];
	$sotien = $_POST['sotien'];
	$thoihan = $_POST['thoihan'];
	$sqlCheck = "SELECT * FROM phieugiamgia WHERE CodePhieu = '" . $maphieu . "'";
	$rsCheck = mysqli_query($conn, $sqlCheck);
	// var_dump($rsCheck->num_rows > 0); die;
	if ($rsCheck->num_rows > 0) {
		header('location:../index.php?action=phieugiamgia&view=them&thongbao=Mã phiếu giảm giá trùng');
	} else {
		$sql = "INSERT INTO `phieugiamgia` VALUES ('','$tenphieu','$maphieu','$soluong','$sotien','$thoihan')";
		$rs = mysqli_query($conn, $sql);
		if (($rs)) {
			header('location:../index.php?action=phieugiamgia&view=them&thongbao=Thêm phiếu giảm giá thành công');
		} else {
			header('location:../index.php?action=phieugiamgia&view=them&thongbao=Lỗi truy vấn');
		}
	}
}
//----------------------------------------
//Cập nhập
if (isset($_POST['sua'])) {
	// var_dump($_GET); die;
	$maphieu = $_POST['maphieu'];
	$codephieu = $_POST['codephieu'];
	$tenphieu = $_POST['tenphieu'];
	$soluong = $_POST['soluong'];
	$sotien = $_POST['sotien'];
	$thoihan = $_POST['thoihan'];
	$sql = "UPDATE `phieugiamgia` SET `TenPhieu`= N'$tenphieu', `CodePhieu` = N'$codephieu', `SoLuong` = $soluong, `SoTien` = $sotien, `ThoiHan` = N'$thoihan' where MaPGG=$maphieu";
	$rs = mysqli_query($conn, $sql);
	if (($rs)) {
		header('location:../index.php?action=phieugiamgia&view=sua&thongbao=Sửa phiếu giảm giá thành công');
	} else {
		header('location:../index.php?action=phieugiamgia&view=sua&thongbao=Lỗi truy vấn');
	}
}

//----------------------------------------
// xóa màu
if (isset($_GET['xoa'])) {
	$maphieu = $_GET['maphieu'];
	$sql1 = "DELETE FROM khachhangphieugiamgia WHERE MaPGG = " . $maphieu;
	$rs1 = mysqli_query($conn, $sql1);
	// var_dump($rs1==true); die;
	if ($rs1) {
		$sql = "DELETE FROM phieugiamgia WHERE MaPGG = " . $maphieu;
		$rs = mysqli_query($conn, $sql);
		// var_dump(mysqli_error($conn)); die;
		if (($rs)) {
			header('location:../index.php?action=phieugiamgia&thongbao=Xóa phiếu giảm giá thành công');
		} else {
			header('location:../index.php?action=phieugiamgia&view=them&thongbao=' . mysqli_error($conn));
		}
	}
}
// tang phieu giam gia
if (isset($_POST['tang'])){
	$maphieu = $_POST['maphieu'];	
	$arrayKH = $_POST['makh'];
	$arrayResult = [];
	foreach($arrayKH as $makh){
		$sqlCheck = "SELECT * FROM `khachhangphieugiamgia` WHERE MaPGG = $maphieu AND MaKH = $makh";
		$rsCheck = mysqli_query($conn,$sqlCheck);
		if($rsCheck->num_rows > 0){
			$sqlKH = "SELECT * FROM `khachhang` WHERE MaKH = $makh";
			$rsKH = mysqli_query($conn,$sqlKH);
			$tenKH = mysqli_fetch_assoc($rsKH)['TenKH'];
			$arrayResult[] = ['res' => 'false', 'name' => $tenKH];
		}else{
			$arrayResult[] = ['res' => 'true'];
		}
	}
	$status = '';
	$isTrue = true;
	foreach($arrayResult as $result){
		if($result['res'] == 'false'){
			$isTrue = false;
			$status .= 'Tài khoản tên '.$result['name'].' đã có phiếu giảm giá này và ';
		}
	}
	$status = rtrim($status,' và ');
	if(!$isTrue){
		header('location:../index.php?action=phieugiamgia&view=them&thongbao='.$status);
	}else{
		foreach($arrayKH as $makh){
			$sql = "INSERT INTO `khachhangphieugiamgia` VALUES ('',$maphieu,$makh)";
			$rs = mysqli_query($conn,$sql);
		}
		header('location:../index.php?action=phieugiamgia&view=them&thongbao=Tặng phiếu giảm giá thành công');
	}
	// var_dump($arrayResult); die;
}
