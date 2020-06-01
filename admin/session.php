<?php

session_start();
if (!isset($_SESSION['is_admin'])) {
    header("Location: ../frm_login.php");
}
require '../connection/condb.php';
$session_member_id = $_SESSION['member_id'];

$qry_member = "SELECT * FROM sp_member_dt WHERE member_id='$session_member_id'";
$result_member = mysqli_query($dbcon, $qry_member);
if ($result_member) {
    $row_member = mysqli_fetch_array($result_member, MYSQLI_ASSOC);
    $s_member_username = $row_member['member_username'];
    $s_member_password = $row_member['member_password'];
    $s_member_fullname = $row_member['member_fullname'];
    $s_member_email = $row_member['member_email'];
    $s_member_tel = $row_member['member_tel'];
    $s_member_address = $row_member['member_address'];
    $s_titlename_id = $row_member['titlename_id'];
    $s_titlename_detail = $row_member['titlename_detail'];
    $s_member_photo = $row_member['member_photo'];
    $s_member_datesave = $row_member['member_datesave'];

    mysqli_free_result($result_member);
}

