<!doctype html>
<html lang="vi">

    <head>
        <?php require_once("./application/views/components/head-content.php"); ?>
        <?php
        if ($data["page"] == "ReadText") {
            $link = "/application/views/tools/ReadText.css";
            echo PHP_EOL . '<link rel="stylesheet" type="text/css" href="' . $link . '" />' . PHP_EOL;
        }
        ?>
    </head>

    <body>
        <?php require_once("./application/views/components/header-content.php"); ?>

        <!-- -->
        <!-- Begin page content -->
        <main role="main" class="container-fluid">
            <div class="row">

                <!--
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-2 order-sm-2 order-md-2 order-lg-1 bd-sidebar">
                <?php //require_once("./application/views/components/tools-aside-left.php"); ?>
                </div>
                -->

                <div class="col-12 col-sm-12 col-md-12 col-lg-9 order-1 order-sm-1 order-md-1 order-lg-2">
                    <?php require_once('./application/views/tools/' . $data["page"] . '.php'); ?>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-3 order-sm-3 order-md-3 order-lg-3">
                    <?php require_once("./application/views/components/tools-aside-right.php"); ?>
                </div>

            </div>            
        </main>        

        <!-- -->
        <?php require_once("./application/views/components/footer-content.php"); ?>        
    </body>

    <?php require_once("./application/views/components/javascript.php"); ?>
    <?php
    if ($data["page"] == "ReadText") {
        $date = date("YmdHis");
        $link = "/application/views/tools/ReadText.js";
        if ($GLOBALS['environment'] == 'live') {
            $link = "/application/views/tools/ReadText.js";
        }
        echo PHP_EOL . '<script type="text/javascript" src="' . $link . '?t=' . $date . '"></script>';
    }
    ?>

</html>