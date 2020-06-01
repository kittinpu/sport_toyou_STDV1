<?php

require '../connection/condb.php';

$producttype_detail = $_POST['producttype_detail'];

//insert_data
$sql = "INSERT INTO sp_producttype_dt(producttype_detail,producttype_datesave) VALUES ('$producttype_detail',NOW())";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: list_producttype.php");
} else {
    echo 'เกิดข้อผิดพลาด'. mysqli_error($dbcon);
}



