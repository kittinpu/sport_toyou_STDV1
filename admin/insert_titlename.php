<?php

require '../connection/condb.php';

$titlename_detail = $_POST['titlename_detail'];

//insert_data
$sql = "INSERT INTO sp_titlename_dt(titlename_detail,titlename_datesave) VALUES ('$titlename_detail',NOW())";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: list_titlename.php");
} else {
    echo 'เกิดข้อผิดพลาด'. mysqli_error($dbcon);
}



