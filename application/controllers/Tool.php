<?php

require_once "./application/object/PageObj.php";

class Tool extends Controller {

    public $controllerName;
    public $layout;

    public $pageModel;
    public $pageObj;

    public function __construct() {
        $this->controllerName = "tool";
        
        //== LAYOUT ==
        $this->layout = "ToolLayout";

        //== MODEL ==
        $this->pageModel = $this->model("PageModel");
        
    }

    public function load($pageName = "ReadText") {
        $this->pageObj = $this->pageModel->getPageObjByName($pageName);
        
        if ($this->pageObj) {
            
        } else {
            http_response_code(404);
            require_once($GLOBALS['page_error']);
            die();
        }

        //== VIEW ==
        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj
        ]);
    }

}
