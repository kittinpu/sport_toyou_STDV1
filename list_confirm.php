<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php
        include 'head.php';
        include 'session_member.php';
        $member_id = $_SESSION['member_id'];
        $order_status = 1;
        $sql_pdd = "SELECT
Count(sp_orderdetail_dt.detail_id) AS sumproduct,
sp_member_dt.member_username,
sp_member_dt.member_fullname,
sp_member_dt.member_email,
sp_member_dt.member_tel,
sp_member_dt.member_address,
sp_member_dt.member_photo,
sp_order_dt.order_id,
sp_order_dt.order_datesave,
Sum(sp_orderdetail_dt.total) AS sumtotal,
sp_member_dt.member_id,
sp_titlename_dt.titlename_detail
FROM
sp_order_dt
INNER JOIN sp_orderdetail_dt ON sp_orderdetail_dt.order_id = sp_order_dt.order_id
INNER JOIN sp_member_dt ON sp_order_dt.member_id = sp_member_dt.member_id
INNER JOIN sp_titlename_dt ON sp_member_dt.titlename_id = sp_titlename_dt.titlename_id
WHERE sp_member_dt.member_id='$member_id' AND sp_order_dt.order_status='$order_status'
GROUP BY
sp_member_dt.member_username,
sp_member_dt.member_password,
sp_member_dt.member_fullname,
sp_member_dt.member_email,
sp_member_dt.member_tel,
sp_member_dt.member_address,
sp_member_dt.member_photo,
sp_order_dt.order_id,
sp_order_dt.order_datesave";
        $res_pdd = mysqli_query($dbcon, $sql_pdd);
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
                    <input type="button" value="Print" class="btn btn-praimry" onclick="print();">
                        <table id="myTable" class="display"  border="1">
                            <thead>
                                <tr>
                                    <th align="center">รหัสซื้อ</th>
                                    <th align="center">ข้อมูลผู้สั่งซื้อ</th>
                                    <th align="center">ข้อมูลการสั่งซื้อ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row_pdd = mysqli_fetch_assoc($res_pdd)) {
                                    ?>
                                    <tr>
                                        <td align="center">
                                            <font color="blue">#<?php echo $row_pdd['order_id']; ?><br></font>
                                        </td>
                                        <td>
                                            <font color="blue">username</font> : <font color="green"><?php echo $row_pdd['member_username']; ?></font> <font color="blue">เบอร์ติดต่อ</font> : <font color="green"><?php echo $row_pdd['member_tel']; ?></font><br>
                                            <font color="blue">ชื่อจริง-นามสกุล</font> : <font color="green"><?php echo $row_pdd['titlename_detail']; ?> <?php echo $row_pdd['member_fullname']; ?></font><br>
                                            <font color="blue">ที่อยู่จัดส่ง</font> : <font color="green"><?php echo $row_pdd['member_address']; ?></font><br>
                                            <font color="blue">ที่อยู่อีเมลล์</font> : <font color="green"><?php echo $row_pdd['member_email']; ?></font><br>
                                        </td>
                                        <td>
                                            <font color="blue">ทำรายการเมื่อ</font> : <font color="green"><?php echo $row_pdd['order_datesave']; ?></font><br>
                                            <font color="blue">ราคารวมสุทธิ</font> : <font color="red"><?php echo $row_pdd['sumtotal']; ?></font> <font color="blue">บาท</font><br>
                                            <font color="blue">สถานะรายการ</font> : <font color="green">ชำระเงินแล้ว</font>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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