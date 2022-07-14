<?php


class Book extends Controller {

    public $controllerName;
    
    public $layout;
    
    public $page;
    public $pageTitle;
    public $pageDescription;
    public $pageKeywords;
    
    public $book;
    public $genres;
    
    public $showAsideLeftBookChapters;
    
    public $utilityString;

    public function __construct() {
        $this->controllerName = "Book";
        
        //== LAYOUT ==
        $this->layout = "MasterLayout";
                
        //== PAGE == 
        $this->pageTitle = "Book";
        $this->pageDescription = "Chuyên trang sách học online, mang đến cho bạn trải nghiệm đọc sách trực tuyến đa giác gian...";
        $this->pageKeywords = "Sách giáo khoa, sách tiếng anh, sách tin học, sách lập trình, sách kỹ thuật, sách nói, sách chuyên đề, ...";
        
        //== MODEL ==
        $this->book = $this->model("BookModel");
        $this->genres = $this->model("GenresModel");

        //== OPTION ==
        $this->showAsideLeftBookChapters = TRUE;
        $this->utilityString = new UtilityString();
    }

    public function load() {
        header('Location: ' . $GLOBALS['root_link']); 
    }
    
    public function loadBookDetail($bookId) {
        $booksData = $this->book->getById($bookId);
        $idData = $booksData[0]['id'];
        $authorData = $booksData[0]['author'];

        $this->pageTitle = $this->utilityString->processPageTitle($booksData[0]['name']);
        $this->pageDescription = $this->utilityString->processPageDescription($booksData[0]['description']);
        $this->pageKeywords = $this->utilityString->processPageKeywords($booksData[0]['genres']);
        
        $genresData = json_decode($booksData[0]['genres'], TRUE);
        $genresDataLimit = 4;
        
        $booksSameAuthor = $this->book->getByAuthor($authorData);
        $booksSameGenres = $this->book->getByGenres($genresData[0], $genresDataLimit);
        
        $bookChapters = $this->book->getChapters($idData);
        
        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "page" => "BookDetail",
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords,
            "books" => $booksData,
            "genres" => $genresData,
            "booksSameAuthor" => $booksSameAuthor,
            "booksSameGenres" => $booksSameGenres,
            "bookChapters" => $bookChapters,
            "menuGenres" => $this->genres->getAll()
        ]);
    }

    public function loadBookContent($bookId, $bookChapterId, $bookContentId) {
        $bookDetail = $this->book->getById($bookId);
        $bookChapters = $this->book->getChapters($bookId);
        
        $bookChapterName = $this->book->getChapterNameById($bookChapterId, $bookId)[0]["name"];
        $bookContent = $this->book->getContent($bookId, $bookChapterId, $bookContentId)[0];

        $this->pageTitle = $this->utilityString->processPageTitle($bookDetail[0]['name'] . ' ★ ' . $bookChapterName . ' ★ ' . $bookContent['subject']);
        $this->pageDescription = $this->utilityString->processPageDescription($bookContent['content']);
        
        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "page" => "BookContent",
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords,
            "menuGenres" => $this->genres->getAll(),
            "book" => $bookDetail,
            "bookChapterName" => $bookChapterName,
            "bookChapters" => $bookChapters,
            "bookContent" => $bookContent,
            "showAsideLeftBookChapters" => $this->showAsideLeftBookChapters
        ]);
    }    
    
    public function filterBookByGenre($genre = null) {
        $this->pageTitle = "Sách Mới";
        $this->pageDescription = "E-Hosito là một thư viện online, nơi mà học sinh, sinh viên, thầy cô giáo, và các nhân viên, công nhân, nông dân,... có thể sử dụng nó để phục vụ cho việc học tập, nghiêm cứu và giảng dạy.";
        $limit = 0;
        
        if (isset($genre) && !empty($genre)) {
            $this->pageTitle = $genre;
        }
        
        $books = $this->book->getByGenres($genre, $limit);

        $this->view($this->layout, [
            "controllerName" => $this->controllerName,
            "page" => "Filter",
            "pageTitle" => $this->pageTitle,
            "pageDescription" => $this->pageDescription,
            "pageKeywords" => $this->pageKeywords,
            "books" => $books,
            "menuGenres" => $this->genres->getAll()
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
