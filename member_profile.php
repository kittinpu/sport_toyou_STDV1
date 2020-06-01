<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php
        include 'head.php';
        include 'session_member.php';
        $order_status = 0;
        $order_status2 = 1;

        $member_id = $_SESSION['member_id'];

        $sql_od = "SELECT COUNT(*) AS COUNTOD FROM sp_order_dt WHERE member_id='$member_id' AND order_status='$order_status'";
        $result_od = mysqli_query($dbcon, $sql_od);
        $count_od = mysqli_fetch_assoc($result_od);

        $sql_od2 = "SELECT COUNT(*) AS COUNTOD2 FROM sp_order_dt WHERE member_id='$member_id' AND order_status='$order_status2'";
        $result_od2 = mysqli_query($dbcon, $sql_od2);
        $count_od2 = mysqli_fetch_assoc($result_od2);
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
                    <div class="col-md-3">
                        <?php include 'leftbar_profile.php'; ?>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $count_od['COUNTOD']; ?></h2>
                                    <div class="text-muted m-t-5">สินค้าที่ค้างชำระ</div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $count_od2['COUNTOD2']; ?></h2>
                                    <div class="text-muted m-t-5">สินค้าที่ชำระเงินแล้ว</div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-light mb-3" style="box-shadow: 0px 0px 10px 0px;">
                                    <div class="card-header" align="center">ขั้นตอนการทำรายการสินค้า</div>
                                    <div class="card-body">
                                        <ol>
                                            <li>กรุณาเลือกคลิกที่ข้อมูลสินค้า</li>
                                            <li>คลิกที่ปุ่มสั่งซื้อสินค้า</li>
                                            <li>แก้ไขหรือเปลี่ยนจำนวนสินค้าตามที่ต้องการ</li>
                                            <li>ทำการยืนยันการสั่งซื้อสินค้า</li>
                                            <li>ทำการอัพโหลดไฟล์รูปสลิปเงินเพื่อทำการชำระเงิน</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

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