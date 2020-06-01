<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">เมนูหลัก</li>

                <li class="has_sub">
                    <a href="index.php" class="waves-effect"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i> <span class="label label-pink pull-right">5</span><span> ระบบจัดการ</span></a>
                    <ul class="list-unstyled">
                        <li><a href="list_member.php">ผู้ใช้งานทั่วไป</a></li>
                        <li><a href="list_titlename.php">คำนำหน้า</a></li>
                        <li><a href="list_admin.php">ผู้ดูแลระบบ</a></li>
                        <li><a href="list_product.php">สินค้า</a></li>
                        <li><a href="list_producttype.php">ประเภทสินค้า</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="list_orderpass.php" class="waves-effect"><i class="typcn typcn-clipboard"></i><span class="label label-pink pull-right"><?php echo $count_od2['COUNTOD2']; ?></span><span> รายการชำระเงิน</span></a>
                </li>

                <li class="has_sub">
                    <a href="list_order.php" class="waves-effect"><i class="typcn typcn-clipboard"></i><span class="label label-pink pull-right"><?php echo $count_od['COUNTOD']; ?></span><span> รายการสั่งซื้อ</span></a>
                </li>

                <li class="text-muted menu-title">ระบบรายงาน</li>

                <li class="has_sub">
                    <a href="chart_orders.php" class="waves-effect"><i class="icon-chart"></i><span> รายงานยอดขาย</a>
                </li>

                <li class="has_sub">
                    <a href="chart_product.php" class="waves-effect"><i class="icon-pie-chart"></i><span> รายงานสินค้า</a>
                </li>

                <li class="has_sub">
                    <a href="chart_qrt.php" class="waves-effect"><i class="icon-chart"></i><span> รายงานการรับชมสินค้า</a>
                </li>

                <li class="text-muted menu-title">สำหรับ Admin</li>

                <li class="has_sub">
                    <a href="frm_update_profile.php" class="waves-effect"><i class="icon-user"></i><span> ข้อมูลส่วนตัว</a>
                </li>

                <li class="has_sub">
                    <a href="logout.php" class="waves-effect"><i class="icon-logout"></i><span> Logout</a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>