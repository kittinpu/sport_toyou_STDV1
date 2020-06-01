<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php 
            include 'head.php'; 
            $product_status = 0;
            $sql_dp = "SELECT * FROM sp_product_dt INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id WHERE product_status='$product_status'";
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
                                        <div align="right" class="col-6">
                                            <span class="label label-primary">
                                                มีจำนวนทั้งหมด <?php echo $count_pd['COUNTPD']; ?> รายการ
                                            </span>
                                        </div>
                                    </div>
                                    <hr class="line" style="margin-top: 0px;">
                                    <hr>
                                    <table id="myTable" class="display" border='1'>
                                        <thead>
                                            <tr>
                                                <th data-field="p_id" data-align="center" data-sortable="true">รหัสสินค้า</th>
                                                <th data-field="pfile" data-align="center" data-sortable="true">รูปภาพ</th>
                                                <th data-field="pdata" data-sortable="true">ข้อมูลสินค้า</th>
                                                <th data-field="status" data-sortable="true">สถานะสินค้า</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row_dp = mysqli_fetch_assoc($res_dp)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <font color="blue">#<?php echo $row_dp['product_id']; ?></font><br>
                                                        <a href="product_detail.php?id=<?php echo $row_dp['product_id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-search-plus"></i> รายละเอียด</a>
                                                    </td>
                                                    <td>
                                                        <a href="img_product/<?php echo $row_dp['product_filename']; ?>" class="image-popup" title="รูปภาพรหัส : <?php echo $row_pd['product_id']; ?>">
                                                            <img width="80px" height="80px" src="img_product/<?php echo $row_dp['product_filename']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <font color="black">ชื่อสินค้า : </font><font color="green"><?php echo $row_dp['product_topic']; ?></font><br>
                                                        <font color="black">จำนวนผู้รับชม : </font><font color="green"><?php echo $row_dp['product_quantity']; ?> คน</font><br>
                                                        <font color="black">ราคาสินค้า : </font><font color="blue"><?php echo $row_dp['product_price']; ?> บาท</font>
                                                    </td>
                                                    <td>
                                                        <font color="black">วันที่ทำรายการ : </font><span class="label label-primary"><?php echo $row_dp['product_datesave']; ?></span><br>
                                                        <font color="black">สถานะสินค้า : </font> <span class="label label-success">สินค้าแนะนำ</span><br>
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