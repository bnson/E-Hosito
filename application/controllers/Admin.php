<?php

class Admin extends Controller {

    public $layout;
    
    public $page;
    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;

    public function __construct() {
        //== Layout
        $this->layout = "AdminLayout";

        //== Page
        $this->page = "Index";
        $this->pageTitle = "Admin";
        $this->pageDescription = "Chuyên trang sách học online, mang đến cho bạn trải nghiệm đọc sách trực tuyến đa giác gian...";
        $this->pageKeywords = "Sách giáo khoa, sách tiếng anh, sách tin học, sách lập trình, sách kỹ thuật, sách nói, sách chuyên đề, ...";

        //== Model
        $this->book = $this->model("BookModel");
        //$this->genres = $this->model("GenresModel");        
    }

    public function load($page = null, $bookId = null, $bookChapterId = null, $bookChapterContentsNumericalOrderLast = 1) {
        if (isset($page) && !empty($page)) {
            $this->page = $page;
            $this->pageTitle = $page;
            $this->pageDescription = $page;
        }

        if ($page == "BookManagement") {
            $this->view($this->layout, [
                "page" => $this->page,
                "pageTitle" => $this->pageTitle,
                "pageDescription" => $this->pageDescription,
                "pageKeywords" => $this->pageKeywords,
                "books" => $this->book->getAll()
            ]);
        } elseif ($page == "BookChapterManagement") {
            if (isset($bookId) && !empty($bookId)) {
                $booksData = $this->book->getById($bookId);
                $idData = $booksData[0]['id'];
                $bookChapters = $this->book->getChapters($idData);

                $this->view($this->layout, [
                    "page" => $this->page,
                    "pageTitle" => $this->pageTitle,
                    "pageDescription" => $this->pageDescription,
                    "pageKeywords" => $this->pageKeywords,
                    "books" => $booksData,
                    "bookChapters" => $bookChapters,
                ]);
            }

        } elseif ($page == "BookChapterContentInsert") {
            if (isset($bookId) && !empty($bookId) 
                    && isset($bookChapterId) && !empty($bookChapterId)
                    && isset($bookChapterContentsNumericalOrderLast) && !empty($bookChapterContentsNumericalOrderLast)) {
                //echo "Book ID: " . $bookId . " - " . "Book Chapter ID: " . $bookChapterId;
                $this->view($this->layout, [
                    "page" => $this->page,
                    "pageTitle" => $this->pageTitle,
                    "pageDescription" => $this->pageDescription,
                    "pageKeywords" => $this->pageKeywords,
                    "bookId" => $bookId,
                    "bookChapterId" => $bookChapterId,
                    "bookChapterContentsNumericalOrderLast" => $bookChapterContentsNumericalOrderLast
                ]);                
            }
        }
        else {
            $this->view($this->layout, [
                "page" => $this->page,
                "pageTitle" => $this->pageTitle,
                "pageDescription" => $this->pageDescription,
                "pageKeywords" => $this->pageKeywords
            ]);
        }
    }

}
