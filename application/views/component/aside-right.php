<div class="row aside-right"> 

    <div class="col m-2 border ">
        <div class="row">
            <div class="col p-1 border-bottom title">THÔNG BÁO</div>
        </div>
        <div class="row">
            <div class="w-100"></div>
            <div id="divNotification" class="col p-2 m-1">
                Xin chào, mình là Sliver, mình sẽ đồng hành với bạn.<br>
                Thông báo mới mình mới nhận từ Admin là:<br>
                <p class="text-info font-italic mb-0">"Website đang trong quá trình xây dựng và sửa lỗi, nếu bạn gặp lỗi hãy nhấn <b>[Ctrl + F5]</b> ba lần, và nếu vẫn còn lỗi bạn hãy quay lại ngày hôm sau nhé, Admin sẽ sửa lỗi sớm ^-^!"</p>
            </div>
            <div class="w-100"></div>              
        </div>
    </div>        

    <div class="w-100"></div>    
    
    <div class="col m-2 border ">
        <div class="row">
            <div class="col p-1 border-bottom title">CHUYÊN MỤC</div>
        </div>
        <div class="row">
            <div class="w-100"></div>
            <div class="col p-2 m-1 border effect" onclick="location.href = '/book/filter/new'"><i class="far fa-clock"></i> Sách Mới</div>
            <div class="col p-2 m-1 border effect" onclick="location.href = '/book/filter/view'"><i class="fas fa-fire-alt"></i> Xem Nhiều</div>
            <div class="w-100"></div>
            <div class="col p-2 m-1 border effect" onclick="location.href = '/book/filter/good'"><i class="fab fa-gratipay"></i> Sách Hay</div>
            <div class="col p-2 m-1 border effect" onclick="location.href = '/book/filter/hot'"><i class="fas fa-mug-hot"></i> Đang Hot</div>
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
                    <div class="col p-2 m-1 border effect" onclick="location.href = '/Book/filter/genre/<?php echo urlencode($row['name']); ?>'"><i class="<?php echo $row['icon']; ?>"></i> <?php echo $row['name']; ?></div>
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