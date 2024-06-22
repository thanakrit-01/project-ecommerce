<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../config/condb.php'); ?>
    <?php include('inc/css.php');?>
</head>
<body>
    <div class="container">
        <?php include('inc/header.php');?>

        <div class="row">
            <?php
            $type = $_GET['type'];
            $sql = "SELECT * FROM tbl_product where category = '".$type."'";
            if($_GET['q'] != ''){
                $sql .= " AND p_name LIKE '%".$_GET['q']."%' ";
            }
            $result = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($result)) {

                $sql2 = "SELECT * FROM tbl_product_image where p_id='" . $data['p_id'] . "'";
                $result2 = mysqli_query($con, $sql2);
                $data2 = mysqli_fetch_array($result2);

            ?>

                <div class="col-md-3 col-md-3">
                    <div class="product-listing">
                        <p class="title"><a href="detail_product.php?p_id=<?php echo $data3['p_id'] ?>">
                            <?php echo $data['p_name']; ?>
                        </a></p>

                        <a href="detail_product.php?p_id=<?php echo $data['p_id'] ?>">
                            <img class="image" src="../seller/img/<?= $data2['img_name'] ?>?v=<?=time()?>" alt="รูปภาพ" />
                        </a>

                        <h4><?php echo $data['p_price']; ?> บาท</h4>
                        <a class="btn btn-addcart btn-primary" href="process-shopping.php?action=add_cart&p_id=<?=$data['p_id']?>"><span class="entypo cart"></span></a>
                        <a class="btn btn-view btn-grey" href="detail_product.php?p_id=<?php echo $data['p_id'] ?>"><span class="entypo search"></span></a>
                    </div>

                </div>

            <?php } ?>

        </div>

        <?php include('footer.php');?>
    </div>

    <?php include('inc/js.php');?>
</body>
</html>
