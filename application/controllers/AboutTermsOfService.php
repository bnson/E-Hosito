<?php

class AboutTermsOfService extends Controller {

    public $controllerName;
    
    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;

    public function __construct() {
        $this->controllerName = "AboutTermsOfService";
        
        //== MODEL ==
        //$this->book = $this->model("BookModel");
        //$this->genres = $this->model("GenresModel");

        //== PAGE ==
        $this->pageTitle = "Terms Of Service";
        $this->pageDescription = "Chuyên trang sách học online, mang đến cho bạn trải nghiệm đọc sách trực tuyến đa giác gian...";
        $this->pageKeywords = "Sách giáo khoa, sách tiếng anh, sách tin học, sách lập trình, sách kỹ thuật, sách nói, sách chuyên đề, ...";
        
    }

    public function load() {
        $this->view("MasterLayout", [
            "controllerName" => $this->controllerName,
            "page" => "AboutTermsOfService",
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords
        ]);
    }

}
