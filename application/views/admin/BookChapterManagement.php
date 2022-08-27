<?php
$book = $data["books"][0];
?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book Chapter Management</h1>
                </div>
                <div class="col-sm-6">
                    <!--<ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="#">Book</a></li>
                    </ol>-->
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Book Chapter Management</h5>
                        </div>
                        <div class="card-body">

                            <!-- MAIN CONTENT -->
                            <div class="row mb-1">
                                <div class="col title border ml-2 mr-2 mt-2 mb-1 p-2"><i class="far fa-play-circle"></i> Mục lục.</div>
                                <div class="w-100"></div>
                                <?php
                                if (isset($data["bookChapters"])) {
                                    foreach ($data["bookChapters"] as $row) {
                                        $bookChapterContents = $this->bookModel->getChapterContents($book['id'], $row["id"]);

                                        $bookChapterContentsNumericalOrderLast = 1;
                                        if (!is_null($bookChapterContents)) {
                                            $bookChapterContentsNumericalOrderLast = end($bookChapterContents)['numerical_order'] + 1;
                                        }

                                        $bookChapterContentsIdFirst = $bookChapterContents[0]['id'];
                                        ?> 

                                        <div class="col ml-2 mr-2 mt-1 mb-1 p-2 font-weight-bold">
                                            <div class="row">
                                                <div class="col border effect" onclick="location.href = '<?php echo $GLOBALS['root_link']; ?>/Book/load/BookContent/<?php echo $row['book_id']; ?>/<?php echo ($row['id'] . "/" . $bookChapterContentsIdFirst); ?>'"><u><?php echo $row['name']; ?></u></div>
                                                <div class="col border effect" onclick="location.href = '<?php echo $GLOBALS['root_link']; ?>/Admin/load/BookChapterContentInsert/<?php echo $row['book_id']; ?>/<?php echo ($row['id']); ?>/<?php echo ($bookChapterContentsNumericalOrderLast); ?>'">Add new</div>
                                            </div>

                                        </div>

                                        <?php
                                        if (isset($bookChapterContents)) {
                                            foreach ($bookChapterContents as $rowChapterContents) {
                                                ?>
                                                <div class="w-100"></div>
                                                <div class="col border ml-2 mr-2 mt-1 mb-1 p-2 effect" onclick="location.href = '<?php echo $GLOBALS['root_link']; ?>/Book/load/BookContent/<?php echo $row['book_id']; ?>/<?php echo $row['id']; ?>/<?php echo $rowChapterContents['id']; ?>';">
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
                            <!-- MAIN CONTENT END -->

                        </div>
                    </div>              
                </div>

            </div>
        </div>

    </div>
</div>    
