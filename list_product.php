<?php
    $sql_ct = "SELECT
Count(sp_product_dt.product_id) AS countbytype,
sp_producttype_dt.producttype_detail,sp_producttype_dt.producttype_id
FROM
sp_product_dt
INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id
GROUP BY
sp_producttype_dt.producttype_detail";
    $res_ct = mysqli_query($dbcon, $sql_ct);
?>
<p class="head-text">หมวดหมู่สินค้า</p>
<hr class="line">
<ul class="list-group">
    <?php while ($row_ct = mysqli_fetch_assoc($res_ct)){ ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="producttype.php?id=<?php echo $row_ct['producttype_id']; ?>"><?php echo $row_ct['producttype_detail']; ?></a>
        <span class="badge badge-primary badge-pill"><?php echo $row_ct['countbytype']; ?></span>
    </li>
    <?php } ?>
</ul>
<br>