
<?php
include_once('../../model/database.php');
// Thêm màu
if (isset($_GET['them'])) {
	$tencc = $_GET['tenncc'];
	$sqlCheck = "SELECT * FROM nhacc WHERE TenNCC = '" . $tencc . "'";
	$rsCheck = mysqli_query($conn, $sqlCheck);
	if ($rsCheck->num_rows > 0) {
		header('location:../index.php?action=nhacc&view=them&thongbao=Tên nhà cung cấp trùng');
	} else {
		$sql = "insert into nhacc(TenNCC) values(N'$tencc')";
		$rs = mysqli_query($conn, $sql);
		if (($rs)) {
			header('location:../index.php?action=nhacc&view=them&thongbao=Thêm nhà cung cấp thành công');
		} else {
			header('location:../index.php?action=nhacc&view=them&thongbao=Lỗi truy vấn');
		}
	}
}
//----------------------------------------
//Cập nhập
if (isset($_GET['sua'])) {
	// var_dump($_GET); die;
	$mancc = $_GET['mancc'];
	$tenncc = $_GET['tenncc'];
	$sql = "UPDATE `nhacc` SET `TenNCC`= N'$tenncc' where MaNCC=$mancc";
	$rs = mysqli_query($conn, $sql);
	if (($rs)) {
		header('location:../index.php?action=nhacc&view=them&thongbao=Sửa nhà cung cấp thành công');
	} else {
		header('location:../index.php?action=nhacc&view=them&thongbao=Lỗi truy vấn');
	}
}

//----------------------------------------
// xóa màu
if (isset($_GET['xoa'])) {
	$mancc = $_GET['mancc'];
	//san pham
	$sql1 = "DELETE FROM sanpham WHERE MaNCC = ".$mancc;
	$rs1 = mysqli_query($conn,$sql1);
	if($rs1){
		$sql = "delete from nhacc where MaNCC = ".$mancc;
		$rs = mysqli_query($conn, $sql);
		// var_dump(mysqli_error($conn)); die;
		if (($rs)) {
			header('location:../index.php?action=nhacc&view=them&thongbao=Xóa nhà cung cấp thành công');
		} else {
			header('location:../index.php?action=nhacc&view=them&thongbao='.mysqli_error($conn));
		}
	}
}
