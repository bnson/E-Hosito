<!-- LOAD CSS FRAMEWORK -->
<link rel="stylesheet" type="text/css" href="/public/framework/bootstrap-4.5.3/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/bootstrap-4.5.3/css/docs.min.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/fontawesome-free-5.8.2-web/css/all.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/Rpg-Awesome/css/rpg-awesome.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/split-js-1.5.9/splitjs.css" />
<link rel="stylesheet" href="/public/framework/alertify.js-0.3.11/themes/alertify.core.css" />
<link rel="stylesheet" href="/public/framework/alertify.js-0.3.11/themes/alertify.bootstrap.css" />
<link rel="stylesheet" href="/public/framework/highlight/styles/default.css">
<link rel="stylesheet" href="/public/framework/highlight/styles/a11y-dark.css">

<!-- LOAD CSS GENERAL -->
<link rel="stylesheet" type="text/css" href="/public/css/general.css" />

<!-- LOAD CSS BY PAGE -->
<?php
require_once(dirname(__FILE__) . '/../../config/Prepend.php');

if ($data["controllerName"] && $data["page"]) {
    $date = date("Ymd");
    $dateTime = date("YmdHis");
    $link = "/public/css/" . $data["controllerName"] . "/" . $data["page"] . ".dev.css";
    $linkFull = $GLOBALS['root_link'] . $link;
    //echo $linkFull;

    if (url_file_exists($linkFull)) {
        if ($GLOBALS['environment'] == 'live') {
            $link = rtrim($link, '.dev.js') . '.min.js';
            echo '<link rel="stylesheet" href="' . $link . '?t=' . $date . '" type="text/css" />';
        } else {
            echo '<link rel="stylesheet" href="' . $link . '?t=' . $dateTime . '" type="text/css" />';
        }
    }
}
?>