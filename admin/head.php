<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
<meta name="author" content="Coderthemes">
<!--<link rel="shortcut icon" href="assets/images/favicon.ico">-->
<title>Admin Area Dashbaord</title>
<link href="plugins/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="assets/js/modernizr.min.js"></script>
<!--venobox lightbox-->
<link rel="stylesheet" href="plugins/magnific-popup/css/magnific-popup.css"/>

<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
include 'session.php';

$product_status = 0;
$member_status = 0;
$member_status2 = 1;

$order_status = 0;
$order_status2 = 1;

$sql_od = "SELECT COUNT(*) AS COUNTOD FROM sp_order_dt WHERE order_status='$order_status'";
$result_od = mysqli_query($dbcon, $sql_od);
$count_od = mysqli_fetch_assoc($result_od);

$sql_od2 = "SELECT COUNT(*) AS COUNTOD2 FROM sp_order_dt WHERE order_status='$order_status2'";
$result_od2 = mysqli_query($dbcon, $sql_od2);
$count_od2 = mysqli_fetch_assoc($result_od2);

$sql_pd = "SELECT COUNT(*) AS COUNTPD FROM sp_product_dt WHERE product_status='$product_status'";
$result_pd = mysqli_query($dbcon, $sql_pd);
$count_pd = mysqli_fetch_assoc($result_pd);

$sql_mb = "SELECT COUNT(*) AS COUNTMB FROM sp_member_dt WHERE member_status='$member_status'";
$result_mb = mysqli_query($dbcon, $sql_mb);
$count_mb = mysqli_fetch_assoc($result_mb);

$sql_tn = "SELECT COUNT(*) AS COUNTTN FROM sp_titlename_dt";
$result_tn = mysqli_query($dbcon, $sql_tn);
$count_tn = mysqli_fetch_assoc($result_tn);

$sql_ad = "SELECT COUNT(*) AS COUNTAD FROM sp_member_dt WHERE member_status='$member_status2'";
$result_ad = mysqli_query($dbcon, $sql_ad);
$count_ad = mysqli_fetch_assoc($result_ad);

$sql_pt = "SELECT COUNT(*) AS COUNTPT FROM sp_producttype_dt";
$result_pt = mysqli_query($dbcon, $sql_pt);
$count_pt = mysqli_fetch_assoc($result_pt);
?>