<?php

require '../connection/condb.php';

$producttype_id = $_GET['id'];

$sql = "DELETE FROM sp_producttype_dt WHERE producttype_id='$producttype_id'";
$result = mysqli_query($dbcon, $sql);

if ($result) {
    header("Location: list_producttype.php");
} else {
    echo 'เกิดข้อผิดพลาด'. mysqli_error($dbcon);
}

mysqli_close($dbcon);

