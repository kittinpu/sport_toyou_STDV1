<?php

require '../connection/condb.php';

$titlename_id = $_POST['titlename_id'];
$titlename_detail = $_POST['titlename_detail'];

//insert_data
$sql = "UPDATE sp_titlename_dt SET titlename_detail='$titlename_detail',titlename_datesave=NOW() WHERE titlename_id='$titlename_id'";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: list_titlename.php");
} else {
    echo 'เกิดข้อผิดพลาด'. mysqli_error($dbcon);
}



