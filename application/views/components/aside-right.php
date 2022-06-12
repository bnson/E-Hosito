<div class="row aside-right"> 

    <div class="col m-2 border ">
        <div class="row">
            <div class="col p-1 border-bottom title">CHUYÊN MỤC</div>
        </div>
        <div class="row">
            <div class="w-100"></div>
            <div class="col p-2 m-1 border effect" onclick="location.href = 'https://ehosito.com/Filter'"><i class="far fa-clock"></i> Sách Mới</div>
            <div class="col p-2 m-1 border effect" onclick="location.href = 'https://ehosito.com/Filter'"><i class="fas fa-fire-alt"></i> Xem Nhiều</div>
            <div class="w-100"></div>
            <div class="col p-2 m-1 border effect" onclick="location.href = 'https://ehosito.com/Filter'"><i class="fab fa-gratipay"></i> Sách Hay</div>
            <div class="col p-2 m-1 border effect" onclick="location.href = 'https://ehosito.com/Filter'"><i class="fas fa-mug-hot"></i> Đang Hot</div>
            <div class="w-100"></div>              
        </div>
    </div>        

    <div class="w-100"></div>

    <?php if (isset($data["menuGenres"])) { ?>
    <div class="col m-2 border">
        <div class="row">
            <div class="col p-1 border-bottom title">SÁCH GIÁO KHOA</div>
        </div>
        <div class="row">
            <?php 
                $i = 0;
                foreach ($data["menuGenres"] as $row) { ?>
                    <div class="col p-2 m-1 border effect" onclick="location.href = 'https://ehosito.com/Book/filterBookByGenre/<?php echo urlencode($row['name']); ?>'"><i class="<?php echo $row['icon']; ?>"></i> <?php echo $row['name']; ?></div>
            <?php
                    if ($i % 2) {
                        echo '<div class="w-100"></div>';
                    }
                    $i++;
                }
            ?>
            <?php } ?>
        </div>
    </div>
</div>