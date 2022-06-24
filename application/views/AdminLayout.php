<!doctype html>
<html lang="vi" class="h-100">
    <head>
        <?php require_once("./application/views/components/head-content.php"); ?>
    </head>

    <body class="h-100">
        <?php require_once('./application/views/admin/' . $data["page"] . '.php'); ?>
    </body>

    <?php require_once("./application/views/components/javascript.php"); ?>
</html>


