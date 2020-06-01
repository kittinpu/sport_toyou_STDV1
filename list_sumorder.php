<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php 
            include 'head.php'; 
            $sql_dp = "SELECT
Sum(sp_orderdetail_dt.product_qty) AS ordersum,
sp_product_dt.product_topic,
Sum(sp_orderdetail_dt.total) AS sumtotal,
sp_orderdetail_dt.product_id,
sp_order_dt.order_datesave,
sp_product_dt.product_price,
sp_producttype_dt.producttype_detail,
sp_product_dt.product_filename,
sp_product_dt.product_quantity,
sp_product_dt.product_detail
FROM
sp_order_dt
INNER JOIN sp_orderdetail_dt ON sp_order_dt.order_id = sp_orderdetail_dt.order_id
INNER JOIN sp_product_dt ON sp_orderdetail_dt.product_id = sp_product_dt.product_id
INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id
GROUP BY
sp_orderdetail_dt.product_id,
sp_product_dt.product_topic";
            $res_dp = mysqli_query($dbcon, $sql_dp);
            
            $sql_pd = "SELECT COUNT(*) AS COUNTPD FROM sp_product_dt";
            $result_pd = mysqli_query($dbcon, $sql_pd);
            $count_pd = mysqli_fetch_assoc($result_pd);
        ?>
        <!-- End Your Style CSS -->
    </head>
    <body>
        <main>
            <!-- Navbar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php include 'header.php'; ?>
                        <?php include 'navbar.php'; ?>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php include 'list_product.php'; ?>
                        <?php include 'last_product.php'; ?>
                        <?php include 'contact_sidebar.php'; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="head-text"><b>รายการสินค้า</b></p>
                                        </div>
                                    </div>
                                    <hr class="line" style="margin-top: 0px;">
                                    <hr>
                                    <table id="myTable" class="display" border='1'>
                                        <thead>
                                            <tr>
                                                <th data-field="p_id" data-align="center" data-sortable="true">รหัสสินค้า</th>
                                                <th data-field="pfile" data-align="center" data-sortable="true">รูปภาพ</th>
                                                <th data-field="pdata" data-sortable="true">ข้อมูลการซื้อขาย</th>
                                                <th data-field="status" data-sortable="true">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row_dp = mysqli_fetch_assoc($res_dp)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <font color="blue">#<?php echo $row_dp['product_id']; ?></font><br>
                                                    </td>
                                                    <td>
                                                        <a href="img_product/<?php echo $row_dp['product_filename']; ?>" class="image-popup" title="รูปภาพรหัส : <?php echo $row_pd['product_id']; ?>">
                                                            <img width="80px" height="80px" src="img_product/<?php echo $row_dp['product_filename']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <font color="black">ชื่อสินค้า : </font><font color="green"><?php echo $row_dp['product_topic']; ?></font><br>
                                                        <font color="black">จำนวนที่ขายไป : </font><font color="green"><?php echo $row_dp['ordersum']; ?> ชิ้น</font><br>
                                                        <font color="black">ราคารวม : </font><font color="blue"><?php echo $row_dp['sumtotal']; ?> บาท</font>
                                                    </td>
                                                    <td>
                                                        <font color="black">วันที่ทำรายการ : </font><span style="color:blue;"><?php echo $row_dp['order_datesave']; ?></span><br>
                                                        <font color="black">ราคาต่อชิ้น : </font> <span style="color:red;"><?php echo $row_dp['product_price']; ?></span> <span style="color:blue;">บาท</span><br>
                                                        <font color="black">ประเภทสินค้า : </font><font color="blue"><?php echo $row_dp['producttype_detail']; ?></font><br>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div style="margin: 35px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include 'footer.php'; ?>

        <!-- Your JavaScript -->
        <?php include 'script.php'; ?>
        <!-- End Your JavaScript -->
    </body>
</html>