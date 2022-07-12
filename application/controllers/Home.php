<?php

class Home extends Controller {
    
    public $controllerName;
    
    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;
    
    public $book;
    public $genres;

    public function __construct() {
        $this->controllerName = "Home";
        
        
        $this->layout = "ToolLayout";
        
        //== PAGE ==
        $this->pageTitle = "Home";
        $this->pageDescription = "Chuyên trang sách học online, mang đến cho bạn trải nghiệm đọc sách trực tuyến đa giác gian...";
        $this->pageKeywords = "Sách giáo khoa, sách tiếng anh, sách tin học, sách lập trình, sách kỹ thuật, sách nói, sách chuyên đề, ...";
        
        //== MODEL ==
        $this->book = $this->model("BookModel");
        $this->genres = $this->model("GenresModel");
        
    }

    public function load() {
        // View
        $this->view("MasterLayout", [
            "controllerName" => $this->controllerName,
            "page" => "Home",
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords,
            "books" => $this->book->getAll(8),
            "booksByGenresSgk" => $this->book->getByGenres("SGK", 8),
            "menuGenres" => $this->genres->getAll()
        ]);
    }

}
