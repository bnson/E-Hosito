<link rel="stylesheet" type="text/css" href="/public/framework/bootstrap-4.5.3/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/bootstrap-4.5.3/css/docs.min.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/fontawesome-free-5.8.2-web/css/all.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/Rpg-Awesome/css/rpg-awesome.css" />
<link rel="stylesheet" type="text/css" href="/public/framework/split-js-1.5.9/splitjs.css" />
<link rel="stylesheet" href="/public/framework/alertify.js-0.3.11/themes/alertify.core.css" />
<link rel="stylesheet" href="/public/framework/alertify.js-0.3.11/themes/alertify.bootstrap.css" />
<link rel="stylesheet" href="/public/framework/highlight/styles/default.css">
<link rel="stylesheet" href="/public/framework/highlight/styles/a11y-dark.css">

<!-- LOAD CSS OF E-HOSITO -->
<?php
require_once(dirname(__FILE__) . '/../../config/Prepend.php');

//-- $data get from controllers --
loadCss($data);

//== FUNCTIONS ==
function loadCss($data) {
    $controllerUsedCoreCss = ["home", "book", "tool", "game", "about", "aboutprivacy", "abouttermsofservice"];
    $urlCoreCss = "/public/css/core/general." . $GLOBALS['environment'] . ".css";
    $urlpluginGeneralCss = "";
    $urlPluginPageCss = "";
    
    //echo $urlCoreCss;
    if (in_array(strtolower($data["controllerName"]), $controllerUsedCoreCss)) {
        processUrl($urlCoreCss);
    }
    
    if ($data["controllerName"] && $data["page"]) {
        $urlpluginGeneralCss = "/public/css/" . $data["controllerName"] . "/general." . $GLOBALS['environment'] . ".css";
        $urlPluginPageCss = "/public/css/" . $data["controllerName"] . "/" . $data["page"] . "." . $GLOBALS['environment'] . ".css";

        processUrl($urlpluginGeneralCss);
        processUrl($urlPluginPageCss);
    }    
    
}


?>