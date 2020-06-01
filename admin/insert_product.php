<?php

require '../connection/condb.php';

$product_topic = $_POST['ptopic'];
$product_detail = $_POST['pdetail'];
$product_price = $_POST['price'];
$producttype_id = $_POST['ptype'];
$product_qty = $_POST['product_qty'];

//upload_images
$image_ext = pathinfo(basename($_FILES['pimg']['name']), PATHINFO_EXTENSION);
$pimg_image_name = 'Product_' . uniqid() . "." . $image_ext;
$image_path = "../img_product/";
$image_upload_path = $image_path . $pimg_image_name;
$success = move_uploaded_file($_FILES['pimg']['tmp_name'], $image_upload_path);
if ($success == FALSE) {
    echo 'ไม่สามารถ upload รูปภาพได้';
    exit();
}

//insert_data
$sql = "INSERT INTO sp_product_dt(product_topic,product_detail,product_price,product_filename,producttype_id,product_qty,product_datesave) VALUES('$product_topic','$product_detail','$product_price','$pimg_image_name','$producttype_id','$product_qty',NOW())";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    if ($product_stat == 0) {
        header("Location: list_product.php");
    }
} else {
    echo 'เกิดข้อผิดพลาด' . mysqli_error($dbcon);
}



