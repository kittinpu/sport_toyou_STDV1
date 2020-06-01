<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i> หน้าหลัก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="search_product.php"><i class="fas fa-search"></i> ค้นหาสินค้า</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="list_sumorder.php"><i class="fas fa-database"></i> ยอดสั่งซื้อ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="list_bank.php"><i class="fab fa-cc-visa"></i> การชำระเงิน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="step_order.php"><i class="fas fa-list-ol"></i> คู่มือสมาชิกทั่วไป</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php"><i class="fas fa-phone-square"></i> ติดต่อเรา</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            if (isset($_SESSION['is_member'])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="member_profile.php"><i class="fas fa-user"></i> โปรไฟล์สมาชิกคุณ , <?php echo $_SESSION['member_username']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="frm_register.php"><i class="fas fa-user-plus"></i> Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="frm_login.php"><i class="fas fa-user-lock"></i> Login</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>