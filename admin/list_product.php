<!DOCTYPE html>
<html>
    <head>
        <?php 
            include 'head.php'; 
            $sql = "SELECT * FROM sp_product_dt INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id WHERE product_status='$product_status' ORDER BY product_id DESC";
            $res_pd = mysqli_query($dbcon, $sql);
        ?>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <?php include 'logo.php'; ?>

                <!-- Button mobile view to collapse sidebar menu -->
                <?php include 'menu_profile.php'; ?>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php'; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <?php include 'page_title.php'; ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="m-t-0 header-title"><b>รายการสินค้า</b></h4>
                                        </div>
                                        <div align="right" class="col-6">
                                            <span class="label label-primary">
                                                มีจำนวนทั้งหมด <?php echo $count_pd['COUNTPD']; ?> รายการ
                                            </span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="button-list">
                                        <a href="frm_product.php" class="btn btn-primary waves-effect waves-light">
                                            <span class="btn-label"><i class="fa fa-cart-plus"></i>
                                            </span>เพิ่มข้อมูล
                                        </a>
                                    </div>
                                    <div style="margin: -55px;"></div>
                                    <table data-toggle="table"
                                           data-search="true"
                                           data-show-toggle="true"
                                           data-show-columns="true"
                                           data-sort-name="id"
                                           data-page-list="[5, 10, 20]"
                                           data-page-size="5"
                                           data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                                        <thead>
                                            <tr>
                                                <th data-field="p_id" data-align="center" data-sortable="true">รหัสสินค้า</th>
                                                <th data-field="pfile" data-align="center" data-sortable="true">รูปภาพ</th>
                                                <th data-field="pdata" data-sortable="true">ข้อมูล</th>
                                                <th data-field="status" data-sortable="true">สถานะสินค้า</th>
                                                <th data-field="tools" data-align="center" data-sortable="true">เครื่องมือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row_pd = mysqli_fetch_assoc($res_pd)) {
                                                ?>
                                                <tr>
                                                    <td><font color="blue">#<?php echo $row_pd['product_id']; ?></font></td>
                                                    <td>
                                                        <a href="../img_product/<?php echo $row_pd['product_filename']; ?>" class="image-popup" title="รูปภาพรหัส : <?php echo $row_pd['product_id']; ?>">
                                                            <img width="80px" height="80px" src="../img_product/<?php echo $row_pd['product_filename']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <font color="black">ชื่อสินค้า : </font><font color="green"><?php echo $row_pd['product_topic']; ?></font><br>
                                                        <font color="black">จำนวนผู้รับชม : </font><font color="green"><?php echo $row_pd['product_quantity']; ?> คน</font><br>
                                                        <font color="black">ราคาสินค้า : </font><font color="blue"><?php echo $row_pd['product_price']; ?> บาท</font>
														<font color="black">จำนวนสินค้า : </font> <font color="blue"><?php echo $row_pd['product_qty']; ?> ชิ้น</font>
                                                    </td>
                                                    <td>
                                                        <font color="black">วันที่ทำรายการ : </font><span class="label label-primary"><?php echo $row_pd['product_datesave']; ?></span><br>
                                                        <font color="black">สถานะสินค้า : </font> <span class="label label-success">สินค้าแนะนำ</span><br>
                                                        <font color="black">ประเภทสินค้า : </font><font color="blue"><?php echo $row_pd['producttype_detail']; ?></font><br>
                                                    </td>
                                                    <td>
                                                        <div style="font-size: 20px;">
                                                            <a href="frm_update_product.php?id=<?php echo $row_pd['product_id']; ?>"><span class="fa fa-pencil-square-o"></span></a>
                                                            <a href="delete_product.php?id=<?php echo $row_pd['product_id']; ?>"><span class="fa fa-trash-o"></span></a>
                                                        </div>
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
                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include 'footer.php'; ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php include 'script.php'; ?>
    </body>
</html>