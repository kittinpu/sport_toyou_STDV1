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
                                            เพิ่มข้อมูลผู้ใช้งาน
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
                                                        <form class="form-horizontal" role="form" action="insert_member.php" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Username</label>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">Password</label>
                                                                <div class="col-10">
                                                                    <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label" for="example-email">ที่อยู่ E-mail</label>
                                                                <div class="col-10">
                                                                    <input type="email" id="example-email" name="email" required class="form-control" placeholder="example@domain.com">
                                                                    <span class="help-block"><small>กรุณาป้อนที่อยู่อีเมลล์ให้ถูกต้องเผื่อมีการส่งข้อมูลไป</small></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">คำนำหน้าชื่อ</label>
                                                                <div class="col-10">
                                                                    <select class="form-control" name="titlename">
                                                                        <option value="">--กรุณาเลือกคำนำหน้าชื่อ--</option>
                                                                        <?php
                                                                            $sql_titlename = "SELECT * FROM sp_titlename_dt";
                                                                            $res_titlename = mysqli_query($dbcon, $sql_titlename);
                                                                            while ($row_titlename = mysqli_fetch_assoc($res_titlename)){
                                                                                echo '<option value="'.$row_titlename['titlename_id'].'">'.$row_titlename['titlename_detail'].'</option>';
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">ชื่อจริง-นามสกุล</label>
                                                                <div class="col-10">
                                                                    <input name="fullname" required type="text" class="form-control" placeholder="FirstName LastName">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">ที่อยู่จัดส่งสินค้า</label>
                                                                <div class="col-10">
                                                                    <textarea class="form-control" rows="5" name="address" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">รูปภาพประจำตัว</label>
                                                                <div class="col-10">
                                                                    <input type="file" name="photo" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-2 col-form-label">เบอร์โทรติดต่อ</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" type="text" name="tel" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    
                                                                </div>
                                                                <div class="col-10">
                                                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                                                    <a href="list_member.php" class="btn btn-secondary">ย้อนกลับ</a>
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