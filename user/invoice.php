<?php 

include('../config/condb.php');
$or_id = $_GET['or_id'];
$sql2 = "SELECT * FROM tbl_order 
INNER JOIN user ON user.id = tbl_order.id 
WHERE or_id = $or_id ";

$result2 = mysqli_query($con, $sql2);
$data2 = mysqli_fetch_array($result2);
?>
<br>
<br>
<br>

<h3 style="text-align:center">ใบแจ้งหนี้</h3>
<h3 style="text-align:center">เลขที่ใบแจ้งหนี้  <?php echo $or_id; ?></h3>
<h3 style="text-align:center">ชื่อลูกค้า</h3>
<h3 style="text-align:center"><?php echo $data2['firstname']; ?>  <?php echo $data2['lastname']; ?></h3>
                <table border="1" id="ooo" class="table table-bordered" style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวนที่สั่ง</th>
                            <th>ราคา</th>
                            <th>ราคารวม</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php

                       
                        $sql = "SELECT * FROM tbl_orderdetail 
                        INNER JOIN tbl_product ON tbl_product.p_id = tbl_orderdetail.p_id 
                        WHERE or_id = $or_id  ";

                        $result = mysqli_query($con, $sql);
                        $A = '1';
                        $total = 0;
                        while ($data = mysqli_fetch_array($result)) {
                            $total += $data['total_price'];

                            ?>

                            <tr>
                                <td style="text-align:center" width="1%"><?php echo $A; ?></td>
                                <td style="text-align:center" width="1%"><?php echo $data['p_name']; ?></td>
                                <td style="text-align:center" width="1%"><?php echo $data['qty']; ?></td>
                                <td style="text-align:center" width="1%"><?php echo number_format($data['price'],2); ?></td>
                                <td style="text-align:center" width="1%"><?php echo number_format($data['total_price'],2); ?></td>

                            </tr>


                        <?php $A++;
                        } ?>
                        <tr>
                            
                           
                            <td colspan="4" align="right">ค่าจัดส่ง</td>
                            <td style="text-align:center"><?php echo $data2['shipping_price']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">รวม</td>
                            <td style="text-align:center"><?=number_format($total + $data2['shipping_price'],2)?></td>
                        </tr>
                    </tbody>
                </table>

                <script>
                //window.print();
                </script>

