<?php

require '../connection/condb.php';

$product_id = $_GET['id'];

$sql_select = "SELECT product_filename FROM sp_product_dt WHERE product_id='$product_id'";
$res_select = mysqli_query($dbcon, $sql_select);
$product_photo = mysqli_fetch_row($res_select);
$photoname = $product_photo[0];

unlink("../img_product/" . $photoname);

$sql = "DELETE FROM sp_product_dt WHERE product_id='$product_id'";
$result = mysqli_query($dbcon, $sql);

if ($result) {
    header("Location: list_product.php");
} else {
    echo 'เกิดข้อผิดพลาด' . mysqli_error($dbcon);
}

mysqli_close($dbcon);

