<div class="row">
    <div class="col m-2 border">

        <div class="row">
            <div class="col p-2 mb-2 border-bottom title" onclick="location.href = '/Book/filterBookByGenre/'"><i class="far fa-clock"></i> SÁCH MỚI - <u>XEM THÊM</u></div>
        </div>          

        <div class="row p-1">
            <?php foreach ($data["books"] as $book) { ?>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 p-1">
                    <div class="card mb-2 border" onclick="location.href = 'http://ehosito.local/Book/loadBookDetail/<?php echo $book['id']; ?>';">
                        <img class="card-img-top img-fluid" src="<?php echo $book['cover']; ?>" >
                        <div class="card-body p-2">
                            <p class="card-text"><?php echo $book['name']; ?></p>
                        </div>
                    </div>
                </div> 
            <?php } ?>

        </div>
    </div>
    <div class="w-100"></div>

</div>

<div class="row">
    <div class="col m-2 border">

        <div class="row">
            <div class="col p-2 mb-2 border-bottom title" onclick="location.href = '/Book/filterBookByGenre/SGK'"><i class="fas fa-book"></i> SÁCH GIÁO KHOA - <u>XEM THÊM</u></div>
        </div>          

        <div class="row p-1">
            <?php foreach ($data["booksByGenresSgk"] as $book) { ?>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 p-1">
                    <div class="card mb-2 border" onclick="location.href = '/Book/loadBookDetail/<?php echo $book['id']; ?>';">
                        <img class="card-img-top img-fluid" src="<?php echo $book['cover']; ?>" >
                        <div class="card-body p-2">
                            <p class="card-text"><?php echo $book['name']; ?></p>
                        </div>
                    </div>
                </div> 
            <?php } ?>

        </div>
    </div>
    <div class="w-100"></div>

</div>