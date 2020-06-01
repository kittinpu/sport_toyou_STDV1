<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'head.php';
        $sql = "SELECT * FROM sp_member_dt INNER JOIN sp_titlename_dt ON sp_member_dt.titlename_id = sp_titlename_dt.titlename_id WHERE member_status='$member_status' ORDER BY member_id DESC";
        $res_member = mysqli_query($dbcon, $sql);
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
                                            <h4 class="m-t-0 header-title"><b>รายการผู้ใช้งาน</b></h4>
                                        </div>
                                        <div align="right" class="col-6">
                                            <span class="label label-primary">
                                                มีจำนวนทั้งหมด <?php echo $count_mb['COUNTMB']; ?> รายการ
                                            </span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="button-list">
                                        <a href="frm_member.php" class="btn btn-primary waves-effect waves-light">
                                            <span class="btn-label"><i class="fa fa-user-plus"></i>
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
                                                <th data-field="member_id" data-align="center" data-sortable="true">ID</th>
                                                <th data-field="photo" data-align="center" data-sortable="true">รูปภาพ</th>
                                                <th data-field="username" data-sortable="true">ข้อมูล</th>
                                                <th data-field="status" data-sortable="true">สถานะผู้ใช้งาน</th>
                                                <th data-field="tools" data-align="center" data-sortable="true">เครื่องมือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row_member = mysqli_fetch_assoc($res_member)) {
                                                ?>
                                                <tr>
                                                    <td><font color="blue">#<?php echo $row_member['member_id']; ?></font></td>
                                                    <td>
                                                        <a href="../img_member/<?php echo $row_member['member_photo']; ?>" class="image-popup" title="รูปภาพรหัส : <?php echo $row_member['member_id']; ?>">
                                                            <img width="70px" height="70px" src="../img_member/<?php echo $row_member['member_photo']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <font color="black">username : </font><font color="green"><?php echo $row_member['member_username']; ?></font><br>
                                                        <font color="black">ชื่อ-นามสกุล : </font><font color="green"><?php echo $row_member['titlename_detail']; ?> <?php echo $row_member['member_fullname']; ?></font><br>
                                                        <font color="black">อีเมลล์ : </font><font color="blue"><?php echo $row_member['member_email']; ?></font>
                                                    </td>
                                                    <td>
                                                        <font color="black">วันที่แก้ไข : </font><span class="label label-primary"><?php echo $row_member['member_datesave']; ?></span><br>
                                                        <font color="black">สิทธิ์ : </font><span class="label label-success">ผู้ใช้งานทั่วไป</span> <span class="label label-success">สั่งซื้อสินค้า</span> <span class="label label-success">จัดการข้อมูลส่วนตัว</span><br>
                                                        <font color="black">ที่อยู่ : </font><font color="blue"><?php echo $row_member['member_address']; ?></font>
                                                        <font color="black">เบอร์ติดต่อ : </font><font color="blue"><?php echo $row_member['member_tel']; ?></font>
                                                    </td>
                                                    <td>
                                                        <div style="font-size: 20px;">
                                                            <a href="frm_update_member.php?id=<?php echo $row_member['member_id']; ?>"><span class="fa fa-pencil-square-o"></span></a>
                                                            <a href="delete_member.php?id=<?php echo $row_member['member_id']; ?>"><span class="fa fa-trash-o"></span></a>
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