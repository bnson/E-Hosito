<?php

class AboutPrivacy extends Controller {

    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;

    public function __construct() {
        // Model
        //$this->book = $this->model("BookModel");
        //$this->genres = $this->model("GenresModel");

        //== Page
        $this->pageTitle = "Privacy";
        $this->pageDescription = "Chuyên trang sách học online, mang đến cho bạn trải nghiệm đọc sách trực tuyến đa giác gian...";
        $this->pageKeywords = "Sách giáo khoa, sách tiếng anh, sách tin học, sách lập trình, sách kỹ thuật, sách nói, sách chuyên đề, ...";
    }

    public function load() {
        // View
        $this->view("MasterLayout", [
            "page" => "AboutPrivacy",
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords
        ]);
    }

}
