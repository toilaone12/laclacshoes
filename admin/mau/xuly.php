
<?php
include_once('../../model/database.php');
	// Thêm màu
	if(isset($_GET['themmau'])){
		$mamau=$_GET['mamau'];
		$sql="insert into mau(MaMau) values(N'$mamau')";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=mau&view=themmau&thongbao=Thêm thành công');
		}else{
			header('location:../index.php?action=mau&view=themmau&thongbao=Lỗi truy vấn');
		}
	}
	//----------------------------------------
	//Cập nhập
	if(isset($_GET['suamau'])){
		$id=$_GET['id'];
		$mamau=$_GET['mamau'];
		$sqlBill = "UPDATE `chitiethoadon` SET `MaMau`=N'$mamau' where MaMau='$id'";
		$sqlDetail = "UPDATE `chitietsanpham` SET `MaMau`=N'$mamau' where MaMau='$id'";
		$sqlExport = "UPDATE `phieuxuat` SET `Mau`=N'$mamau' where Mau='$id'";
		$sqlImport = "UPDATE `phieunhap` SET `Mau`=N'$mamau' where Mau='$id'";
		$rsBill=mysqli_query($conn,$sqlBill);
		$rsDetail=mysqli_query($conn,$sqlDetail);
		$rsExport=mysqli_query($conn,$sqlExport);
		$rsImport=mysqli_query($conn,$sqlImport);
		// $error=mysqli_error($conn);
		// var_dump($sqlDetail); die;
		if(($rsBill) && ($rsDetail) && ($rsExport) && ($rsImport)){
			$sql="UPDATE `mau` SET `MaMau`=N'$mamau' where MaMau='$id'";	
			// var_dump($sqlBill); die;
			$rs=mysqli_query($conn,$sql);
			if(isset($rs)){
				header('location:../index.php?action=mau&view=themmau&thongbao=Sửa thành công');
			}else{
				header('location:../index.php?action=mau&view=themmau&thongbao=Lỗi truy vấn');
			}
		}
	}

	//----------------------------------------
// xóa màu
if(isset($_GET['xoa'])){
	$mamau=$_GET['mamau'];
	$sqlBill = "DELETE FROM `chitiethoadon` where MaMau='$mamau'";
	$sqlDetail = "DELETE FROM `chitietsanpham` where MaMau='$mamau'";
	$sqlExport = "DELETE FROM `phieuxuat` where Mau='$mamau'";
	$sqlImport = "DELETE FROM `phieunhap` where Mau='$mamau'";
	$rsBill=mysqli_query($conn,$sqlBill);
	$rsDetail=mysqli_query($conn,$sqlDetail);
	$rsExport=mysqli_query($conn,$sqlExport);
	$rsImport=mysqli_query($conn,$sqlImport);
	// var_dump($sqlExport); die;
	if($rsBill && $rsDetail && $rsExport && $rsImport){
		$sql="delete from mau where MaMau='$mamau'";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=mau&view=themmau&thongbao=Xóa thành công');
		}else{
			header('location:../index.php?action=mau&view=themmau&thongbao=Lỗi truy vấn');
		}
	}
}