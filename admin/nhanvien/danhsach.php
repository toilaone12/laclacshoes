<?php
$sql = "select *from nhanvien";
$rs = mysqli_query($conn, $sql);

?>
<div class="container-fluid">
	<div class=" alert alert-primary">
		<h4 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">
			</span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Nhân Viên
		</h4>
	</div><br>
	<div class="card">
		<div class="card-body">
			<table class="table table-hover m-auto text-center" style="font-size: 13px;">
				<thead class="badge-info">
					<tr>
						<th>Mã NV</th>
						<th>Họ tên</th>
						<th>Email</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ</th>
						<th>Quyền</th>
						<th>Mật khẩu</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php $so = 0;
					while ($row = mysqli_fetch_array($rs)) { ?>
						<tr>
							<td><?php echo $row['MaNV']; ?></td>
							<td><?php echo $row['TenNV']; ?></td>
							<td><?php echo $row['Email']; ?></td>
							<td><?php echo $row['SDT']; ?></td>
							<td><?php echo $row['DiaChi']; ?></td>
							<td>
								<?php 
								$sqlQuyen = "SELECT * FROM quyen WHERE id = ".$row['Quyen'];
								$rsQuyen = mysqli_query($conn,$sqlQuyen);
								echo mysqli_fetch_assoc($rsQuyen)['Ten']; 
								?>
							</td>
							<td><input type="password" readonly class="btn btn-sm bt" value="<?php echo $row['MatKhau']; ?>"></td>
							<td width="200">
								<a class="mb-3 btn btn-outline-primary mx-auto w-50 fs-14 text-capitalize" href="index.php?action=nhanvien&view=sua&manv=<?php echo $row['MaNV']; ?>"><i class="far fa-edit"></i></a>
								<a class="mb-3 btn btn-outline-danger mx-auto w-50 fs-14 text-capitalize" href="nhanvien/xuly.php?xoa&manv=<?php echo $row['MaNV']; ?>"><i class="fas fa-backspace"></i></a>
							</td>		
						</tr>
					<?php	} ?>
				</tbody>
			</table>
			<hr>
			<div class="m-auto">
				<a href="?action=nhanvien&view=them"><button class="btn btn-info" type="button">Thêm</button></a>
			</div>
		</div>

	</div>
</div>
<script>
	$(document).ready(function() {
		$('input[type="password"]').after(' <input type="button" class="check btn-sm btn"  value="show" />');
		$('.check').click(function() {
			var prev = $(this).prev();
			var value = prev.val();
			var type = prev.attr('type');
			var name = prev.attr('name');
			var id = prev.attr('id');
			var klass = prev.attr('class');
			var new_type = (type == 'password') ? 'text' : 'password';
			prev.remove();
			$(this).before('<input type="' + new_type + '"readonly value="' + value + '" name="' + name + '" value="' + value + '"id="' + id + '" class="' + klass + '" />');


		});
	})
</script>

<!-- <script>
$(document).ready(function(){
    $('input[type="password"]').after(' <input type="checkbox" style="width:30px;" class="check" />');
    $('.check').change(function(){
        var prev = $(this).prev();
        var value = prev.val();
        var type = prev.attr('type');
        var name = prev.attr('name');
        var id = prev.attr('id');
        var klass = prev.attr('class');
        var new_type = (type == 'password') ? 'text' : 'password';
        prev.remove();
        $(this).before('<input type="'+new_type+'"readonly value="' +value+ '" name="' +name+ '" value="' +value+ '"id="' +id+ '" class="' +klass+ '" />');

    });
})
</script> -->
<style type="text/css" media="screen">
	.bt {
		width: 100px;
		font-size: 0.85em;
	}
</style>