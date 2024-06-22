<!DOCTYPE html>
<html lang="en">
<?php include('check_login.php'); include('../config/condb.php'); ?>
<head>
    <?php include('inc/css.php'); ?>
    <style>
		.total-item {
			float: right;
		}

		.total-item div {
			width: 300px;
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 5px;
			font-size: 20px;
		}

		.total div label {
			text-align: right;
			width: 150px;
		}
	</style>
</head>
<body>

    <div class="container">
        <?php include('inc/header.php');?>
        <h5>รายการสั่งซื้อ</h5>
        <div class="row">

			<div class="col-md-12">

				<table class="basket-table table table-bordered" style="background-color: #fff;;">
					<thead>
						<tr>
							<th style="text-align:center" width="8%">ลำดับ</th>
							<th style="text-align:center" width="15%">วันที่</th>
							<th style="text-align:center" width="15%">ชื่อลูกค้า</th>
							<th style="text-align:center" width="8%">รายการสั่งซื้อ</th>
							<th style="text-align:center" width="8%">ค่าจัดส่ง</th>
							<th style="text-align:center" width="8%">สถานะ</th>
							<th style="text-align:center" width="8%">ใบเเจ้งหนี้</th>

						</tr>
					</thead>
					<tbody>

						<?php
						$id = $_SESSION['id'];
						//echo $id;
						$sql = "SELECT * FROM tbl_order 
						INNER JOIN user ON user.id = tbl_order.id  WHERE tbl_order.id = $id ORDER BY tbl_order.or_date DESC ";
						//echo $sql;

						$result  = mysqli_query($con, $sql);
						$A = '1';
						while ($data_user = mysqli_fetch_array($result)) {

							?>


							<tr>
								<td style="text-align:center"><?php echo $A; ?></td>
								<td style="text-align:center"><?php echo $data_user['or_date']; ?></td>
								<td style="text-align:center"><?php echo $data_user['firstname']; ?> <?php echo $data_user['lastname']; ?></td>

								<?php
									//$or_id = $data['or_id'];
									$sql3 = "SELECT * FROM tbl_orderdetail  WHERE or_id = '" . $data_user['or_id'] . "'";
									$result3 = mysqli_query($con, $sql3);
									$data3 = mysqli_fetch_array($result3);

									?>
								<td style="text-align:center" ><a href="order.php?or_id=<?php echo $data_user['or_id']; ?>&shipping=<?php echo $data_user['shipping_price']; ?>" class="btn btn-success btn-sm">รายละเอียด</a></td>

								<td style="text-align:center"><?php echo $data_user['shipping_price']; ?></td>
								<td style="text-align:center">
									<?php
										if ($data_user['or_status'] == 'order') {

											echo 'รอชำระเงิน';
										} else if ($data_user['or_status'] == 'delivery') {

											echo 'ชำระเงินแล้ว';
										} else if ($data_user['or_status'] == 'cancel') {

											echo 'ยกเลิกออเดอร์';
										}else if ($data_user['or_status'] == 'delivery_waiting') {

					                      echo 'อยู่ระหว่างการจัดส่ง';
					                    }else if ($data_user['or_status'] == 'delivery_success') {

					                      echo 'จัดส่งเรียบร้อย';
					                    }
										?>
								</td>
								<td style="text-align:center" ><a target="_blank" href="invoice.php?or_id=<?php echo $data_user['or_id']; ?>" >ใบเเจ้งหนี้</a></td>
							</tr>




						<?php $A++;
						} ?>


					</tbody>
				</table>

				<p class="actions">
					<a class="btn btn-primary" href="index.php">เลือกซื้อสินค้า</a>
				</p>

			</div>

		</div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
    <script>
		$('.qty').keyup(function() {
			var qty = $(this).val();
			var p_id = $(this).attr('data-product-id');
			if (qty != '' && parseInt(qty) > 0) {
				var urlRedirect = "process-shopping.php?action=add_cart&p_id=" + p_id + "&qty=" + qty;
				window.location.href = urlRedirect;
			}

		});
	</script>
</body>
</html>
