<footer>
    <div class="container">
        <div class="row upper">
            <div class="col-md-4">
                <p style="margin-left: 40px;margin-bottom: -20px;">เมนูหลัก</p> <br>
                <ol>
                    <li><a href="index.php">หน้าหลัก (ข้อมูลสินค้าล่าสุด)</a></li>
                    <li><a href="search_product.php">ค้นหาสินค้า (ค้นหาสินค้าที่ต้องการ)</a></li>
                    <li><a href="list_sumorder.php">ยอดสั่งซื้อ (รายงานการซื้อขาย)</a></li>
                    <?php
                    if (isset($_SESSION['is_member'])) {
                        ?>
                        <li><a href="logout.php">ออกจากระบบ (เพื่อจบรายการ)</a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="frm_register.php">สมัครสมาชิก (สมัครก่อนทำรายการ)</a></li>
                        <li><a href="frm_login.php">เข้าสู่ระบบ (เข้าสู่ระบบเพื่อทำรายการ)</a></li>
                        <?php
                    }
                    ?>
                </ol>
            </div>
            <div class="col-md-4">
                <p style="margin-left: 40px;margin-bottom: -20px;">เครื่องที่ใช้ในการสร้างระบบนี้</p> <br>
                <ul>
                    <li>PHP version 7.2</li>
                    <li>MySQLI เวอร์ชั่นล่าสุด</li>
                    <li>PHPMyAdmin เวอร์ชั่นล่าสุด</li>
                    <li>XAMPP last เวอร์ชั่นล่าสุด</li>
                    <li>Bootstrap version 4.1.3</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p style="margin-left: 40px;margin-bottom: -20px;">ขั้นตอนการทำรายการ</p> <br>
                <ul>
                    <li>สมัครสมาชิกเพื่อเข้าใช้งาน</li>
                    <li>เข้าสู่ระบบเพื่อทำรายการ</li>
                    <li>เลือกสินค้าที่ต้องการหรือค้นหา</li>
                    <li>ทำการสั่งซื้อสินค้าเพื่อสรุปยอด</li>
                    <li>ทำการอัพโหลดสลิปเงิน</li>
                </ul>
            </div>
        </div>
        <div class="row under">
            <div class="col-md-6" align="left">
                Copyright &copy; 2018
            </div>
            <div class="col-md-6" align="right">
                Design By Bootstrap 4.1.3
            </div>
        </div>
    </div>
</footer>