<div class="content-wrapper">

    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="m-0 font-weight-bold">Add new chapter content.</h4>
                        </div>
                        <div class="card-body">

                            <!-- MAIN CONTENT -->
                            <form action="http://ehosito.local/Book/insertBookChapterContent" method="POST" class="">

                                <div class="row">
                                    <div class="col-auto p-1">
                                        <label class="w-auto mb-0 pt-1 font-weight-normal">Subject</label>
                                    </div>
                                    <div class="col p-1">
                                        <input type="text" id="subject" name="subject" class="w-100" />
                                    </div>
                                    <div class="col-auto p-1">
                                        <button type="submit" name="btnPublish" class="btn btn-primary w-auto btn-sm" style="font-size: 0.975rem;">Publish</button>
                                    </div>
                                </div>

                                <div class="row mt-4 flex-grow-1">
                                    <div class="col h-100">
                                        <div class="flex h-100">

                                            <div id="pInput" class="d-flex flex-column">

                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-editor" role="tab" aria-controls="pills-home" aria-selected="true">EDITOR</a>
                                                    </li>

                                                </ul>
                                                <div class="tab-content h-100" id="pills-tabContent">
                                                    <div class="tab-pane fade show active  h-100" id="pills-editor" role="tabpanel" aria-labelledby="pills-editor-tab">
                                                        <div class="w-100 flex-grow-1 h-100">
                                                            <textarea id="taInput" name="contentRaw" class="w-100 h-100 border border-secondary rounded"></textarea>
                                                        </div>  
                                                    </div>

                                                </div>                     


                                            </div>        

                                            <div id="pOutput" class="d-flex flex-column">

                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-output" role="tab" aria-controls="pills-home" aria-selected="true">OUTPUT</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-html" role="tab" aria-controls="pills-html" aria-selected="false">HTML</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content h-100" id="pills-tabContent">
                                                    <div class="tab-pane fade h-100 show active" id="pills-output" role="tabpanel" aria-labelledby="pills-output-tab">
                                                        <div id="divScreen" class="row w-100 h-100 border rounded m-0 d-block"></div>
                                                    </div>

                                                    <div class="tab-pane fade h-100" id="pills-html" role="tabpanel" aria-labelledby="pills-html-tab">
                                                        <textarea id="taHtml" name="content" class="w-100 h-100 border border-secondary rounded"></textarea>			
                                                    </div>
                                                </div>                    

                                            </div>                                            

                                        </div>
                                    </div>
                                </div>

                                <!-- FIELDS SYSTEM -->
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="bookId" name="bookId" value="<?php echo $data["bookId"]; ?>" class="" />
                                    </div>
                                    <div class="col">
                                        <input type="hidden" id="bookChapterId" name="bookChapterId" value="<?php echo $data["bookChapterId"]; ?>" class="" />
                                    </div>  
                                    <div class="col">
                                        <input type="hidden" id="numericalOrder" name="numericalOrder" value="<?php echo $data["bookChapterContentsNumericalOrderLast"]; ?>" class="" />
                                    </div>                                      
                                </div>                                

                            </form>             
                            <!-- MAIN CONTENT END -->

                        </div>
                    </div>              
                </div>

            </div>
        </div>            


    </div>
</div>    


