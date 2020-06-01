<?php

require '../connection/condb.php';

$member_id = $_POST['member_id'];
$member_username = $_POST['username'];
$member_password = $_POST['password'];
$member_fullname = $_POST['fullname'];
$member_email = $_POST['email'];
$member_tel = $_POST['tel'];
$member_address = $_POST['address'];
$titlename_id = $_POST['titlename'];

if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
    //delete old image
    $sql_select = "SELECT member_photo FROM sp_member_dt WHERE member_id='$member_id'";
    $result_image = mysqli_query($dbcon, $sql_select);
    $row_image = mysqli_fetch_assoc($result_image);
    $image_old = $row_image['member_photo'];
    unlink("../img_member/".$image_old);
    //upload_images
    $image_ext = pathinfo(basename($_FILES['photo']['name']), PATHINFO_EXTENSION);
    $photo_image_name = 'Member_' . uniqid() . "." . $image_ext;
    $image_path = "../img_member/";
    $image_upload_path = $image_path . $photo_image_name;
    $success = move_uploaded_file($_FILES['photo']['tmp_name'], $image_upload_path);
    $sql_image = "UPDATE sp_member_dt SET member_photo='$photo_image_name' WHERE member_id='$member_id'";
    mysqli_query($dbcon, $sql_image);
    
    if ($success == FALSE) {
        echo 'ไม่สามารถ upload รูปภาพได้';
        exit();
    }
}

//update_data
$sql = "UPDATE sp_member_dt SET member_username='$member_username',member_password='$member_password',member_fullname='$member_fullname',member_email='$member_email',member_tel='$member_tel',member_address='$member_address',titlename_id='$titlename_id',member_datesave=NOW() WHERE member_id='$member_id'";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: frm_update_profile.php");
} else {
    echo 'เกิดข้อผิดพลาด' . mysqli_error($dbcon);
}



