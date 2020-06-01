<!DOCTYPE html>
<html>
    <head>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="portlet">
                                    <div class="portlet-heading bg-purple">
                                        <h3 class="portlet-title">
                                            เพิ่มข้อมูลสินค้า
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
                                                        <form action="insert_product.php" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="inputTopic" class="col-form-label">หัวข้อสินค้า</label>
                                                                <input type="text" class="form-control" name="ptopic" placeholder="Enter Topic" required>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPrice" class="col-form-label">ราคา</label>
                                                                    <input type="number" class="form-control" name="price" placeholder="Enter Price" required>
                                                                </div>
																<div class="form-group col-md-6">
                                                                    <label for="inputQty" class="col-form-label">สต๊อกสินค้า</label>
                                                                    <input type="number" class="form-control" name="product_qty" placeholder="จำนวนชิ้น" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputDetail" class="col-form-label">รายละเอียดสินค้า</label>
                                                                <textarea name="pdetail" id="editor1" rows="10" cols="80" required></textarea>
                                                                <script>
                                                                    // Replace the <textarea id="editor1"> with a CKEditor
                                                                    // instance, using default configuration.
                                                                    CKEDITOR.replace('editor1');
                                                                </script>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputType" class="col-form-label">ประเภทสินค้า</label>
                                                                    <select class="form-control" name="ptype" required>
                                                                        <option value="">--กรุณาเลือกประเภทสินค้า--</option>
                                                                        <?php
                                                                        $sql_producttype = "SELECT * FROM sp_producttype_dt";
                                                                        $res_producttype = mysqli_query($dbcon, $sql_producttype);
                                                                        while ($row_producttype = mysqli_fetch_assoc($res_producttype)) {
                                                                            echo '<option value="' . $row_producttype['producttype_id'] . '">' . $row_producttype['producttype_detail'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputImage" class="col-form-label">รูปภาพสินค้า</label>
                                                                    <input type="file" class="form-control" name="pimg">
                                                                </div>

                                                            </div>
                                                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button> <a href="list_product.php" class="btn btn-secondary">ย้อนกลับ</a>
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