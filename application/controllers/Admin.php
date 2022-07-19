<?php

class Admin extends Controller {

    public $controllerName;
    
    public $layout;

    public $page;
    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;

    public function __construct() {
        $this->controllerName = "admin";
        
        //== LAYOUT ==
        $this->layout = "AdminLayout";

        //== PAGE ==
        $this->page = "Dashboard";
        $this->pageTitle = "Dashboard";
        $this->pageDescription = "Chuyên trang sách học online, mang đến cho bạn trải nghiệm đọc sách trực tuyến đa giác gian...";
        $this->pageKeywords = "Sách giáo khoa, sách tiếng anh, sách tin học, sách lập trình, sách kỹ thuật, sách nói, sách chuyên đề, ...";

        //== MODEL ==
        $this->book = $this->model("BookModel");

    }

    public function load($page = null, $bookId = null, $bookChapterId = null, $bookChapterContentsNumericalOrderLast = 1) {
        $data = null;
        
        if (isset($page) && !empty($page)) {
            $this->page = $page;
            $this->pageTitle = $page;
            $this->pageDescription = $page;
        }

        //== DATA DEFAULT FOR ADMIN PAGE ==
        $data = [
            "controllerName" => $this->controllerName,
            "page" => $this->page,
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords
        ];

        //== DATA DETAILS ==
        if ($page == "BookManagement") {
            $data["books"] = $this->book->getAll();
        } 
        
        if ($page == "BookChapterManagement") {
            if (isset($bookId) && !empty($bookId)) {
                $data["books"] = $this->book->getById($bookId);
                $data["bookChapters"] = $this->book->getChapters($bookId);
            }
        } 
        
        if ($page == "BookChapterContentInsert") {
            if (isset($bookId) && !empty($bookId) && isset($bookChapterId) && !empty($bookChapterId) && isset($bookChapterContentsNumericalOrderLast) && !empty($bookChapterContentsNumericalOrderLast)) {
                //echo "Book ID: " . $bookId . " - " . "Book Chapter ID: " . $bookChapterId;
                $data["bookId"] = $bookId;
                $data["bookChapterId"] = $bookChapterId;
                $data["bookChapterContentsNumericalOrderLast"] = $bookChapterContentsNumericalOrderLast;
            }
        }

        $this->view($this->layout, $data);
        
    }

}
