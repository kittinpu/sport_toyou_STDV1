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
                    <div class="col-md-4">
                        <?php include 'list_product.php'; ?>
                        <?php include 'last_product.php'; ?>
                        <?php include 'contact_sidebar.php'; ?>
                    </div>
                    <div class="col-md-5">
                        <?php include 'all_product.php'; ?>
                    </div>
                    <div class="col-md-3">
                        <?php include 'right_menu.php'; ?>
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