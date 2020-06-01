<?php

require 'connection/condb.php';

$member_username = mysqli_real_escape_string($dbcon, $_POST['username']);
$member_password = mysqli_real_escape_string($dbcon, $_POST['password']);

$sql = 'SELECT * FROM sp_member_dt WHERE member_username=? AND member_password=?';
$stmt = mysqli_prepare($dbcon, $sql);
mysqli_stmt_bind_param($stmt, "ss", $member_username, $member_password);
mysqli_execute($stmt);
$result_member = mysqli_stmt_get_result($stmt);
if ($result_member->num_rows == 1) {
    session_start();
    $row_member = mysqli_fetch_array($result_member, MYSQLI_ASSOC);
    $_SESSION['member_id'] = $row_member['member_id'];
    if($row_member['member_status'] == 1) {
        $_SESSION['is_admin'] = 1;
        header("Location: admin/index.php");
    } else {
        $_SESSION['is_member'] = 0;
        $_SESSION['member_id'] = $row_member['member_id'];
        $_SESSION['member_username'] = $row_member['member_username'];
        $_SESSION['member_password'] = $row_member['member_password'];
        $_SESSION['member_fullname'] = $row_member['member_fullname'];
        $_SESSION['member_email'] = $row_member['member_email'];
        $_SESSION['member_tel'] = $row_member['member_tel'];
        $_SESSION['member_address'] = $row_member['member_address'];
        $_SESSION['titlename_id'] = $row_member['titlename_id'];
        $_SESSION['member_photo'] = $row_member['member_photo'];
        $_SESSION['member_datesave'] = $row_member['member_datesave'];
        header("Location: index.php");
    }
} else {
    echo 'ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
}
