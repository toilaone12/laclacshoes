<?php 
	include_once('../../model/database.php');
	ob_start();
	session_start(); 
	if (isset($_GET['action'])) {
		$action=$_GET['action'];
		$so=$_GET['so'];
		$dg=$_GET['dg'];
		if (isset($_GET['chon'])){$chon=$_GET['chon'];}else{$chon[]=0;}
		if (isset($_GET['note'])){$note=$_GET['note'];}else{$note='';}
		$tongsp = count($_GET['chon']);
		$masp=$_GET['masp'];
		$mau=$_GET['mau'];
		$tt=$so*$dg;
		$sqlCheck = 'SELECT * FROM sanpham WHERE MaSP = '.$masp;
		$rsCheck = mysqli_query($conn,$sqlCheck);
		$soluongkho = mysqli_fetch_assoc($rsCheck)['SoLuongKho'];
		$tongslchon = $tongsp * $so;
		$nv=$_SESSION['admin'];
		$manv=$nv['MaNV'];
		switch ($action) {
			case 'xuathang':
				// var_dump($tongslchon > $soluongkho); die;
				if($tongslchon > $soluongkho){
					header('location:'.$_SERVER["HTTP_REFERER"].'&tb=Quá số lượng sản phẩm trong kho');
				}else{
					$con = $soluongkho - $tongslchon;
					$sqlKho="UPDATE sanpham SET SoLuongKho = ".$con." where MaSP=".$masp;
					$rsKho=mysqli_query($conn,$sqlKho);
					foreach ($chon as $key => $value) {
						$sql="UPDATE chitietsanpham SET SoLuong=(SoLuong+".$so.") where MaSP=".$masp." and MaMau='".$mau."' and MaSize=".$value;
						$rs=mysqli_query($conn,$sql);
						$sql2="INSERT INTO `phieunhap`( `MaNV`, `MaSP`, `SoLuong`, `DonGia`, `TongTien`, `Note`, `Size`, `Mau`) VALUES ($manv,$masp,$so,'$dg','$tt','$note','$value','$mau')";
						$rs2=mysqli_query($conn,$sql2);
					}
					if (isset($rs)) {
						header('location:'.$_SERVER["HTTP_REFERER"].'&tb=ok');
					}else{ header('location:'.$_SERVER["HTTP_REFERER"].'&tb=loi'); }
				}
				break;
			// case 'xuathang':
			// 	foreach ($chon as $key => $value) {
			// 		$sql="UPDATE chitietsanpham SET SoLuong=(SoLuong-".$so.") where MaSP=".$masp." and MaMau='".$mau."' and MaSize=".$value;
			// 		$rs=mysqli_query($conn,$sql);
			// 		$sql2="INSERT INTO `phieuxuat`(`MaNV`, `MaSP`, `Mau`, `Size`, `SoLuong`, `DonGia`, `TongTien`, `Note`) VALUES ($manv,$masp,'$mau','$value',$so,'$dg','$tt','$note')";
			// 		// var_dump($sql2); die;
			// 		$rs2=mysqli_query($conn,$sql2);
			// 	}
			// 	if (isset($rs)) {
			// 		header('location:'.$_SERVER["HTTP_REFERER"].'&tb=ok');
			// 	}else{ header('location:'.$_SERVER["HTTP_REFERER"].'&tb=loi'); }
			// 	break;
		}
		
	}
 ?>