<?php
$book = $data["book"][0];
$bookChapterName = $data["bookChapterName"];
$bookContent = $data["bookContent"]["content"];
$bookContentSubject = $data["bookContent"]["subject"];
$bookContentLastUpdated = $data["bookContent"]["last_updated"];

$title = "Book Content";

?>

<div class="row" id="bookContent">
    
    <div class="col m-2 border">
        <div class="row border-bottom mb-1 justify-content-start">
            <div class="title col p-2 text-break">
                <span style="font-size: 14px !important;"><?php echo $book["name"] ?> → <?php echo $bookChapterName ?></span><br>
                <span><i class="far fa-file-alt"></i> <?php echo $bookContentSubject ?></span><br>
                <span class="font-weight-light font-italic" style="font-size: 12px">
                    <i class="far fa-clock"></i> <?php echo $bookContentLastUpdated ?>
                </span>
            </div>
            <div class="col-auto border pl-3 pr-3 m-1 border align-items-center justify-content-center h-50" style="font-size: 40px;" onclick="previousBookChapterContent()">
                <i class="previous fas fa-angle-left"></i>
            </div>
            <div class="col-auto border pl-3 pr-3 m-1 border align-items-center justify-content-center h-50" style="font-size: 40px;" onclick="nextBookChapterContent()">
                <i class="next fas fa-angle-right"></i>
            </div>
        </div>      

        <div class="row p-1">
            <div id="bookContentMain" class="col p-1 text-break">
                <?php
                    echo $bookContent;
                ?>
            </div>
        </div>
        
        <div class="row mb-1 justify-content-start">
            <div class="col-auto border pl-3 pr-3 m-1 border align-items-center justify-content-center h-50" style="font-size: 40px;" onclick="previousBookChapterContent()">
                <i class="previous fas fa-angle-left"></i>
            </div>
            <div class="col-auto border pl-3 pr-3 m-1 border align-items-center justify-content-center ml-auto h-50" style="font-size: 40px;" onclick="nextBookChapterContent()">
                <i class="next fas fa-angle-right"></i>
            </div>
        </div>          
    </div>
    
    <div class="w-100"></div>

    
    <script>
    
    function nextBookChapterContent() {
        var elem = $('#itemActive');
        if(elem)
        {
            elem.next().next().click();
        }        
    }
    
    function previousBookChapterContent() {
        var elem = $('#itemActive');
        if(elem)
        {
            var className = elem.prev().prev().attr('class');
            if (className.indexOf("chapter") >= 0) {
                elem.prev().prev().prev().prev().click();
            } else {
                elem.prev().prev().click();
            }
            
        }        
    }    

    </script>    
</div>
