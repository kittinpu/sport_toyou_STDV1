<?php

require '../connection/condb.php';

$titlename_id = $_GET['id'];

$sql = "DELETE FROM sp_titlename_dt WHERE titlename_id='$titlename_id'";
$result = mysqli_query($dbcon, $sql);

if ($result) {
    header("Location: list_titlename.php");
} else {
    echo 'เกิดข้อผิดพลาด'. mysqli_error($dbcon);
}

mysqli_close($dbcon);

