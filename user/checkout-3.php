<!DOCTYPE html>
<html lang="en">
<?php include('../config/condb.php'); ?>
<head>
    <?php include('inc/css.php'); ?>
    <style>
		.total-item{
			float: right;
		}
		.total-item div{
			width: 300px;
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 5px;
			font-size: 20px;
		}
		.total div label{
			text-align: right;
			width: 150px;
		}
	</style>
</head>
<body>

    <div class="container">
        <?php include('inc/header.php');?>

        <div class="row">
			<div class="col-md-12">
			    <div class="checkout-steps clearfix">

			        <p class="step" href="checkout-1.php">
			            <span  class="entypo chevron-right"></span>
			            1. กรอกข้อมูล
			        </p>

			        <p class="step" href="checkout-2.php">
			            <span  class="entypo chevron-right"></span>
			            2. เลือกการจัดส่ง/จ่ายเงิน
			        </p>

			        <p class="step step-active" >
			            3. การยืนยัน
			        </p>

			    </div>
			</div>
		</div>

		<div class="row">
			<form action="" method="post">
			<div class="col-md-12">

						<br><br>
						<table class="basket-table table table-bordered" style="background-color: #fff;;">
							<thead>
								<tr>
									<th width="15%">รูปสินค้า</th>
									<th width="30%">ชื่อสินค้า</th>
									<th width="15%">จำนวน</th>
									<th width="15%">ราคา</th>
									<th width="15%">ราคารวม</th>
									<th width="10%">ลบ</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$_SESSION['user_address'] = $_POST['user_address'];

								$sumTotal = 0;
								for($i=0;$i<=(int)@$_SESSION["intLine"];$i++){

									if(@$_SESSION["p_id"][$i] != ""){

										$sql = "SELECT * FROM tbl_product ";
										$sql .= " INNER JOIN tbl_product_image ON tbl_product.p_id = tbl_product_image.p_id ";
										$sql .= " LEFT JOIN tbl_promotion ON tbl_product.p_id = tbl_promotion.p_id ";
										$sql .= " WHERE tbl_product.p_id = '".$_SESSION["p_id"][$i]."' ";
										$sql .= " GROUP BY tbl_product.p_id ";

										$query = mysqli_query($con, $sql);
										$result = mysqli_fetch_array($query);

										$price = 0;
										if(isset($result['p_cost2'])){
											$price = $result['p_cost2'];
										}else{
											$price = $result['p_price'];
										}

										$total_price = $_SESSION['qty'][$i] * $price;

										$sumTotal += $total_price;
								?>

									<tr>
										<td class="image"><a href=""><img src="../seller/img/<?= $result['img_name'] ?>" alt="Ibiza Lips" /></a></td>
										<td class="title"><a href=""><?=$result['p_name']?></a></td>
										<td class="qty"><input type="text" name="qty[]" class="qty" data-product-id="<?=$_SESSION["p_id"][$i]?>" value="<?=$_SESSION['qty'][$i]?>" /></td>
										<td class="price">
											<?=$price?>
										</td>
										<td class="total">
											<?=$total_price?>
										</td>
										<td class="remove"><a onclick="return confirm('ยืนยันการลบสินค้านี้ออกจากตระกร้าสินค้า?')" href="process-shopping.php?action=delete_cart&Line=<?=$i?>"><span class="entypo trash"></span></a></td>
									</tr>
									
								<?php } ?>
								<?php } ?>

							</tbody>
						</table>
			            
						<br>
						<?php 
							 	 
								  $sql2 = "SELECT * FROM tbl_expenses where e_id = '" .$_POST['shipping']. "' ";
								  $result2 = mysqli_query($con, $sql2);
								  $data2 = mysqli_fetch_array($result2);
							?>
						<div class="total-item">
			            <div>
								ค่าจัดส่ง
								<label><?php echo $data2['e_price'] ?></label>
			                </div>
			                <br>
							<div>
								ราคารวม
								<label><?=number_format($sumTotal+$data2['e_price'],2)?></label>
			                </div>
			                <br>
			                <p class="actions">
						<a class="btn btn-primary" href="checkout-2.php">ก่อนหน้านี้</a>
						<a onclick="return confirm('ยืนยันการสั่งซื้อสินค้า')" class="btn btn-primary" href="process.php?action=confirm_order&shipping=<?php echo $data2['e_price'] ?>">ยืนยันการสั่งซื้อ</a>
			            
						</p>
			            </div>

			</div>

			</form>
		</div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
    <script>
		$('.qty').keyup(function(){
			var qty = $(this).val();
			var p_id = $(this).attr('data-product-id');
			if(qty != '' && parseInt(qty) > 0){
				var urlRedirect = "process-shopping.php?action=add_cart&p_id="+p_id+"&qty="+qty;
				window.location.href = urlRedirect;
			}
			
		});
	</script>
</body>
</html>