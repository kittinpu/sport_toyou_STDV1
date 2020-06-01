<?php

require '../connection/condb.php';

$member_username = $_POST['username'];
$member_password = $_POST['password'];
$member_fullname = $_POST['fullname'];
$member_email = $_POST['email'];
$member_tel = $_POST['tel'];
$member_address = $_POST['address'];
$member_status = 1;
$titlename_id = $_POST['titlename'];

//upload_images
$image_ext = pathinfo(basename($_FILES['photo']['name']), PATHINFO_EXTENSION);
$photo_image_name = 'Member_' . uniqid() . "." . $image_ext;
$image_path = "../img_member/";
$image_upload_path = $image_path . $photo_image_name;
$success = move_uploaded_file($_FILES['photo']['tmp_name'], $image_upload_path);
if ($success == FALSE) {
    echo 'ไม่สามารถ upload รูปภาพได้';
    exit();
}

//insert_data
$sql = "INSERT INTO sp_member_dt(member_username,member_password,member_fullname,member_email,member_tel,member_address,member_status,titlename_id,member_photo,member_datesave) VALUES ('$member_username','$member_password','$member_fullname','$member_email','$member_tel','$member_address','$member_status','$titlename_id','$photo_image_name',NOW())";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: list_admin.php");
} else {
    echo 'เกิดข้อผิดพลาด' . mysqli_error($dbcon);
}



