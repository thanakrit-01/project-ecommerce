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

			<div class="col-md-8 col-md-offset-2">

				<div class="member-box">

					<h2>แก้ไขรหัสผ่าน</h2>

	                <form class="form" action="process.php?action=update_password" method="post" enctype="multipart/form-data" id="">
					

						<p>
							<label for="password">รหัสผ่านเดิม <span class="mand">*</span></label>
							<input type="password" id="" name="new_password" />
	                    </p>
	                    
	                    <p>
							<label for="password">รหัสผ่านใหม่ <span class="mand">*</span></label>
							<input type="password" id="" name="new_password1" />
	                    </p>

	                    <p>
							<label for="password">ยืนยันรหัสผ่านใหม่ <span class="mand">*</span></label>
							<input type="password" id="" name="new_password2" />
	                    </p>
						<p class="buttons">
	                    <button class="btn btn-lg btn-success" type="submit" name="update"> แก้ไข </button>
	                    <button class="btn btn-lg" type="reset" name="reset"> ยกเลิก</button>
						</p>
	                </form>
				</div>
	                    
	        </div>

		</div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>