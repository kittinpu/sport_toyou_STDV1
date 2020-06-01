<!doctype html>
<html lang="en">
    <head>
        <!-- Your Style CSS -->
        <?php include 'head.php'; ?>
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
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="login">
                            <img src="assets/my-image/user2.png" class="bg-login">
                            <form action="login.php" method="POST">
                                <center>
                                    <h4><i style="margin-right: 5px;margin-top: 5px;" class="fas fa-lock"></i> Authentication System</h4>
                                </center>
                                <hr style="width: 90%;">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="username" required id="inlineFormInputGroup" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <input name="password" required type="password" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">remember me</label>
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
                                </center>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </main>

        <?php include 'footer.php'; ?>

        <!-- Your JavaScript -->
        <?php include 'script.php'; ?>
        <!-- End Your JavaScript -->
    </body>
</html>