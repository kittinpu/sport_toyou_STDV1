<?php

require '../connection/condb.php';

$member_id = $_GET['id'];

$sql_select = "SELECT member_photo FROM sp_member_dt WHERE member_id='$member_id'";
$res_select = mysqli_query($dbcon, $sql_select);
$member_photo = mysqli_fetch_row($res_select);
$photoname = $member_photo[0];

unlink("../img_member/" . $photoname);

$sql = "DELETE FROM sp_member_dt WHERE member_id='$member_id'";
$result = mysqli_query($dbcon, $sql);

if ($result) {
    header("Location: list_admin.php");
} else {
    echo 'เกิดข้อผิดพลาด'. mysqli_error($dbcon);
}

mysqli_close($dbcon);

