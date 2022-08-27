<?php

class BookModel extends Db {

    public function getAll($limit = 0) {
        $sql = "SELECT * FROM book ORDER BY id DESC";
        if ($limit > 0) {
            $sql = "SELECT * FROM book ORDER BY id DESC LIMIT " . $limit;
        }
        return $this->runQuery($sql);
    }

    public function getAllChapterName($bookId) {
        $sql = "SELECT name FROM book_chapter WHERE book_id = " . $bookId . " ORDER BY numerical_order, id";
        return $this->runQuery($sql);
    }

    public function getChapterNameById($bookChapterId, $bookId) {
        $sql = "SELECT name FROM book_chapter WHERE id = " . $bookChapterId . " AND book_id = " . $bookId . " ORDER BY numerical_order, id LIMIT 1";
        return $this->runQuery($sql);
    } 
    
    
    public function getChapterContentsIdFirst($bookId, $bookChapterId) {
        $sql = "SELECT id FROM book_chapter_content WHERE book_id = " . $bookId . " AND book_chapter_id = " . $bookChapterId . " ORDER BY numerical_order, id LIMIT 1";
        return $this->runQuery($sql);
    }    
    
    public function getChapterContents($bookId, $bookChapterId) {
        $sql = "SELECT * FROM book_chapter_content WHERE book_id = " . $bookId . " AND book_chapter_id = " . $bookChapterId . " ORDER BY numerical_order, id";
        return $this->runQuery($sql);
    }   

    public function getContent($bookId, $bookChapterId, $bookContentId) {
        $sql = "SELECT * FROM book_chapter_content WHERE book_id = " . $bookId . " AND book_chapter_id = " . $bookChapterId . " AND id = " . $bookContentId . " ORDER BY id LIMIT 1";
        return $this->runQuery($sql);
    }
    
    public function getChapters($bookId) {
        $sql = "SELECT * FROM book_chapter WHERE book_id = " . $bookId . " ORDER BY numerical_order, id";
        return $this->runQuery($sql);
    }
    
    public function getChapterById($bookId, $bookChapterId) {
        $sql = "SELECT * FROM book_chapter WHERE book_id = " . $bookId . " AND book_chapter_id = " . $bookChapterId . " ORDER BY numerical_order, id";
        return $this->runQuery($sql);
    }    

    public function getById($id) {
        $sql = "SELECT * FROM book where id = " . $id . " ORDER BY id LIMIT 1";
        return $this->runQuery($sql);
    }

    public function getByAuthor($author) {
        $sql = "SELECT * FROM book where LOWER(author) = LOWER('" . $author . "') ORDER BY id LIMIT 4";
        return $this->runQuery($sql);
    }
    
    public function getByGenres($genres, $limit) {
        $sql = "SELECT * FROM book ORDER BY id DESC";
        if (!is_null($genres)) {
            $sql = "SELECT * FROM book where LOWER(genres) LIKE LOWER('%" . $genres . "%') ORDER BY id DESC";
        } 

        if ($limit > 0) {
            $sql = $sql. " LIMIT " . $limit;
        }
        
        return $this->runQuery($sql);
    }

    public function insertBookChapterContent($bookId, $bookChapterId, $numericalOrder, $subject, $content, $contentRaw) {
        $result = false;
        $con = $this->connect();

        $bookId = mysqli_real_escape_string($con, $bookId);
        $bookChapterId = mysqli_real_escape_string($con, $bookChapterId);
        $numericalOrder = mysqli_real_escape_string($con, $numericalOrder);
        $subject = mysqli_real_escape_string($con, $subject);
        $content = mysqli_real_escape_string($con, $content);
        $contentRaw = mysqli_real_escape_string($con, $contentRaw);

        $slqQuery = "INSERT INTO `book_chapter_content` (`book_id`, `book_chapter_id`, `numerical_order`, `subject`, `content`, `content_raw`) VALUES ($1, $2, $3, '$4', '$5', '$6');";
        $slqQuery = str_replace("$1", $bookId , $slqQuery);
        $slqQuery = str_replace("$2", $bookChapterId , $slqQuery);
        $slqQuery = str_replace("$3", $numericalOrder , $slqQuery);
        $slqQuery = str_replace("$4", $subject , $slqQuery);
        $slqQuery = str_replace("$5", $content , $slqQuery);
        $slqQuery = str_replace("$6", $contentRaw , $slqQuery);
        //echo 'SQL: ' . $slqQuery;
        
        
//        if(mysqli_query($con, $slqQuery)) {
//            $result = true;
//        }
        $result = mysqli_query($con, $slqQuery) or trigger_error("Query Failed! SQL: $slqQuery - Error: ".mysqli_error($con), E_USER_ERROR);
        
        mysqli_close($con);
        return json_encode($result);

    }

    private function runQuery($sql) {
        $result = $this->connect()->query($sql);

        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        
        return null;
    }
    
    public function getAllGenre() {
        $sql = "SELECT * FROM book_genre ORDER BY priority";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }       

}
