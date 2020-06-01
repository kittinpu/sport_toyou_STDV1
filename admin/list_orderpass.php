<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'head.php';
        $order_status = 1;
        $sql = "SELECT
Count(sp_orderdetail_dt.detail_id) AS sumproduct,
sp_member_dt.member_username,
sp_member_dt.member_fullname,
sp_member_dt.member_email,
sp_member_dt.member_tel,
sp_member_dt.member_address,
sp_member_dt.member_photo,
sp_order_dt.order_id,
sp_order_dt.order_datesave,
sp_order_dt.order_slip,
Sum(sp_orderdetail_dt.total) AS sumtotal,
sp_member_dt.member_id,
sp_titlename_dt.titlename_detail
FROM
sp_order_dt
INNER JOIN sp_orderdetail_dt ON sp_orderdetail_dt.order_id = sp_order_dt.order_id
INNER JOIN sp_member_dt ON sp_order_dt.member_id = sp_member_dt.member_id
INNER JOIN sp_titlename_dt ON sp_member_dt.titlename_id = sp_titlename_dt.titlename_id
WHERE sp_order_dt.order_status='$order_status'
GROUP BY
sp_member_dt.member_username,
sp_member_dt.member_password,
sp_member_dt.member_fullname,
sp_member_dt.member_email,
sp_member_dt.member_tel,
sp_member_dt.member_address,
sp_member_dt.member_photo,
sp_order_dt.order_id,
sp_order_dt.order_datesave ORDER BY sp_order_dt.order_id DESC";
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
                                            <h4 class="m-t-0 header-title"><b>รายการข้อมูลการสั่งซื้อที่ค้างชำระเงิน  <input type="button" value="Print" class="btn btn-praimry" onclick="print();"></b></h4>
                                        </div>
                                    </div>
                                    <hr>
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
                                                <th data-field="p_id" data-align="center" data-sortable="true">รหัสการสั่งซื้อ</th>
                                                <th data-field="pfile" data-align="center" data-sortable="true">สลิปเงิน</th>
                                                <th data-field="pdata" data-sortable="true">ข้อมูลผู้สั่งซื้อ</th>
                                                <th data-field="status" data-sortable="true">ข้อมูลการสั่งซื้อ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row_pd = mysqli_fetch_assoc($res_pd)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <font color="blue">#<?php echo $row_pd['order_id']; ?><br></font>
                                                    </td>
                                                    <td>
                                                        <a href="../img_slip/<?php echo $row_pd['order_slip']; ?>" class="image-popup" title="รูปภาพรหัส : <?php echo $row_pd['order_id']; ?>">
                                                            <img width="70px" height="70px" src="../img_slip/<?php echo $row_pd['order_slip']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <font color="blue">username</font> : <font color="green"><?php echo $row_pd['member_username']; ?></font> <font color="blue">เบอร์ติดต่อ</font> : <font color="green"><?php echo $row_pd['member_tel']; ?></font><br>
                                                        <font color="blue">ชื่อจริง-นามสกุล</font> : <font color="green"><?php echo $row_pd['titlename_detail']; ?> <?php echo $row_pd['member_fullname']; ?></font><br>
                                                        <font color="blue">ที่อยู่จัดส่ง</font> : <font color="green"><?php echo $row_pd['member_address']; ?></font><br>
                                                        <font color="blue">ที่อยู่อีเมลล์</font> : <font color="green"><?php echo $row_pd['member_email']; ?></font><br>
                                                    </td>
                                                    <td>
                                                        <font color="blue">ทำรายการเมื่อ</font> : <font color="green"><?php echo $row_pd['order_datesave']; ?></font><br>
                                                        <font color="blue">ราคารวมสุทธิ</font> : <font color="red"><?php echo $row_pd['sumtotal']; ?></font> <font color="blue">บาท</font><br>
                                                        <font color="blue">สถานะการทำรายการ</font> : <font color="green">ชำระเงินแล้ว</font>
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