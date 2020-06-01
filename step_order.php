<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php include 'head.php'; ?>
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
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <div class="card border-light mb-3" style="box-shadow: 0px 0px 10px 0px;">
                            <div class="card-header" align="center">ขั้นตอนการทำรายการสินค้า</div>
                            <div class="card-body">
                                <ol>
                                    <li>ทำการสมัครสมาชิก</li>
                                    <li>เข้าสู่ระบบ</li>
                                    <li>คลิกที่ปุ่มสั่งซื้อสินค้า</li>
                                    <li>กรุณาเลือกคลิกที่ข้อมูลสินค้า</li>
                                    <li>คลิกที่ปุ่มสั่งซื้อสินค้า</li>
                                    <li>แก้ไขหรือเปลี่ยนจำนวนสินค้าตามที่ต้องการ</li>
                                    <li>ทำการยืนยันการสั่งซื้อสินค้า</li>
                                    <li>ทำการอัพโหลดไฟล์รูปสลิปเงินเพื่อทำการชำระเงิน</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
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