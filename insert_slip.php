<?php

include 'connection/condb.php';

$order_id = $_POST['order_id'];
$order_slip = $_POST['order_slip'];
$order_status = $_POST['order_status'];

$image_ext = pathinfo(basename($_FILES['order_slip']['name']), PATHINFO_EXTENSION);
$slip_image_name = 'slip_' . uniqid() . "." . $image_ext;
$image_path = "img_slip/";
$image_upload_path = $image_path . $slip_image_name;
$success = move_uploaded_file($_FILES['order_slip']['tmp_name'], $image_upload_path);
if ($success == FALSE) {
    echo "ไม่สามารถ upload รูปภาพได้";
    exit();
}

$sql = "UPDATE sp_order_dt SET order_status='1',order_slip='$slip_image_name' WHERE order_id='$order_id'";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    header("Location: member_profile.php");
} else {
    echo 'เกิดข้อผิดพลาดขึ้น' . mysqli_error($dbcon);
}