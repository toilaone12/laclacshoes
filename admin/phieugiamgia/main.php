<?php
include_once('../model/database.php');
if (isset($_GET['view'])) {
	$view = $_GET['view'];
	switch ($view) {
		case 'them':
			// var_dump(1); die;
			// include_once('them.php');
			include_once('phieugiamgia/danhsach.php');
			break;
		case 'sua':
			include_once('phieugiamgia/danhsach.php');
			break;

		case 'xoa':
			$maphieu = $_GET['maphieu'];
			// var_dump('location:phieugiamgia/xuly.php?xoa=1&maphieu=' . $maphieu); die;
			header('location:phieugiamgia/xuly.php?xoa=1&maphieu=' . $maphieu);
			break;
		default:
			include_once('danhsach.php');
			break;
	}
} else {
	include_once('danhsach.php');
}
