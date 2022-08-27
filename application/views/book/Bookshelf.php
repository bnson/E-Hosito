<div class="row">
    <div class="col m-2 border">

        <div class="row">
            <div class="col p-2 mb-2 border-bottom title"><i class="far fa-clock"></i> <?php echo $data["pageObj"]->getTitle(); ?></div>
        </div>          

        <div class="row p-1">
            <?php if(isset($data["books"])) : ?>
                <?php foreach ($data["books"] as $book) { ?>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 p-1">
                        <div class="card mb-2 border" onclick="location.href = '/Book/load/BookDetail/<?php echo $book['id']; ?>'">
                            <img class="card-img-top img-fluid" src="<?php echo $book['cover']; ?>" >
                            <div class="card-body p-2">
                                <p class="card-text"><?php echo $book['name']; ?></p>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
            <?php endif; ?>

        </div>
    </div>
    <div class="w-100"></div>

</div>