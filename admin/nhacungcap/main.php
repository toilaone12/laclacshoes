<?php 
	include_once('../model/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'them':
					 include_once('them.php');	
				break;
			case 'sua':
					include_once('sua.php');
				break;
		
			case 'xoa':
					$mancc=$_GET['mancc'];
					header('location:xuly.php?xoa=1&mancc='.$mancc);
				break;
			default:
					include_once('them.php');
				break;
		}
	}
	

?>