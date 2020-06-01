<?php
require 'connection/condb.php';
error_reporting( error_reporting() & !E_NOTICE );
    session_start(); 
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
$member_id = $_SESSION['member_id'];
$product_qty = $_POST["product_qty"];
$total = $_POST['total'];
$order_datesave = date("Y-m-d H:i:s");
$order_slip = 0;
$order_status = 0;


//บันทึกการสั่งซื้อลงใน order_detail
mysqli_query($dbcon, "BEGIN");
$sql1 = "INSERT INTO sp_order_dt VALUES (NULL,'$order_status','$member_id','$order_slip','$order_datesave')";

$query1 = mysqli_query($dbcon, $sql1) or die("Error in query: $sql1 " . mysqli_error());

$sql2 = "SELECT MAX(order_id) AS order_id FROM sp_order_dt";
$query2 = mysqli_query($dbcon, $sql2);
$row = mysqli_fetch_array($query2);
$order_id = $row['order_id'];

foreach ($_SESSION['shopping_cart'] AS $product_id => $product_qty) {
    $sql3 = "SELECT * FROM sp_product_dt WHERE product_id=$product_id";
    $query3 = mysqli_query($dbcon, $sql3);
    $row3 = mysqli_fetch_array($query3);
    $total = $row3['product_price'] * $product_qty;
	$count=mysqli_num_rows($query3);


    $sql4 = "INSERT INTO sp_orderdetail_dt VALUES (null,'$order_id','$product_id','$product_qty','$total')";
    $query4 = mysqli_query($dbcon, $sql4);
	
	//ตัดสต๊อก
  for($i=0; $i<$count; $i++){  
  $have =  $row3['product_qty']; 
  $stc = $have - $product_qty;  
  $sql5 = "UPDATE `sp_product_dt` SET `product_qty`=$stc WHERE `product_id`=$product_id ";
  $query9 = mysqli_query($dbcon, $sql5);  
    
    }

}

if ($query1 && $query4) {
    mysqli_query($dbcon, "COMMIT");
    $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
    foreach ($_SESSION['shopping_cart'] as $product_id) {
        unset($_SESSION['shopping_cart']);
    }
} else {
    mysqli_query($dbcon, "ROLLBACK");
    $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
}

mysqli_close($dbcon);
?>

<script type="text/javascript">
    alert("<?php echo $msg; ?>");
    window.location = 'index.php';
</script>