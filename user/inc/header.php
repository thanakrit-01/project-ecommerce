<div class="row">

		<div class="col-md-12">

			<ul class="top-nav">
				<?php if(!$_SESSION['id']){ ?>
					<li><a href="login.php">
						<i class="glyphicon glyphicon-user"></i> เข้าสู่ระบบ
					</a></li>
					<li><a href="choose-register.php">
						<i class="glyphicon glyphicon-plus"></i> สมัครสมาชิก
					</a></li>
				<?php }else{ ?>
					<li><a href="javascript:">
						<i class="glyphicon glyphicon-check"></i> เข้าระบบโดย <?=$_SESSION['username']?>
					</a></li>
					<li><a href="profile.php">
						<i class="glyphicon glyphicon-user"></i> ข้อมูลส่วนตัว
					</a></li>
					<li><a href="edit-password.php">
						<i class="glyphicon glyphicon-user"></i> เปลี่ยนรหัสผ่าน
					</a></li>
	                <li><a href="logout.php">
	                	<i class="glyphicon glyphicon-off"></i> ออกจากระบบ
	                </a></li>
            	<?php } ?>
			</ul>

		</div>

	</div>

	<!-- Header -->

	<div class="row">

		<div class="col-md-4 col-sm-4">

			<a class="logo" href="index.php">
				ระบบขายสินค้า
			</a>

		</div>

		<div class="col-md-4 col-sm-5">

			<p class="strapline">
				    <br />
				<span></span>
			</p>

		</div>

		<div class="col-md-4 col-sm-3">

			<div class="row">

				<div class="col-md-6 col-md-offset-6 mini-basket">

					<p class="mini-basket-title"><a href="basket.php"><span class="entypo cart"></span> ตะกร้าสินค้า</a></p>
				</div>

			</div>

		</div>

	</div>

	<!-- Menu -->

	<div class="row">

		<div class="col-md-12">

			<nav class="navbar navbar-default" role="navigation">
			  <div class="container-fluid">

			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>

			    <div class="collapse navbar-collapse" id="navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="index.php">หน้าแรก</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">หมวดหมู่สินค้า <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="products.php?type=ผักสด">ผักสด</a></li>
			            <li><a href="products.php?type=ผลไม้">ผลไม้หอมหวาน</a></li>
			            <li><a href="products.php?type=เนื้อสด">เนื้อสด</a></li>
						<li><a href="products.php?type=อุปกรณ์">อุปกรณ์</a></li>
						<li><a href="products.php?type=สินค้าแปรรูป">สินค้าแปรรูป</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สินค้า <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="">สินค้าขายดี</a></li>
			            <li><a href="">สินค้าโปรโมชั่น</a></li>
			          </ul>
					</li>
					
			        <li><a href="order-list.php">รายการสั่งซื้อ</a></li>
					<li><a href="payment.php">แจ้งชำระเงิน</a></li>

			      </ul>
			      <form method="get" action="?" class="navbar-form navbar-right clearfix" role="search">
			        <div class="form-group">
			        	<input type="hidden" name="type" value="<?=$_GET['type']?>">
			          <input name="q" type="text" class="form-control" placeholder="Search" value="<?=$_GET['q']?>">
			        </div>
			        <button type="submit" class="btn btn-default"><span class="entypo search"></span></button>
			      </form>
			    </div>
			  </div>
			</nav>

		</div>

	</div>