<?php

require_once "./application/object/AccountObj.php";
require_once "./application/object/PageObj.php";

class Book extends Controller {

    public $controllerName;
    public $layout;

    public $pageModel;
    public $pageObj;    
    
    public $book;
    public $showAsideLeftBookChapters;
    public $utilityString;

    public function __construct() {
        $this->controllerName = "book";
        
        //== LAYOUT ==
        $this->layout = "MasterLayout";
                
        //== MODEL ==
        $this->pageModel = $this->model("PageModel");
        $this->book = $this->model("BookModel");

        //== OPTION ==
        $this->showAsideLeftBookChapters = TRUE;
        $this->utilityString = new UtilityString();
        
    }

    public function load($pageName = null, $bookId = null, $bookChapterId = null, $bookContentId = null) {
        if (is_null($pageName) || strtolower($pageName) == "book") {
            header('Location: ' . $GLOBALS['root_link']);
        } else {
            $this->loadPageObj($pageName);
            if ($pageName == "BookDetail" && $bookId) {
                $this->loadBookDetail($bookId);
            }
            if ($pageName == "BookContent" && $bookId && $bookChapterId && $bookContentId) {
                $this->loadBookContent($bookId, $bookChapterId, $bookContentId);
            }
        }
    }
    
    public function filter($filterBy = null, $filterValue = null) {
        $limit = 0;
        $this->loadPageObj("Bookshelf");
        
        //== LOAD DEFAULT
        $this->pageObj->setTitle("sách mới");
        $books = $this->book->getAll();
        
        //====
        if ($filterBy) {
            //====
            if (strtolower($filterBy) == "genre") {
                if ($filterValue) {
                    $this->pageObj->setTitle($filterValue);
                } else {
                    $this->pageObj->setTitle("sách mới");
                }
                $books = $this->book->getByGenres($filterValue, $limit);
            }

            if (strtolower($filterBy) == "new") {
                $this->pageObj->setTitle("sách mới");
                $books = $this->book->getAll();
            }

        }
        
        //====
        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj,
            "books" => $books,
            "menuGenres" => $this->book->getAllGenre()
        ]);
    }
    
    private function loadPageObj($pageName) {
        $this->pageObj = $this->pageModel->getPageObjByName($pageName);

        if ($this->pageObj) {
            
        } else {
            http_response_code(404);
            require_once($GLOBALS['page_error']);
            die();
        }
    }

    private function loadBookDetail($bookId) {
        $booksData = $this->book->getById($bookId);
        $idData = $booksData[0]['id'];
        $authorData = $booksData[0]['author'];

        $genresData = json_decode($booksData[0]['genres'], TRUE);
        $genresDataLimit = 4;

        $booksSameAuthor = $this->book->getByAuthor($authorData);
        $booksSameGenres = $this->book->getByGenres($genresData[0], $genresDataLimit);

        $bookChapters = $this->book->getChapters($idData);

        $this->pageObj->setTitle($booksData[0]['name']);
        $this->pageObj->setDescription(substr($booksData[0]['description'], 0, 100));
        $this->pageObj->setKeywords(implode(", ", $genresData));

        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj,
            "books" => $booksData,
            "genres" => $genresData,
            "booksSameAuthor" => $booksSameAuthor,
            "booksSameGenres" => $booksSameGenres,
            "bookChapters" => $bookChapters,
            "menuGenres" => $this->book->getAllGenre()
        ]);
    }

    private function loadBookContent($bookId, $bookChapterId, $bookContentId) {
        $bookDetail = $this->book->getById($bookId);
        $bookChapters = $this->book->getChapters($bookId);
        
        $bookChapterName = $this->book->getChapterNameById($bookChapterId, $bookId)[0]["name"];
        $bookContent = $this->book->getContent($bookId, $bookChapterId, $bookContentId)[0];

        $genresData = json_decode($bookDetail[0]['genres'], TRUE);
        $pageTitle = $this->utilityString->processPageTitle($bookDetail[0]['name'] . ' ★ ' . $bookChapterName . ' ★ ' . $bookContent['subject']);
        $pageDescription = $this->utilityString->processPageDescription($bookContent['content']);
        $this->pageObj->setTitle($pageTitle);
        $this->pageObj->setDescription($pageDescription);
        $this->pageObj->setKeywords(implode(", ", $genresData));        
        
        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj,
            "menuGenres" => $this->book->getAllGenre(),
            "book" => $bookDetail,
            "bookChapterName" => $bookChapterName,
            "bookChapters" => $bookChapters,
            "bookContent" => $bookContent,
            "showAsideLeftBookChapters" => $this->showAsideLeftBookChapters
        ]);
    }    

    public function insertBookChapterContent() {
        if (isset($_POST["btnPublish"])) {
            $bookId = $_POST["bookId"];
            $bookChapterId = $_POST["bookChapterId"];
            $numericalOrder = $_POST["numericalOrder"];
            $subject = $_POST["subject"];
            $content = $_POST["content"];
            $contentRaw = $_POST["contentRaw"];

            echo $this->book->insertBookChapterContent($bookId, $bookChapterId, $numericalOrder, $subject, $content, $contentRaw);
            
//            $this->layout = "AdminLayout";
//            $this->page = "BookChapterContentInsert";
//            $this->pageTitle = "Admin";
//            $this->pageDescription = "Admin";
//            $this->view($this->layout, [
//                "controllerName" => $this->controllerName,
//                "page" => $this->page,
//                "pageTitle" => $this->pageTitle,
//                "pageDescription" => $this->pageDescription,
//                "pageKeywords" => $this->pageKeywords,
//                "bookId" => $bookId,
//                "bookChapterId" => $bookChapterId,                
//            ]);  
            
        }
    }
    
}
