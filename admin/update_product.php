<?php

require '../connection/condb.php';

$product_id = $_POST['product_id'];
$product_topic = $_POST['ptopic'];
$product_detail = $_POST['pdetail'];
$product_price = $_POST['price'];
$producttype_id = $_POST['ptype'];
$product_qty = $_POST['product_qty'];

if (is_uploaded_file($_FILES['pimg']['tmp_name'])) {
    //delete old image
    $sql_select = "SELECT product_filename FROM sp_product_dt WHERE product_id='$product_id'";
    $result_image = mysqli_query($dbcon, $sql_select);
    $row_image = mysqli_fetch_assoc($result_image);
    $image_old = $row_image['product_filename'];
    unlink("../img_product/".$image_old);
    //upload_images
    $image_ext = pathinfo(basename($_FILES['pimg']['name']), PATHINFO_EXTENSION);
    $pimg_image_name = 'Product_'.uniqid().".".$image_ext;
    $image_path = "../img_product/";
    $image_upload_path = $image_path . $pimg_image_name;
    $success = move_uploaded_file($_FILES['pimg']['tmp_name'], $image_upload_path);

    $sql_image = "UPDATE sp_product_dt SET product_filename='$pimg_image_name' WHERE product_id='$product_id'";
    mysqli_query($dbcon, $sql_image);

    if ($success == FALSE) {
        echo 'ไม่สามารถ upload รูปภาพได้';
        exit();
    }
}

//insert_data
$sql = "UPDATE sp_product_dt SET product_topic='$product_topic',product_detail='$product_detail',product_price='$product_price',producttype_id='$producttype_id',product_qty='$product_qty',product_datesave=NOW() WHERE product_id='$product_id'";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    if ($product_stat == 0) {
        header("Location: list_product.php");
    }
} else {
    echo 'เกิดข้อผิดพลาด' . mysqli_error($dbcon);
}



