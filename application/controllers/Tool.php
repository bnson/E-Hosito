<?php

class Tool extends Controller {

    public $layout;
    
    public $page;
    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;

    public function __construct() {
        $this->layout = "ToolLayout";

        //== Page        
        $this->page = "Index";
        $this->pageTitle = "Tool";
        $this->pageDescription = "Chuyên trang sách học online, mang đến cho bạn trải nghiệm đọc sách trực tuyến đa giác gian...";
        $this->pageKeywords = "Sách giáo khoa, sách tiếng anh, sách tin học, sách lập trình, sách kỹ thuật, sách nói, sách chuyên đề, ...";
    }

    public function load($page = null) {
        if (isset($page) && !empty($page)) {
            $this->page = $page;
            $this->pageTitle = $page;
            $this->pageDescription = $page;
        }
        
        echo("<script>console.log('PHP: " . $this->page . "');</script>");

        $this->view($this->layout, [
            "page" => $this->page,
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords,
        ]);
        
    }

}
