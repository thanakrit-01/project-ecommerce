<!DOCTYPE html>
<html lang="en">
<?php include('../config/condb.php'); ?>
<head>
    <?php include('inc/css.php'); ?>
</head>
<body>

    <div class="container">
        <?php include('inc/header.php');?>

        <div class="row">

			<div class="col-md-12">
				<?php
				//$s_id = $_SESSION['s_id'];
				$sql = "SELECT * FROM tbl_product LEFT JOIN tbl_promotion ON tbl_product.p_id = tbl_promotion.p_id JOIN seller ON seller.s_id = tbl_product.s_id where tbl_product.p_id='" . $_GET['p_id'] . "' ";
				$result = mysqli_query($con, $sql);
				$data = mysqli_fetch_array($result);

				?>
				<h5><?php echo $data['p_name'] ?></h5>

			</div>

		</div>

		<!-- Product Detail -->
		<div class="row">



			<div class="col-md-7">
				
				<?php
				$sql2 = "SELECT * FROM tbl_product_image where p_id='" . $_GET['p_id'] . "'";
				$result2 = mysqli_query($con, $sql2);
				$result3 = mysqli_query($con, $sql2);
				$result_image = mysqli_fetch_array($result2);
				?>
					
				<img class="product-image" src="../seller/img/<?= $result_image['img_name'] ?>" alt="รูปสินค้า" />

				<div class="row">

					<?php
					while ($data2 = mysqli_fetch_array($result3)) {
					?>
					
						<div class="col-md-3">
							<a href="javascript:" class="show-img" data-src="../seller/img/<?= $data2['img_name'] ?>"><img class="product-thumb" src="../seller/img/<?= $data2['img_name'] ?>" alt="รูปสินค้า" /></a>
						</div>
					
					<?php } ?>

				</div>

			</div>


			<div class="col-md-5">

				<div class="add-basket-box clearfix">

					<div class="add-basket-box-right">

						<a class="btn btn-addcart btn-primary" href="process-shopping.php?action=add_cart&p_id=<?=$_GET['p_id']?>"><span class="entypo cart"></span> สั่งซื้อ </a>

					</div>

					<img src="../seller/img/<?= $result_image['img_name'] ?>" alt="รูป" />

					<p><?php echo $data['p_name'] ?><br /><span><?php echo $data['p_price'] ?> บาท</span></p>

				</div>

				<p><?php echo $data['p_detail'] ?></p>

				<h5 class="ddpg">สินค้าคงเหลือ</h5>

				<p><?php echo $data['p_qty'] ?></p>

				<h5 class="ddpg">ราคา</h5>
				<p><?php echo $data['p_price'] ?> บาท</p>

				<h5 class="ddpg">โปรโมชั่น     <?php echo $data['promotion'] ?></h5>
				<p><?php echo $data['p_cost2'] ?> บาท</p>

				<h5 class="ddpg">ข้อมูลร้านค้า</h5>
				<p>
					<?php echo $data['shopname'] ?>
					(<?=$data['lastname'].' '.$data['firstname']?>) <?php echo $data['phone'] ?>
					
				</p>

				<div class="com">
					<?php if($_SESSION['id']){ ?>
					<div class="form-com">
						<div class="input-group">
						  	<input name="com" type="text" class="form-control" placeholder="แสดงความเห็น" aria-describedby="basic-addon2">
						  	<span class="input-group-addon btn-com" id="basic-addon2">แสดงความเห็น</span>
						</div>
					</div>
					<?php } ?>

					<div id="load-comment"></div>

				</div>

			</div>

		</div>


		<!-- Related Products -->

		<div class="row">

			<div class="col-md-12">

				<h5>สินค้าแนะนำ</h5>

			</div>

		</div>

		<!-- Product Listing -->

		<div class="row">
			
			<?php
			$sql = "SELECT * FROM tbl_product INNER JOIN tbl_product_image ON tbl_product.p_id = tbl_product_image.p_id where tbl_product.category = '".$data['category']."' AND tbl_product.p_id <> '" . $_GET['p_id'] . "' GROUP BY tbl_product.p_id ";
			$result = mysqli_query($con, $sql);
			while($data = mysqli_fetch_array($result)){
			?>

			<div class="col-md-3">

				<div class="product-listing">
					<p class="title"><a href="detail_product.php?p_id=<?=$data['p_id']?>"><?=$data['p_name']?></a></p>

					<a href="detail_product.php?p_id=<?=$data['p_id']?>">
						<img class="image" src="../seller/img/<?= $data['img_name'] ?>" alt="รูปสินค้า" />
					</a>

					<p class="price">
						฿   <?=$data['p_price']?>
						<a class="btn btn-addcart btn-primary" href="process-shopping.php?action=add_cart&p_id=<?=$data['p_id']?>"><span class="entypo cart"></span></a>
						<a class="btn btn-view btn-grey" href="detail_product.php?p_id=<?=$data['p_id']?>"><span class="entypo search"></span></a>
					</p>
				</div>
			</div>

			<?php } ?>

		</div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
    <script>
		$('.show-img').click(function(){
			var src = $(this).attr('data-src');
			$('.product-image').attr('src',src);
		});

		$('.btn-com').on('click', function(){
			var com = $('input[name=com]');
			if(com.val() == ''){
				com.focus();
				return false;
			}
			$.ajax({
				url: "ajax/process.php?action=insert_comment",
				data: {com:com.val(),p_id:"<?=$_GET['p_id']?>"},
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if(data.status == true){
						load_comment();
						com.val('');
					}
				}
			});
		});

		function load_comment(){
			$.ajax({
				url: "ajax/process.php?action=get_comment",
				data: {p_id:"<?=$_GET['p_id']?>"},
				type: 'GET',
				success: function(data){
					$('#load-comment').html(data);
				}
			});
		}

		function load_comment_reply(com_id){
			$.ajax({
				url: "ajax/process.php?action=get_comment_reply",
				data: {com_id:com_id},
				type: 'POST',
				success: function(data){
					$('#result-comment-reply-'+com_id).html(data);
				}
			});
		}

		function delete_comment(com_id){
			$.ajax({
				url: "ajax/process.php?action=delete_comment",
				data: {com_id:com_id},
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if(data.status == true){
						load_comment();
					}
				}
			});
		}

		$(function(){
			load_comment();
		});

	</script>
</body>
</html>