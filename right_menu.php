<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">
        <i class="fas fa-bars"></i> <span style="margin-left: 10px;">เมนูลัด</span>
    </a>
    <a href="index.php" class="list-group-item list-group-item-action">
        <i class="fas fa-home"></i> <span style="margin-left: 10px;">หน้าหลัก</span>
    </a>
    <a href="search_product.php" class="list-group-item list-group-item-action">
        <i class="fas fa-search"></i> <span style="margin-left: 10px;">ค้นหาสินค้า</span>
    </a>
    <?php
    if (isset($_SESSION['is_member'])) {
        ?>
        <a href="member_profile.php" class="list-group-item list-group-item-action">
            <i class="fas fa-user"></i> <span style="margin-left: 10px;">โปรไฟล์สมาชิก</span>
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action">
            <i class="fas fa-sign-out-alt"></i> <span style="margin-left: 10px;">ออกจากระบบ</span>
        </a>
        <?php
    } else {
        ?>
        <a href="frm_register.php" class="list-group-item list-group-item-action">
            <i class="fas fa-user-plus"></i> <span style="margin-left: 10px;">สมัครสมาชิก</span>
        </a>
        <a href="frm_login.php" class="list-group-item list-group-item-action">
            <i class="fas fa-user-lock"></i> <span style="margin-left: 10px;">เข้าสู่ระบบ</span>
        </a>
        <?php
    }
    ?>
</div>
<br>
<a href="http://track.thailandpost.co.th/tracking/default.aspx" target="_blank"><img src="assets/my-image/ems.png" width="256px" height="150px"></a>
<br><br>
