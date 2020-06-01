<!DOCTYPE html>
<html>
    <head>
        <link href="highchart/code/css/highcharts.css" rel="stylesheet" type="text/css"/>
        <?php
        include 'head.php';
        ?>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <?php include 'logo.php'; ?>

                <!-- Button mobile view to collapse sidebar menu -->
                <?php include 'menu_profile.php'; ?>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php'; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <?php include 'page_title.php'; ?>
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">
                                    รายงานการสั่งซื้อสินค้า
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-inverse"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-inverse" class="panel-collapse collapse show">
                                <div class="portlet-body">
                                    <div id="container" style="width:100%; height:400px;"></div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include 'footer.php'; ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php include 'script.php'; ?>
        <script src="highchart/code/highcharts.js"></script>
        <script src="highchart/code/highcharts-3d.js"></script>
        <script src="highchart/code/modules/exporting.js"></script>
        <script src="highchart/code/modules/export-data.js"></script>
        <?php
        $sql_pod = "SELECT
Sum(sp_orderdetail_dt.product_qty) AS ordersum,
Sum(sp_orderdetail_dt.total) AS sumtotal,
sp_product_dt.product_topic
FROM
sp_orderdetail_dt
INNER JOIN sp_product_dt ON sp_orderdetail_dt.product_id = sp_product_dt.product_id
GROUP BY
sp_orderdetail_dt.product_id";
        $res_pod = mysqli_query($dbcon, $sql_pod);
        $pod_name = array();
        $countpod = array();
        while ($row_pod = mysqli_fetch_assoc($res_pod)) {
            $pod_name[] = $row_pod['product_topic'];
            $countpod[] = $row_pod['ordersum'];
        }
        ?>

        <script>
            $(function () {
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'รายการยอดการสั่งซื้อสินค้า'
                    },
                    xAxis: {
                        categories: [<?php echo "'" . implode("','", $pod_name) . "'"; ?>]
                    },
                    yAxis: {
                        title: {
                            text: 'ยอดขายสินค้า(จำนวน)'
                        }
                    },
                    series: [{
                            name: 'ยอดขายสินค้า(จำนวน)',
                            data: [<?php echo implode(",", $countpod); ?>]
                        }]
                });
            });
        </script>
    </body>
</html>