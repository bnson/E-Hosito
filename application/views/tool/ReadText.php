<div class="row">

    <div class="col border m-2">

        <div id="panel-button-row-1" class="row p-0 pl-2 pr-2">

            <div class="col-12 col-sm-4 col-md-3 p-2 form-group mb-0">
                <label for="languages" class="font-weight-bold">Ngôn Ngữ</label>
                <select class="form-control" id="languages">
                </select>               
            </div>
            <div class="col-12 col-sm-8 col-md-9 p-2 form-group mb-0">
                <label for="voices" class="font-weight-bold">Giọng Nói</label>
                <select class="form-control" id="voices">
                </select>                 
            </div>

        </div>          
        
        <div id="panel-button-row-2" class="row p-0 pl-2 pr-2">
            <div class="col-12 p-0 p-2 mb-0">
                <button id="playButton" class="btn mb-1"><i class="fa fa-play mr-2"></i>Play</button>
                <button id="pauseButton" class="btn mb-1"><i class="fa fa-pause mr-2"></i>Pause</button>
                <button id="stopButton" class="btn mb-1"><i class="fa fa-stop mr-2"></i>Stop</button>
            </div>
        </div>
        
        <div id="panel-button-row-3" class="row p-0 pl-3 pr-3">            
            <div class="col-12 p-2 border rounded">
                <i class="far fa-comment-dots fa-lg w-auto float-left pr-2"></i><div id="messageDiv" class="float-none"></div>
            </div>
        </div>

        <div class="row p-2">
            <div id="pOne" class="col-12 col-sm-12 col-md-6 p-2">
                <textarea id="taInput" class="p-2 w-100 h-100 border rounded"></textarea>
            </div>

            <div id="pTwo" class="col-12 col-sm-12 col-md-6 p-2">
                <div id="screen" class="row w-100 h-100 border rounded m-0 d-block"></div>
            </div>            
        </div>

    </div>

    <div class="w-100"></div>

</div>

<div class="row">
    <div id="panelInformation" class="col border m-2 p-3">
        <div class="row m-0">
            <div id="piGuides" class="col-12 col-sm-12 col-md-6 m-0 p-1">
                <p class="h5">Hướng dẫn sử dụng:</p>
                <ul id="ulGuides">
                    <li>Các tính năng cơ bản.</li>
                    <li>Hướng dẫn cài đặt thêm giọng nói trên máy tính Windows.</li>
                    <li>Hướng dẫn cài đặt thêm giọng nói trên điện thoại Android.</li>
                </ul>
            </div>            
            <div id="piVoicesSupport" class="col-12 col-sm-12 col-md-6 m-0 p-1">
                <p class="h5">Ngôn ngữ & Giọng nói được hỗ trợ:</p>
                <ul id="ulVoicesSupport">
                </ul>
            </div>
        </div>
    </div>
</div>
