<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php
        include 'head.php';
        include 'session_member.php';
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
                        <?php
                            error_reporting(error_reporting() & !E_NOTICE);
                        ?>
                        <div class="col-md-12">

                            <p><a href="cart_member.php">กลับหน้าตะกร้าสินค้า</a> </p>
                            <table width="1366px" border="1" align="center" class="table">
                                <tr>
                                    <td width="1366px" colspan="5" align="center">
                                        <strong>สั่งซื้อสินค้า</strong></td>
                                </tr>
                                <tr class="success">
                                    <td align="center">ลำดับ</td>
                                    <td align="center">สินค้า</td>
                                    <td align="center">ราคา</td>
                                    <td align="center">จำนวน</td>
                                    <td align="center">รวม/รายการ</td>
                                </tr>
                                <?php
                                require 'connection/condb.php';
                                $total = 0;
                                foreach ($_SESSION['shopping_cart'] as $product_id => $product_qty) {
                                    $sql = "SELECT * FROM sp_product_dt WHERE product_id=$product_id";
                                    $query = mysqli_query($dbcon, $sql);
                                    $row = mysqli_fetch_array($query);
                                    $sum = $row['product_price'] * $product_qty;
                                    $total += $sum;
                                    echo "<tr>";
                                    echo "<td align='center'>";
                                    echo $i += 1;
                                    echo "</td>";
                                    echo "<td>" . $row["product_topic"] . "</td>";
                                    echo "<td align='right'>" . number_format($row['product_price'], 2) . "</td>";
                                    echo "<td align='right'>$product_qty</td>";
                                    echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                                    echo "</tr>";
                                }
                                echo "<tr>";
                                echo "<td  align='right' colspan='4'><b>รวม</b></td>";
                                echo "<td align='right'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                                echo "</tr>";
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin-top: 10px;">
                    <div class="row">
                        <?php
                        $member_id = $_SESSION['member_id'];
                        $sql = "SELECT * FROM sp_member_dt WHERE member_id='$member_id'";
                        $res_mem = mysqli_query($dbcon, $sql);
                        $row_mem = mysqli_fetch_assoc($res_mem);
                        ?>
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <form action="saveorder.php" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12" align="center">
                                        <button type="submit" class="btn btn-primary" id="btn">
                                            ยืนยันสั่งซื้อ </button>
                                    </div>
                                </div>
                            </form>
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