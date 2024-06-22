
<!DOCTYPE html>
<html>
	<head>

		<title>นาข่า</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="UTF-8" />
		<link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen" />

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet" type="text/css" />
		<link href="assets/css/entypo.css" rel="stylesheet" type="text/css" />

		<!-- Template CSS -->
		<link href="assets/css/686tees.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

	</head>
<body>

<div class="container">

	<!-- Site Top -->

	<div class="row">

		<div class="col-md-12">

			<ul class="top-nav">
				<li><a href="login.php">เข้าสู่ระบบ</a></li>
				<li><a href="choose-register.php">สมัครสมาชิก</a></li>
                <li><a href="registration.php">ลืมรหัสผ่าน</a></li>
                <li><a href="logout.php">ออกจากระบบ</a></li>
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
			        <li><a href="index.php">Homepage</a></li>
			        <li><a href="profile.php">profile</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">หมวดหมู่สินค้า <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="products-1.php">ผักสด</a></li>
			            <li><a href="products-2.php">ผลไม้หอมหวาน</a></li>
			            <li><a href="products-3.php">เนื้อสด</a></li>
						<li><a href="products-4.php">อุปกรณ์</a></li>
						<li><a href="products-5.php">สินค้าแปรรูป</a></li>
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
			      <form class="navbar-form navbar-right clearfix" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default"><span class="entypo search"></span></button>
			      </form>
			    </div>
			  </div>
			</nav>

		</div>

	</div>

	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
