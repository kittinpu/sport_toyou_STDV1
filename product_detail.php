<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php
        include 'head.php';
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM sp_product_dt INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id WHERE product_id='$product_id'";
        $res_dp = mysqli_query($dbcon, $sql);
        $row_dp = mysqli_fetch_assoc($res_dp);

        $product_view = $row_dp['product_quantity'];
        $count = $product_view + 1;

        $sql_v = "UPDATE sp_product_dt SET  product_quantity=$count WHERE product_id = $product_id";
        mysqli_query($dbcon, $sql_v);
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
                    <div class="col-md-4">
                        <?php include 'list_product.php'; ?>
                        <?php include 'last_product.php'; ?>
                    </div>
                    <div class="col-md-8">
                        <p class="head-text">รายละเอียดสินค้า รหัส : <?php echo $row_dp['product_id']; ?></p>
                        <hr class="line">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="img_product/<?php echo $row_dp['product_filename']; ?>" width="100%" class="img-thumbnail"><br><br>
                                <img src="img_product/<?php echo $row_dp['product_filename']; ?>" width="100%" class="img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align='center'>
                                            <th colspan="3">ข้อมูลสินค้า</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>รหัสสินค้า</td>
                                            <td colspan="2"><?php echo $row_dp['product_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>หัวข้อสินค้า</td>
                                            <td colspan="2"><?php echo $row_dp['product_topic']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>เนื้อหาสินค้า</td>
                                            <td colspan="2"><?php echo $row_dp['product_detail']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ราคาสินค้า</td>
                                            <td><?php echo $row_dp['product_price']; ?></td>
                                            <td>บาท</td>
                                        </tr>
                                        <tr>
                                            <td>หมวดหมู่สินค้า</td>
                                            <td colspan="2"><?php echo $row_dp['producttype_detail']; ?></td>
                                        </tr>
										<tr>
                                            <td>สินค้าคงเหลือ</td>
                                            <td colspan="2"><?php echo $row_dp['product_qty']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>จำนวนการเข้าชม</td>
                                            <td><?php echo $row_dp['product_quantity']; ?></td>
                                            <td>ครั้ง</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <center>
                                    <b><h4><font color='blue'>สินค้า </font>: <font color='green'><?php echo $row_dp['product_topic']; ?></font> <font color='blue'>ราคา </font>: <font color='red'><?php echo $row_dp['product_price']; ?></font> <font color='blue'>บาท</font></h4></b>
                                    <?php
										if($row_dp['product_qty'] == 0) { ?>
											<button type="button" class="btn btn-lg btn-danger" disabled><i class="fas fa-exclamation-circle"></i> สินค้าหมดกรุณาเลือกสินค้าอื่น</button><?php
										} else { ?>
											<a href="cart_member.php?product_id=<?php echo $row_dp['product_id']; ?>&act=add" class="btn btn-success btn-lg btn-block"><i class="fas fa-cart-plus"></i> หยิบใส่ตะกร้าสินค้า</a> <?php
										}
									?>
                                </center>
                            </div>
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