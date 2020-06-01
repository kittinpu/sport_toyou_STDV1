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
                        session_start();
                        $product_id = $_REQUEST['product_id'];
                        $act = $_REQUEST['act'];

                        if ($act == 'add' && !empty($product_id)) {
                            if (!isset($_SESSION['shopping_cart'])) {

                                $_SESSION['shopping_cart'] = array();
                            } else {
                                
                            }
                            if (isset($_SESSION['shopping_cart'][$product_id])) {
                                $_SESSION['shopping_cart'][$product_id] ++;
                            } else {
                                $_SESSION['shopping_cart'][$product_id] = 1;
                            }
                        }

                        if ($act == 'remove' && !empty($product_id)) {  //ยกเลิกการสั่งซื้อ
                            unset($_SESSION['shopping_cart'][$product_id]);
                        }
                        if ($act == 'Cancel-Cart') {
                            unset($_SESSION['shopping_cart']);
                        }
                        if ($act == 'update') {
                            $amount_array = $_POST['amount'];
                            foreach ($amount_array as $product_id => $amount) {
                                $_SESSION['shopping_cart'][$product_id] = $amount;
                            }
                        }
                        ?>
                        <form id="frmcart" name="frmcart" method="post" action="?act=update">
                            <table width="100%" border="0" align="center" class="table table-bordered">
                                <tr>
                                <thead>
                                <td align="center"><strong>ลำดับ</strong></td>
                                <td align="center"><strong>รูป</strong></td>
                                <td align="center"><strong>สินค้า</strong></td>
                                <td align="center"><strong>ราคา</strong></td>
                                <td align="center"><strong>จำนวน</strong></td>
                                <td align="center"><strong>รวม</strong></td>
                                <td align="center"><strong>ลบ</strong></td>
                                </thead>
                                </tr>
                                <?php
                                if (!empty($_SESSION['shopping_cart'])) {
                                    require 'connection/condb.php';
                                    foreach ($_SESSION['shopping_cart'] as $product_id => $product_qty) {
                                        $sql = "SELECT * FROM sp_product_dt WHERE product_id='$product_id'";
                                        $query = mysqli_query($dbcon, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                            $sum = $row['product_price']*$product_qty;
											$productqty = $row['product_qty'];
                                            $total += $sum;
                                            echo "<tr><tbody>";
                                            echo "<td>";
                                            echo $i += 1;
                                            echo ".";
                                            echo "</td>";
                                            echo "<td width='100'>" . "<img src='img_product/$row[product_filename]'  width='50'/>" . "</td>";
                                            echo "<td width='334'>" . " " . $row["product_topic"] . "</td>";
                                            echo "<td width='100' align='right'>" . number_format($row["product_price"], 2) . "</td>";

                                            echo "<td width='57' align='right'>";
                                            echo "<input type='number' name='amount[$product_id]' value='$product_qty' max='$productqty' size='2'/></td>";

                                            echo "<td width='100' align='right'>" . number_format($sum, 2) . "</td>";
                                            echo "<td width='100' align='center'><a href='cart_member.php?product_id=$product_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";

                                            echo "</tr></tbody>";
                                        }
                                    }
                                    echo "<tr>";
                                    echo "<td colspan='5' align='center'>ราคารวมสุทธิ</td>";
                                    echo "<td colspan='2' align='center' >";
                                    echo "<b>";
                                    echo number_format($total, 2);
                                    echo " บาท</b>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <center>
                                <button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
                                <button type="button" name="Submit2"  onclick="window.location = 'confirm_member_cart.php';" class="btn btn-primary"> 
                                    <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>
                                <a href="cart_member.php?act=Cancel-Cart" class="btn btn-danger">ยกเลิกทั้งหมด</a>
                            </center>
                            <br>
                        </form>
                        <p align="center"> <a href="index.php" class="btn btn-primary">กลับไปเลือกสินค้า</a></p>
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