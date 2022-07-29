<!-- BOOTSTRAP CORE JAVASCRIPT -->
<!-- PLACED AT THE END OF THE DOCUMENT SO THE PAGES LOAD FASTER -->
<!-- <script type="text/javascript" src="/public/framework/bootstrap-4.5.3/js/bootstrap.min.js"></script> --> 
<script type="text/javascript" src="/public/framework/bootstrap-4.5.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/public/framework/alertify.js-0.3.11/alertify.min.js"></script>

<?php
require_once(dirname(__FILE__) . '/../../config/Prepend.php');

//-- $data get from controllers --
loadJs($data);

//== FUNCTIONS ==
function loadJs($data) {
    $controllerUsedCoreJs = ["home", "book", "about"];

    $urlCoreJs = "/public/js/core/general." . $GLOBALS['environment'] . ".js";

    $urlpluginGeneralJs = "";
    $urlPluginPageJs = "";

    //-- Load JavaScript by page --
    if (in_array(strtolower($data["controllerName"]), $controllerUsedCoreJs)) {
        processUrl($urlCoreJs);
    }
    
    if ($data["controllerName"] && $data["page"]) {
        $urlpluginGeneralJs = "/public/js/" . $data["controllerName"] . "/general." . $GLOBALS['environment'] . ".js";
        $urlPluginPageJs = "/public/js/" . $data["controllerName"] . "/" . $data["page"] . "." . $GLOBALS['environment'] . ".js";

        processUrl($urlpluginGeneralJs);
        processUrl($urlPluginPageJs);
    }  
    
}

?>
