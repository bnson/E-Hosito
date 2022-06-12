<style>
    .btYes, .btNo, .btNext, .btSend {
        width: 170px;
        height: 70px;    
    }
</style>

<div class="container">        
    
    <div class="row p-2 m-2">
        <div id="monitor1" class="col-12 border align-middle text-center p-4" style="font-size:26px">
            <div>
                Chào mừng bạn tới với chương trình thăm dò tăng lương năm <span class="text-danger font-weight-bold">◄ <script>document.write(new Date().getFullYear())</script> ►</span> do công ty tiến hành.<br>
                Xin vui lòng nhấn nút <span class="text-primary font-weight-bold">"Tiếp tục"</span> để trả lời các câu hỏi sau.<br>
            </div>
            <div class="mt-3 mb-3">♦ ♦ ♦</div>
            <div class="text-danger">
                Công ty xin cam đoan việc tăng lương là hoàn toàn dựa trên tinh thần mong muốn tự nguyện của các bạn.<br>
                Công ty đảm bảo không có bất kỳ hình thức can thiệp hay cản trở mong muốn & lựa chọn chính đáng của các bạn.
            </div>
        </div>

        <div id="monitor2" class="d-none col-12 border align-middle text-left font-weight-bold" style="font-size:32px">
            <div class="row">
                <div class="col-12 p-2">
                    Bạn có muốn tăng lương trong năm <script>document.write(new Date().getFullYear())</script> không?
                </div>
            </div>

            <div class="row align-items-center" style="height:120px">
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-secondary btn-lg pr-5 pl-5">CÓ</button>
                </div>
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-success btn-lg pr-5 pl-5">CÓ</button>
                </div>
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-danger btn-lg pr-5 pl-5">CÓ</button>
                </div>
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-warning btn-lg pr-5 pl-5">CÓ</button>
                </div>				
            </div>
            <div class="row align-items-center" style="height:70px">
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-info btn-lg pr-5 pl-5">CÓ</button>
                </div>
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-light btn-lg pr-5 pl-5">CÓ</button>
                </div>
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-dark btn-lg pr-5 pl-5">CÓ</button>
                </div>
                <div class="col align-middle text-center">
                    <button type="button" class="btYes d-none btn btn-link btn-lg pr-5 pl-5 border">CÓ</button>
                </div>				
            </div>			

            <div class="row align-items-center">				
                <div class="col text-center p-3">
                    <button type="button" class="btYes btn btn-primary btn-lg pr-5 pl-5" >CÓ</button>
                </div>
                <div class="col text-center p-3">
                    <button type="button" class="btn btn-primary btn-lg pr-4 pl-4 btNo" onclick="no()">KHÔNG</button>
                </div>									
            </div>         
        </div>	
    </div>

    <div id="control" class="row p-2 m-2">
        <div class="col-12 w-100 border align-middle text-center p-4 mt-2">
            <button type="button" class="btn btn-primary btn-lg pr-5 pl-5 btNext" onclick="next()">Tiếp tục</button>
        </div>	
    </div>

    <div class="row p-2 m-2">
        <div id="monitor3" class="d-none col-12 border align-middle text-center font-weight-bold">
            <div class="row">
                <div class="col-12 p-2 mt-2 mb-2" style="font-size:24px">		
                    <span class="text-danger">Tuyệt vời!!!</span> Thay mặt Ban Giám Đốc xin cảm ơn các bạn! Các bạn đã có một sự lựa chọn thật tuyệt vời!<br>
                    Bạn là một trong những nhân viên tốt nhất của công ty, là tấm gương sáng cho tất cả các thành viên trong công ty.<br>
                    Tôi luôn tin tưởng các bạn không giờ đòi tăng lương!!!<br>
                </div>
                <div class="col-12 p-2 mt-2 mb-2 text-danger" style="font-size:44px">		
                    Các bạn hãy trở lại với công việc nào.
                </div>			
                <div class="col-12 p-2 mt-2 mb-2" style="font-size:32px">		
                    Chúc các bạn năm <script>document.write(new Date().getFullYear())</script> luôn tràn đầy hạnh phúc & sức khỏe.<br>
                    Chân thành cảm ơn!!!
                </div>	
                <div class="col-12 p-2 mt-2 mb-2" style="font-size:24px">		
                    Xin hãy nhấn nút <span class="text-primary">"GỬI"</span> để gửi cho ban giám đốc công ty.
                </div>			
            </div>

            <div class="row align-items-center">				
                <div class="col text-center p-4">
                    <button type="button" class="btSend btn btn-primary btn-lg pr-5 pl-5" onClick="location.reload()">GỬI</button>
                </div>							
            </div>		
        </div>
    </div>
</div>

<script>
    var countButtonYes = $("button.btYes").length - 1;
    var indexButtonYesShow = 0;
    var audioElement = document.createElement('audio');

    $('button.btYes').hover(function () {
        yes($(this));
    });
    
    $('button.btYes').on('touchstart', function (e) {
        yes($(this));
    });    

    function next() {
        $("#monitor1, #control").addClass("d-none");
        $("#monitor2").removeClass("d-none");

        audioElement.setAttribute('src', 'https://ehosito.com/public/music/Oh_No-Kreepa.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.play();
    }

    function yes(el) {
        el.addClass("d-none");

        $("button.btYes").each(function (index, element) {
            if ($(element).is(el)) {
                if (index < countButtonYes) {
                    indexButtonYesShow = index + 1;
                } else {
                    indexButtonYesShow = 0;
                }
            }
        });

        $($("button.btYes")[indexButtonYesShow]).removeClass("d-none");

    }

    function no() {
        audioElement.pause();
        $("#monitor2").addClass("d-none");
        $("#monitor3").removeClass("d-none");
    }
</script>