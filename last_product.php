<?php
$product_status = 0;
$sql = "SELECT * FROM sp_product_dt INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id WHERE product_status='$product_status' ORDER BY product_id DESC LIMIT 5";
$res_pd = mysqli_query($dbcon, $sql);
?>
<p class="head-text">สินค้ามาใหม่</p>
<hr class="line">
<?php while ($row_pd = mysqli_fetch_assoc($res_pd)) {
    ?>
    <div class="task important">
        <div class="row">
            <div class="col-md-2">
                <img src="img_product/<?php echo $row_pd['product_filename']; ?>" width="50px">
            </div>
            <div class="col-md-10">
                <h6>
                    <a href="product_detail.php?id=<?php echo $row_pd['product_id']; ?>"><?php echo $row_pd['product_topic']; ?> หมวดหมู่ที่ <?php echo $row_pd['producttype_detail']; ?></a>
                </h6>
                <div class="tmeta"><font color="#8f8f8f"><i class="fa fa-eye"></i> <?php echo $row_pd['product_quantity']; ?> ครั้ง</font> <span class="badge badge-warning">สินค้าใหม่ New</span> <div class="text-right">ราคา <?php echo $row_pd['product_price']; ?> บาท</div></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<?php } ?>
<br>