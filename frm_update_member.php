<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php
        include 'head.php';
        include 'session_member.php';
        $order_status = 0;
        $order_status2 = 1;

        $member_id = $_SESSION['member_id'];

        $sql = "SELECT * FROM sp_member_dt WHERE member_id='$member_id'";
        $res_member = mysqli_query($dbcon, $sql);
        $row_member = mysqli_fetch_assoc($res_member);
        ?>
        <!-- End Your Style CSS -->
    </head>
    <body>
        <main>
            <!-- Navbar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php include 'header.php'; ?>
                        <?php include 'navbar.php'; ?>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-3" style="box-shadow: 0px 0px 10px 0px;">
                            <h6 class="card-header" align="center">รูปประจำตัว</h6>
                            <img style="height: 80%; width: 100%; display: block;" src="img_member/<?php echo $row_member['member_photo']; ?>" alt="Card image">
                        </div>
                        <?php include 'leftbar_profile.php'; ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div align='center' class="alert alert-dismissible alert-light" style="margin: -20px -20px 20px;">
                                    แก้ไขข้อมูลส่วนตัว
                                </div>
                                <form style="margin: -30px -30px;margin-top: 20px; height: 560px;" action="update_member.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">Username : </label></div>
                                            <div class="col-md-6" align='left'><input class="form-control" name="username" value="<?php echo $row_member['member_username']; ?>" required type="text" placeholder="Username" id="inputLarge"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">Password : </label></div>
                                            <div class="col-md-6" align='left'><input class="form-control" name="password" value="<?php echo $row_member['member_password']; ?>" required type="password" placeholder="password" id="inputLarge"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">คำนำหน้าชื่อ : </label></div>
                                            <div class="col-md-6" align='left'>
                                                <div class="form-group">
                                                    <select class="form-control" id="exampleSelect1" name="titlename">
                                                        <?php
                                                        $sql_titlename = "SELECT * FROM sp_titlename_dt";
                                                        $res_titlename = mysqli_query($dbcon, $sql_titlename);
                                                        while ($row_titlename = mysqli_fetch_assoc($res_titlename)) {
                                                            if ($row_titlename['titlename_id'] == $row_member['titlename_id']) {
                                                                echo '<option value="' . $row_titlename['titlename_id'] . '" selected>' . $row_titlename['titlename_detail'] . '</option>';
                                                            } else {
                                                                echo '<option value="' . $row_titlename['titlename_id'] . '">' . $row_titlename['titlename_detail'] . '</option>';
                                                            }
                                                        }
                                                        ?>                                                 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: -15px;"></div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">ชื่อ-นามสกุล : </label></div>
                                            <div class="col-md-8" align='left'><input class="form-control" name="fullname" value="<?php echo $row_member['member_fullname']; ?>" required type="text" placeholder="ชื่อจริง นามสกุล" id="inputLarge"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">E-mail : </label></div>
                                            <div class="col-md-8" align='left'><input class="form-control" name="email" value="<?php echo $row_member['member_email']; ?>" required type="email" placeholder="example@domain.com" id="inputLarge"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">เบอร์โทรศัพท์ : </label></div>
                                            <div class="col-md-6" align='left'><input class="form-control" value="<?php echo $row_member['member_tel']; ?>" name="tel" required type="text" placeholder="0123456789" id="inputLarge"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">รูปประจำตัว : </label></div>
                                            <div class="col-md-6" align='left'>
                                                <input type="file" class="form-control-file" name="photo" id="exampleInputFile" aria-describedby="fileHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3" align='right'><label class="col-form-label" for="inputLarge">ที่อยู่ : </label></div>
                                        <div class="col-md-8" align='left'>
                                            <textarea class="form-control" name="address" required id="exampleTextarea" rows="4"><?php echo $row_member['member_address']; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9" align='left'>
                                            <input type="hidden" name="member_id" value="<?php echo $row_member['member_id']; ?>">
                                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include 'footer.php'; ?>

        <!-- Your JavaScript -->
        <?php include 'script.php'; ?>
        <!-- End Your JavaScript -->
    </body>
</html>