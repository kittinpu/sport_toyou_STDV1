<!DOCTYPE html>
<html>
    <head>
        <?php 
            include 'head.php'; 
            $producttype_id = $_GET['id'];

            $sql = "SELECT * FROM sp_producttype_dt WHERE producttype_id='$producttype_id'";
            $res_pt = mysqli_query($dbcon, $sql);
            $row_pt = mysqli_fetch_assoc($res_pt);
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="portlet">
                                    <div class="portlet-heading bg-purple">
                                        <h3 class="portlet-title">
                                            แก้ไขรายละเอียดประเภทสินค้า รหัส <?php echo $producttype_id; ?>
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
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="p-20">
                                                        <form class="form-horizontal" role="form" action="update_producttype.php" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">ชื่อประเภทสินค้า</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" placeholder="Enter Producttype" name="producttype_detail" value="<?php echo $row_pt['producttype_detail']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    
                                                                </div>
                                                                <div class="col-10">
                                                                    <input type="hidden" name="producttype_id" value="<?php echo $row_pt['producttype_id']; ?>">
                                                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                                                    <a href="list_producttype.php" class="btn btn-secondary">ย้อนกลับ</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end row -->

                                        </div>
                                    </div>
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
    </body>
</html>