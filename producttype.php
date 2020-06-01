<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php
        include 'head.php';
        $producttype_id = $_GET['id'];
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
                    <div class="col-md-5">
                        <?php
                        $product_status = 0;
                        $sql = "SELECT * FROM sp_product_dt INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id WHERE sp_product_dt.producttype_id='$producttype_id' ORDER BY product_id ASC";
                        $res_pd = mysqli_query($dbcon, $sql);
                        $res_pd2 = mysqli_query($dbcon, $sql);
                        $row_ptt = mysqli_fetch_array($res_pd2, MYSQLI_ASSOC);
                        ?>
                        <p class="head-text">สินค้า <?php echo $row_ptt['producttype_detail']; ?> หรือ <a href="index.php">ทั้งหมด</a></p>
                        <hr class="line">
                        <div class="row">
                            <?php while ($row_pd = mysqli_fetch_assoc($res_pd)) {
                                ?>
                                <div class="col-md-4">
                                    <div class="product">
                                        <img src="img_product/<?php echo $row_pd['product_filename']; ?>" class="img-thumbnail">
                                        <b><font color="black"><?php echo $row_pd['product_topic']; ?></font> <font color="blue">ราคา</font> <font color="red"><?php echo $row_pd['product_price']; ?></font> <font color="blue">บาท</font></b>
                                        <a href="product_detail.php?id=<?php echo $row_pd['product_id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-search"></i> ข้อมูล</a>
                                        <a href="cart_member.php?product_id=<?php echo $row_pd['product_id']; ?>&act=add" class="btn btn-info btn-sm"><i class="fas fa-cart-plus"></i> สั่งซื้อ</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php include 'right_menu.php'; ?>
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