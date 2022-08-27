
<?php
require_once(dirname(__FILE__) . '/../../config/Prepend.php');

//-- $data get from controllers --
loadJs($data);

//== FUNCTIONS ==
function loadJs($data) {
    $controllerUsedCoreJs = ["home", "book", "about", "authenticate"];

    $urlCoreJs = "/public/js/core/general." . $GLOBALS['environment'] . ".js";

    $urlpluginGeneralJs = "";
    $urlPluginPageJs = "";

    //-- Load JavaScript by page --
    if (in_array(strtolower($data["controllerName"]), $controllerUsedCoreJs)) {
        processUrl($urlCoreJs);
    }
    
    if ($data["controllerName"] && $data["pageObj"]->getName()) {
        $urlpluginGeneralJs = "/public/js/" . $data["controllerName"] . "/general." . $GLOBALS['environment'] . ".js";
        $urlPluginPageJs = "/public/js/" . $data["controllerName"] . "/" . $data["pageObj"]->getName() . "." . $GLOBALS['environment'] . ".js";

        processUrl($urlpluginGeneralJs);
        processUrl($urlPluginPageJs);
    }  
    
}

?>
