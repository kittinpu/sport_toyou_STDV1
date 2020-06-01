<?php
    $product_status = 0;
    $sql = "SELECT * FROM sp_product_dt INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id WHERE product_status='$product_status' ORDER BY product_id ASC";
    $res_pd = mysqli_query($dbcon, $sql);
?>
<p class="head-text">สินค้าทั้งหมด</p>
<hr class="line">
<div class="row">
    <?php while ($row_pd = mysqli_fetch_assoc($res_pd)) {
        ?>
        <div class="col-md-6">
            <div class="product">
                <img src="img_product/<?php echo $row_pd['product_filename']; ?>" class="img-thumbnail">
                <b><font color="black"><?php echo $row_pd['product_topic']; ?></font> <font color="blue">ราคา</font> <font color="red"><?php echo $row_pd['product_price']; ?></font> <font color="blue">บาท</font></b>
					<br>
				<?php
					if($row_pd['product_qty'] == 0) { ?>
						<button type="button" class="btn btn-sm btn-danger btn-block" disabled><i class="fas fa-exclamation-circle"></i> สินค้าหมดกรุณาเลือกสินค้าอื่น</button><?php
					} else { ?>
						<a href="product_detail.php?id=<?php echo $row_pd['product_id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-search"></i> ข้อมูล</a>
						<a href="cart_member.php?product_id=<?php echo $row_pd['product_id']; ?>&act=add" class="btn btn-info btn-sm"><i class="fas fa-cart-plus"></i> สั่งซื้อ</a> <?php
					}
				?>
            </div>
        </div>
    <?php } ?>
</div>