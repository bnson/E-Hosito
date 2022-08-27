<div class="row aside-left sticky-top"> 

    <?php if (isset($data["showAsideLeftBookChapters"]) && $data["showAsideLeftBookChapters"]) { ?>
        <?php
        $book = $data["book"][0];
        $bookContentId = $data["bookContent"]["id"];
        ?>
        <div id="bookIndex" class="col m-2 border">
            <div class="row">
                <div class="col p-1 border-bottom title text-uppercase"  onclick="location.href = '/Book/load/BookDetail/<?php echo $book['id']; ?>'"><i class="fas fa-book"></i> <?php echo $book['name']; ?></div>
            </div>

            <div id="bookIndexItems" class="row align-content-start flex-wrap overflow-auto">
                <?php
                foreach ($data["bookChapters"] as $row) {
                    $chapterContents = $this->book->getChapterContents($row['book_id'], $row['id']);
                    $ChapterContentsIdFirst = $chapterContents[0]['id'];
                    ?>
                    <!-- <div class="w-100"></div> -->
                    <div class="chapter col align-self-start p-2 m-1 border effect font-weight-bold" onclick="location.href = '/Book/load/BookContent/<?php echo $row['book_id']; ?>/<?php echo ($row['id'] . "/" . $ChapterContentsIdFirst); ?>'">
                        <u><?php echo $row['name']; ?></u>
                    </div>
                    <?php
                    if (isset($chapterContents)) {
                        foreach ($chapterContents as $rowChapterContents) {
                            ?>
                            <div class="w-100 align-self-start"></div>
                            <?php if ($rowChapterContents['id'] == $bookContentId) { ?>
                                <div id="itemActive" class="col align-self-start p-2 m-1 border effect bg-primary text-light font-weight-bold" onclick="location.href = '/Book/load/BookContent/<?php echo $row['book_id']; ?>/<?php echo $row['id']; ?>/<?php echo $rowChapterContents['id']; ?>'">
                                    <?php echo $rowChapterContents['subject']; ?>
                                </div>                                    
                            <?php } else { ?>
                                <div class="col align-self-start p-2 m-1 border effect" onclick="location.href = '/Book/load/BookContent/<?php echo $row['book_id']; ?>/<?php echo $row['id']; ?>/<?php echo $rowChapterContents['id']; ?>'">
                                    <?php echo $rowChapterContents['subject']; ?>
                                </div>                                    
                            <?php } ?>
                            

                            <?php
                        }
                    }
                    ?>                    
                    <div class="w-100 align-self-start"></div>
                <?php } ?>
            </div>
        </div>          
        
        <script>
            $(document).ready( function(){
                  var elem = $('#itemActive');
                  if(elem)
                  {
                    var main = $("#bookIndexItems"),
                        t = main.offset().top;
                        main.scrollTop(elem.offset().top - t);
                  }
                });        
        </script>
    <?php } ?>    

    <div class="w-100"></div>
    
    
</div>    