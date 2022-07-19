<?php

class Tool extends Controller {

    public $controllerName;
    
    public $layout;
    public $page;
    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;

    public function __construct() {
        $this->controllerName = "tool";
        
        $this->layout = "ToolLayout";

        //== PAGE ==
        $this->page = "ReadText";
        $this->pageTitle = "Read Text";
        $this->pageDescription = "Công cụ hỗ trợ đọc văn bản.";
        $this->pageKeywords = "đọc văn bản, đọc văn bản trực tuyến, read text, read text online, công cụ trực tuyến, tool online , ...";
    }

    public function load($page = null) {
        if (isset($page) && !empty($page)) {
            $this->page = $page;
            $this->pageTitle = $page;
            $this->pageDescription = $page;
        }

        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "page" => $this->page,
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords,
        ]);
    }

}
