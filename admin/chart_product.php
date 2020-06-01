<!DOCTYPE html>
<html>

<head>
    <link href="highchart/code/css/highcharts.css" rel="stylesheet" type="text/css" />
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
                                รายงานสินค้าแยกตามประเภทของสินค้า
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-inverse"><i
                                        class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-inverse" class="panel-collapse collapse show">
                            <div class="portlet-body">
                                <div id="container3" style="width:100%; height:400px;"></div>
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
        $sql_type = "SELECT
Count(sp_product_dt.product_id) AS countbytype,
sp_producttype_dt.producttype_detail
FROM
sp_product_dt
INNER JOIN sp_producttype_dt ON sp_product_dt.producttype_id = sp_producttype_dt.producttype_id
GROUP BY
sp_producttype_dt.producttype_detail";
        $res_type = mysqli_query($dbcon, $sql_type);
        $data = array();
        while ($row_type = mysqli_fetch_assoc($res_type)) {
            extract($row_type);
            $data[] = array($row_type['producttype_detail'], intval($row_type['countbytype']));
            $data2 = json_encode($data);
        }
        ?>

    <script type="text/javascript">
    Highcharts.chart('container3', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'รายการสินค้าแยกตามประเภทของสินค้า'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'จำนวนสินค้าในหมวดหมู่',
            data: <?php echo $data2; ?>
        }]
    });
    </script>
</body>

</html>