<!-- BOOTSTRAP CORE JAVASCRIPT -->
<!-- PLACED AT THE END OF THE DOCUMENT SO THE PAGES LOAD FASTER -->
<!-- <script type="text/javascript" src="/public/framework/bootstrap-4.5.3/js/bootstrap.min.js"></script> --> 
<script type="text/javascript" src="/public/framework/bootstrap-4.5.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/public/framework/alertify.js-0.3.11/alertify.min.js"></script>

<?php
require_once(dirname(__FILE__) . '/../../config/Prepend.php');

//-- $data get from controllers --
load($data);

//== FUNCTIONS ==
function load($data) {
    $urlMasterCoreJs = "/public/js/core.dev.js";
    $urlGeneralJs = "";

    //-- Load JavaScript by page --
    if ($data["controllerName"] && $data["page"]) {
        $urlPageJs = "/public/js/" . $data["controllerName"] . "/" . $data["page"] . ".dev.js";
        $urlGeneralJs = "/public/js/" . $data["controllerName"] . "/general.dev.js";
        
        processUrl($urlPageJs);
    }

    if (!processUrl($urlGeneralJs)) {
        processUrl($urlMasterCoreJs);
    }
    
}

function processUrl($url) {
    if ($url) {
        $today = date("YmdHis");

        if ($GLOBALS['environment'] == 'live') {
            $today = date("Ymd");
            $url = str_last_replace_1('.dev.js', '.min.js', $url);
        }

        $urlFull = $GLOBALS['root_link'] . $url;
        //echo $urlFull;
        
        if (url_file_exists_1($urlFull)) {
            echo PHP_EOL . '<script type="text/javascript" src="' . $url . '?t=' . $today . '"></script>';
            return true;
        }
        
    }
    return false;
}

?>
