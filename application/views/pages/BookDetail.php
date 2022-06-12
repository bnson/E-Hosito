<?php
$book = $data["books"][0];
$booksSameAuthor = $data["booksSameAuthor"];
$booksSameGenres = $data["booksSameGenres"];
?>
<div class="row">
    <div class="col m-2 border">
        <div class="row">
            <div class="col col-md-auto">
                <div class="row">
                    <div class="col border m-2 p-2 text-center">
                        <img class="card-img-center" src="<?php echo $book['cover'] ?>" style="width: 200px; height: 300px;">
                    </div>
                </div>
            </div>
            <div class="col border m-2">
                <div class="row">
                    <div class="col title border m-1 p-1"><?php echo $book['name'] ?></div>
                    <div class="w-100"></div>
                    <div class="col border m-1 p-1 small"><span class="title">Tác giả:</span> <?php echo $book['author'] ?></div>
                    <div class="w-100"></div>
                    <div class="col border m-1 p-1 small"><span class="title">Tình trang:</span> <?php echo $book['status'] ?></div>
                    <div class="w-100"></div>
                    <div class="col border m-1 p-1 small"><span class="title">Cập nhật lúc:</span> <?php echo $book['last_updated'] ?></div>                    
                    <div class="w-100"></div>
                    <div class="col border m-1 p-1 small title">Thể Loại</div>
                    <div class="w-100"></div>
                    <?php
                    $genresIndex = 0;
                    foreach ($data["genres"] as $row) {
                        echo '<div class="col p-1 m-1 border effect" onclick="location.href=\'https://ehosito.com/Book/filterBookByGenre/' . urlencode(trim($row)) . '\'">' . trim($row) . '</div>';
                        if ($genresIndex % 2) {
                            echo '<div class="w-100"></div>';
                        }
                        $genresIndex++;
                    }
                    ?>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col border m-2 p-2"><b><u>Mô tả:</u></b><br> <?php echo $book['description'] ?></div>
            <div class="w-100"></div>
            <div class="col border m-2">
                <div class="row mb-1">
                    <div class="col title border ml-2 mr-2 mt-2 mb-1 p-2"><i class="far fa-play-circle"></i> Mục lục.</div>
                    <div class="w-100"></div>
                    <?php
                    if (isset($data["bookChapters"])) {
                        foreach ($data["bookChapters"] as $row) {
                            $bookChapterContents = $this->book->getChapterContents($book['id'], $row["id"]);
                            $bookChapterContentsIdFirst = $bookChapterContents[0]['id'];
                            
                            ?> 
                            <div class="col border ml-2 mr-2 mt-1 mb-1 p-2 effect font-weight-bold" onclick="location.href = 'https://ehosito.com/Book/loadBookContent/<?php echo $row['book_id']; ?>/<?php echo ($row['id'] . "/" . $bookChapterContentsIdFirst); ?>'">
                                <u><?php echo $row['name']; ?></u>
                            </div>
                            <?php
                            if (isset($bookChapterContents)) {
                                foreach ($bookChapterContents as $rowChapterContents) {
                                    ?>
                                    <div class="w-100"></div>
                                    <div class="col border ml-2 mr-2 mt-1 mb-1 p-2 effect" onclick="location.href = 'https://ehosito.com/Book/loadBookContent/<?php echo $row['book_id']; ?>/<?php echo $row['id']; ?>/<?php echo $rowChapterContents['id']; ?>';">
                                        <?php echo $rowChapterContents['subject']; ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="w-100"></div>
                            <?php
                        }
                    }
                    ?>                                         
                </div>
            </div>            
            <div class="w-100"></div>
        </div>

    </div>

    <div class="w-100"></div>

    <div class="col m-2 border">

        <div class="row">
            <div class="col p-2 border-bottom title"><i class="fas fa-feather-alt"></i> SÁCH CÙNG TÁC GIẢ</div>
        </div>          

        <div class="row p-1">            

            <?php foreach ($booksSameAuthor as $row) { ?>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 p-1">
                    <div class="card mb-2 border" onclick="location.href = 'https://ehosito.com/Book/loadBookDetail/<?php echo $row['id']; ?>';">
                        <img class="card-img-top img-fluid" src="<?php echo $row['cover']; ?>" >
                        <div class="card-body p-2">
                            <p class="card-text"><?php echo $row['name']; ?></p>
                        </div>
                    </div>
                </div> 
            <?php } ?>              

        </div>
    </div>

    <div class="w-100"></div>

    <div class="col m-2 border">

        <div class="row">
            <div class="col p-1 border-bottom title"><i class="fab fa-accusoft"></i> SÁCH CÙNG THỂ LOẠI</div>
        </div>          

        <div class="row p-1">            

            <?php foreach ($booksSameGenres as $row) { ?>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 p-1">
                    <div class="card mb-2 border" onclick="location.href = 'https://ehosito.com/Book/loadBookDetail/<?php echo $row['id']; ?>';">
                        <img class="card-img-top img-fluid" src="<?php echo $row['cover']; ?>" >
                        <div class="card-body p-2">
                            <p class="card-text"><?php echo $row['name']; ?></p>
                        </div>
                    </div>
                </div> 
            <?php } ?>              

        </div>
    </div>                        

    <div class="w-100"></div>

</div>  