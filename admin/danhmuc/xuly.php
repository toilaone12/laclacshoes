
<?php
include_once('../../model/database.php');
// Thêm màu
if (isset($_GET['themdm'])) {
	$tendm = $_GET['tendm'];
	$sqlCheck = "SELECT * FROM danhmuc WHERE TenDM = '" . $tendm . "'";
	$rsCheck = mysqli_query($conn, $sqlCheck);
	if ($rsCheck->num_rows > 0) {
		header('location:../index.php?action=danhmuc&view=themdm&thongbao=Tên danh mục trùng');
	} else {
		$sql = "insert into danhmuc(TenDM) values(N'$tendm')";
		$rs = mysqli_query($conn, $sql);
		if (($rs)) {
			header('location:../index.php?action=danhmuc&view=themdm&thongbao=Thêm danh mục thành công');
		} else {
			header('location:../index.php?action=danhmuc&view=themdm&thongbao=Lỗi truy vấn');
		}
	}
}
//----------------------------------------
//Cập nhập
if (isset($_GET['suadm'])) {
	// var_dump($_GET); die;
	$madm = $_GET['madm'];
	$tendm = $_GET['tendm'];
	$sql = "UPDATE `danhmuc` SET `TenDM`= N'$tendm' where MaDM=$madm";
	$rs = mysqli_query($conn, $sql);
	if (($rs)) {
		header('location:../index.php?action=danhmuc&view=themdm&thongbao=Sửa danh mục thành công');
	} else {
		header('location:../index.php?action=danhmuc&view=themdm&thongbao=Lỗi truy vấn');
	}
}

//----------------------------------------
// xóa màu
if (isset($_GET['xoa'])) {
	$madm = $_GET['madm'];
	$sql = "delete from danhmuc where MaDM = ".$madm;
	$rs = mysqli_query($conn, $sql);
	// var_dump(mysqli_error($conn)); die;
	if (($rs)) {
		header('location:../index.php?action=danhmuc&view=themdm&thongbao=Xóa danh mục thành công');
	} else {
		header('location:../index.php?action=danhmuc&view=themdm&thongbao='.mysqli_error($conn));
	}
}
