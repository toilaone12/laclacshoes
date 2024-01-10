<?php
$sql = "select * from khuyenmai ";
$rs = mysqli_query($conn, $sql);

?>
<div class="row">
	<table class="table table-hover m-auto text-center">
		<thead class="badge-info" style="font-size: 14px;">
			<tr>
				<th>Mã KM</th>
				<th>Tên khuyến mãi</th>
				<th>Phần trăm khuyến mãi</th>
				<th>Giá khuyến mãi</th>
				<th>Mô tả</th>
				<th>Ngày bắt đầu</th>
				<th>Ngày kết thúc </th>
				<th>Chức năng</th>
			</tr>
		</thead>
		<tbody style="font-size: 12px;">
			<?php $so = 0;
			while ($row = mysqli_fetch_array($rs)) { ?>
				<tr>
					<td><?php echo $row['MaKM']; ?></td>
					<td><?php echo $row['TenKM']; ?></td>
					<td width="100"><?php echo $row['KM_PT'] ? $row['KM_PT'] . ' %' : 'Không có'; ?></td>
					<td width="300"><?php echo $row['TienKM'] ? number_format($row['TienKM']) . ' đ' : 'Không có'; ?></td>
					<td><?php echo $row['MoTa']; ?></td>
					<td><?php echo $row['NgayBD']; ?></td>
					<td><?php echo $row['NgayKT']; ?></td>
					<td width="300">
						<a class="mb-3 btn btn-outline-primary mx-auto w-50 fs-14 text-capitalize d-block" href="index.php?action=khuyenmai&view=sua&makm=<?php echo $row['MaKM']; ?>"><i class="far fa-edit"></i></a>
						<a class="mb-3 btn btn-outline-info mx-auto w-50 fs-14 text-capitalize d-block" href="index.php?action=khuyenmai&view=apply&makm=<?php echo $row['MaKM']; ?>">Áp dụng</a>
						<a class="mb-3 btn btn-outline-danger mx-auto w-50 fs-14 text-capitalize d-block" href="khuyenmai/xuly.php?xoa=xoa&makm=<?php echo $row['MaKM']; ?>"><i class="fas fa-backspace"></i></a>
					</td> <!-- sửa-->
				</tr>
			<?php	} ?>

		</tbody>
	</table>
</div>
</div>
</div>