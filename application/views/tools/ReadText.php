<div class="row h-100">

    <div class="col border m-2">

        <div id="panel-button-row-1" class="row p-0 pl-2 pr-2">

            <div class="col-12 col-sm-4 col-md-2 p-2 form-group mb-0">
                <label for="languages" class="font-weight-bold text-secondary">Ngôn Ngữ</label>
                <select class="form-control" id="languages">
                    <option selected value="EN">Tiếng Anh</option>
                    <option value="DE">Tiếng Đức</option>
                </select>               
            </div>
            <div class="col-12 col-sm-8 col-md-10 p-2 form-group mb-0">
                <label for="voices" class="font-weight-bold text-secondary">Giọng Nói</label>
                <select class="form-control" id="voices">
                </select>                 
            </div>

        </div>          
        
        <div id="panel-button-row-2" class="row p-0 pl-2 pr-2">
            <div class="col-12 p-0 p-2 mb-0">
                <button id="playButton" class="btn btn-outline-secondary mb-1"><i class="fa fa-play mr-2"></i>Play</button>
                <button id="pauseButton" class="btn btn-outline-secondary mb-1"><i class="fa fa-pause mr-2"></i>Pause</button>
                <button id="stopButton" class="btn btn-outline-secondary mb-1"><i class="fa fa-stop mr-2"></i>Stop</button>
            </div>
        </div>
        
        <div id="panel-button-row-3" class="row p-0 pl-3 pr-3">            
            <div class="col-12 p-2 border rounded">
                <i class="far fa-comment-dots fa-lg w-auto text-secondary float-left pr-2"></i><div id="messageDiv" class="text-secondary float-none"></div>
            </div>
        </div>

        <div class="row p-2">
            <div id="pOne" class="col-12 col-sm-12 col-md-6 pt-2 pl-1 pr-1 pb-2">
                <form class="w-100 h-100">
                    <textarea id="taInput" class="w-100 h-100 border rounded overflow-hidden p-2"></textarea>
                </form> 
            </div>

            <div id="pTwo" class="col-12 col-sm-12 col-md-6 pt-2 pl-1 pr-1 pb-2">
                <div id="screen" class="w-100 h-100 border rounded p-2"></div>
            </div>            
        </div>

    </div>

    <div class="w-100"></div>


</div>
