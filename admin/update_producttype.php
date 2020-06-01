<?php

require '../connection/condb.php';

$producttype_id = $_POST['producttype_id'];
$producttype_detail = $_POST['producttype_detail'];

//insert_data
$sql = "UPDATE sp_producttype_dt SET producttype_detail='$producttype_detail',producttype_datesave=NOW() WHERE producttype_id='$producttype_id'";

$result = mysqli_query($dbcon, $sql);

if ($result) {
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: list_producttype.php");
} else {
    echo 'เกิดข้อผิดพลาด' . mysqli_error($dbcon);
}



