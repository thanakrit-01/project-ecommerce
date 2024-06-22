<!DOCTYPE html>
<html lang="en">
<?php include('check_login.php'); include('../config/condb.php'); ?>
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
        <h5>ตะกร้าสินค้า</h5>
        <div class="row">

			<div class="col-md-12">
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
				
				<?php if($sumTotal > 0){ ?>
					<div class="total-item">

						<div>
							ราคารวม
							<label><?=number_format($sumTotal,2)?></label>
						</div>

					</div>
					<br><br><br><br>

					<p class="actions">
						<a class="btn btn-primary" href="checkout-1.php">ต่อไป</a>
					</p>
				<?php } ?>

		</div>

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