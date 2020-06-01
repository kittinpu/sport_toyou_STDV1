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
                                    รายงานการรับชมสินค้า
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
                                    <div id="container2" style="width:100%; height:400px;"></div>
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
        $sql_qrtpod = "SELECT
Sum(sp_product_dt.product_quantity) AS sumcount,
sp_product_dt.product_topic
FROM
sp_product_dt
GROUP BY
sp_product_dt.product_topic";
        $res_qrtpod = mysqli_query($dbcon, $sql_qrtpod);
        $podqrt_name = array();
        $countqrtpod = array();
        while ($row_qrtpod = mysqli_fetch_assoc($res_qrtpod)) {
            $podqrt_name[] = $row_qrtpod['product_topic'];
            $countqrtpod[] = $row_qrtpod['sumcount'];
        }
        ?>

        <script>
            $(function () {
                var myChart = Highcharts.chart('container2', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'รายการการรับชมสินค้า'
                    },
                    xAxis: {
                        categories: [<?php echo "'" . implode("','", $podqrt_name) . "'"; ?>]
                    },
                    yAxis: {
                        title: {
                            text: 'การรับชมสินค้า(จำนวน)'
                        }
                    },
                    series: [{
                            name: 'การรับชมสินค้า(จำนวน)',
                            data: [<?php echo implode(",", $countqrtpod); ?>]
                        }]
                });
            });
        </script>
    </body>
</html>