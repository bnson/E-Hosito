<!doctype html>
<html lang="vi">
    <head>
        <?php require_once("./application/views/component/head-content.php"); ?>
    </head>

    <body>
        <!-- Load header content (title, meta data, css, javascript, ...) -->
        <?php require_once("./application/views/component/header-content.php"); ?>
        
        <!-- Begin page content -->
        <main role="main" class="container-fluid">

            <div class="row">

                <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-2 order-sm-2 order-md-2 order-lg-1 bd-sidebar">
                    <?php require_once("./application/views/component/aside-left.php"); ?>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-1 order-sm-1 order-md-1 order-lg-2">
                    <?php require_once('./application/views/page/' . $data["page"] . '.php'); ?>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-3  order-sm-3 order-md-3order-lg-3">
                    <?php require_once("./application/views/component/aside-right.php"); ?>
                </div>

            </div>

        </main>
        
        <!-- Load footer -->
        <?php require_once("./application/views/component/footer-content.php"); ?>
        
        <!-- Load JavaScript -->
        <?php require_once("./application/views/component/javascript.php"); ?>
        
    </body>

</html>


