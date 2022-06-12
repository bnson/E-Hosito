<?php
    $book = $data["books"][0];
?>

<div class="row mb-1">
    <div class="col title border ml-2 mr-2 mt-2 mb-1 p-2"><i class="far fa-play-circle"></i> Mục lục.</div>
    <div class="w-100"></div>
    <?php
    if (isset($data["bookChapters"])) {
        foreach ($data["bookChapters"] as $row) {
            $bookChapterContents = $this->book->getChapterContents($book['id'], $row["id"]);
            
            $bookChapterContentsNumericalOrderLast = 1;
            if (!is_null($bookChapterContents)) {
                $bookChapterContentsNumericalOrderLast = end($bookChapterContents)['numerical_order'] + 1;
            }

            $bookChapterContentsIdFirst = $bookChapterContents[0]['id'];

            ?> 
    
            <div class="col border ml-2 mr-2 mt-1 mb-1 p-2 font-weight-bold">
                <div class="row">
                    <div class="col border effect" onclick="location.href = 'https://ehosito.com/Book/loadBookContent/<?php echo $row['book_id']; ?>/<?php echo ($row['id'] . "/" . $bookChapterContentsIdFirst); ?>'"><u><?php echo $row['name']; ?></u></div>
                    <div class="col border effect" onclick="location.href = 'https://ehosito.com/Admin/load/BookChapterContentInsert/<?php echo $row['book_id']; ?>/<?php echo ($row['id']); ?>/<?php echo ($bookChapterContentsNumericalOrderLast); ?>'">Add new</div>
                </div>
                
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