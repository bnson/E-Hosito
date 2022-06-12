<style>
    textarea:hover {
        border: 1px solid #007bff!important;
    }

    textarea:focus {
        outline: none;
        border: 1px solid #007bff!important;
    }

    .flex {
        display: flex;
        flex-direction: row;
    }
    .gutter.gutter-horizontal {
        cursor: ew-resize;
    }

    .menu {
        font-size: 24px;
    }
</style>

<form action="https://ehosito.com/Book/insertBookChapterContent" method="POST" class="h-100">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <input type="text" id="bookId" name="bookId" value="<?php echo $data["bookId"]; ?>" class="" />
            </div>
            <div class="col">
                <input type="text" id="bookChapterId" name="bookChapterId" value="<?php echo $data["bookChapterId"]; ?>" class="" />
            </div>  
            <div class="col">
                <input type="text" id="numericalOrder" name="numericalOrder" value="<?php echo $data["bookChapterContentsNumericalOrderLast"]; ?>" class="" />
            </div>              
        </div>        
    </div>

    <div class="container-fluid h-100 d-flex flex-column">        

        <div class="row mt-3 mb-3">
            <div class="col-auto">
                <label class="w-auto mb-0 pt-1">Subject</label>
            </div>
            <div class="col p-0">
                <input type="text" id="subject" name="subject" class="w-100" />
            </div>
            <div class="col-auto">
                <button type="submit" name="btnPublish" class="btn btn-primary btn-lg w-auto">Publish</button>
            </div>
        </div>

        <div class="row flex-grow-1 mt-2 mb-2">
            <div class="col h-100">

                <div class="flex h-100">

                    <div id="one" class="d-flex flex-column">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-editor" role="tab" aria-controls="pills-home" aria-selected="true">EDITOR</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content h-100" id="pills-tabContent">
                            <div class="tab-pane fade show active  h-100" id="pills-editor" role="tabpanel" aria-labelledby="pills-editor-tab">
                                <form class="w-100 flex-grow-1  h-100">
                                    <textarea id="contentRaw" name="contentRaw" class="w-100 h-100 border border-secondary rounded"></textarea>
                                </form>  
                            </div>

                        </div>                     

                    </div>

                    <div id="two" class="d-flex flex-column">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-output" role="tab" aria-controls="pills-home" aria-selected="true">OUTPUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-html" role="tab" aria-controls="pills-html" aria-selected="false">HTML</a>
                            </li>
                        </ul>
                        <div class="tab-content h-100" id="pills-tabContent">
                            <div class="tab-pane fade show active  h-100" id="pills-output" role="tabpanel" aria-labelledby="pills-output-tab">
                                <iframe class="w-100 h-100 border border-secondary rounded" sandbox="allow-downloads allow-forms allow-modals allow-pointer-lock allow-popups allow-presentation allow-same-origin allow-scripts allow-top-navigation-by-user-activation"></iframe>
                            </div>

                            <div class="tab-pane fade h-100" id="pills-html" role="tabpanel" aria-labelledby="pills-html-tab">
                                <textarea id="content" name="content" class="w-100 h-100 border border-secondary rounded"></textarea>			
                            </div>
                        </div>                    
                    </div>                    
                </div>

            </div>                    
        </div>

    </div>
</form>

<script>
    //===
    var index;
    
    //===
    Split(['#one', '#two'], {
        elementStyle: (dimension, size, gutterSize) => ({
                'flex-basis': `calc(${size}% - ${gutterSize}px)`
            }),
        gutterStyle: (dimension, gutterSize) => ({
                'flex-basis': `${gutterSize}px`
            })
    });

    var contents = $("iframe").contents();
    var body = contents.find("body");
    var head = contents.find("head");

    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/bootstrap-4.5.3/css/bootstrap.min.css\" />").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/fontawesome-free-5.8.2-web/css/all.css\" />").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/Rpg-Awesome/css/rpg-awesome.css\" />").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/split-js-1.5.9/splitjs.css\" />").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/alertify.js-0.3.11/themes/alertify.core.css\" />").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/alertify.js-0.3.11/themes/alertify.bootstrap.css\" />").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/highlight/styles/default.css\">").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/framework/highlight/styles/a11y-dark.css\">").appendTo(contents.find("head"));
    $("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://ehosito.com/public/css/general.css\" />").appendTo(contents.find("head"));   
    
    $("<script type=\"text/javascript\" src=\"https://ehosito.com/public/js/jquery-2.2.4.min.js\"><\/script>").appendTo(contents.find("head"));
    $("<script type=\"text/javascript\" src=\"https://ehosito.com/public/framework/split-js-1.5.9/split.min.js\"><\/script>").appendTo(contents.find("head"));
    
    $("<script type=\"text/javascript\" src=\"https://ehosito.com/public/framework/highlight/highlight.pack.js\"><\/script>").appendTo(contents.find("head"));
//    var libHighlight = document.createElement('script');
//    libHighlight.type='text/javascript';
//    libHighlight.src = "https://ehosito.com/public/framework/highlight/highlight.pack.js";
//    head.append(libHighlight);
    
    $("<script>hljs.highlightAll();<\/script>").appendTo(contents.find("head"));
    
    $("<script type=\"text/javascript\" src=\"https://ehosito.com/public/framework/bootstrap-4.5.3/js/bootstrap.min.js\"><\/script>").appendTo(contents.find("html"));;
    $("<script type=\"text/javascript\" src=\"https://ehosito.com/public/framework/alertify.js-0.3.11/alertify.min.js\"><\/script>").appendTo(contents.find("html"));;
    $("<script type=\"text/javascript\" src=\"https://ehosito.com/public/js/core.js?v=2\"><\/script>").appendTo(contents.find("html"));
    
    var styleTag = $("<style></style>").appendTo(contents.find("head"));
    
    
    //---
    $("textarea#contentRaw").keyup(function (e) {
        convertToHtml();    
    });
    //---


    function convertToHtml() {
        var dataInput = $("textarea#contentRaw").val();
        var dataInputArray;
        var dataOutputArray = [];
        var dataOutputIndex = 0;

        var htmlRegex = new RegExp('(^<p>)|(^<div>)|(^<h[1-6]>)|(^<li>)|(^<b>)', 'i');
        
        var div = "<div class=\"border p-2 mb-2\">§1</div>";
        var div_s = "<div class=\"w-100 mt-2 mb-2\"></div>";
        
        var hr1 = "<hr class=\"w-100 bg-info mt-4 mb-4\">";
        var hr2 = "<hr class=\"w-100 bg-secondary mt-4 mb-4\">";
        var hr3 = "<hr class=\"bg-info mt-4 mb-4\" width=\"75%\" align=\"center\">";
        var p = "<p>§1</p>";
        var b = "<b>§1</b>";
        var br = "<br>";
        var img = "<img class=\"img-fluid mx-auto d-block mb-2\" src=\"§1\">";
        var audio_w = "<div class=\"col border border-dark p-2 mb-2 display-4 w-100\" onclick=\"personSpeak('§1');\">\n" +
                        "	<i class=\"far fa-play-circle text-dark\"></i>\n" +
                        "</div>";
        
        var wordsTemplate2 = "<div class=\"wordsTemplate2 d-flex pt-1 pb-1\">\n" +
                        "	<div class=\"wordsTranslate col-auto border p-2 mr-2 mb-1 d-flex align-items-center justify-content-center\"><i class=\"fa fa-language fa-2x text-secondary\" aria-hidden=\"true\"></i></div>\n" +
                        "	<div class=\"wordsRepeat col-auto border pt-2 pb-2 pl-3 pr-3 mr-2 mb-1 d-flex align-items-center justify-content-center\"><i class=\"fas fa-sync-alt text-secondary\"></i></div>\n" +
                        "	<div class=\"wordsContent col border p-2 mb-1 d-flex flex-wrap align-items-center\" onclick=\"personRead(this, 1);\">\n" +
                        "		<span class=\"words-english\">§1</span>\n" +
                        "		<span class=\"words-pronounce d-none font-weight-light font-italic w-100\">§2</span>\n" +
                        "		<span class=\"words-vietnamese d-none font-weight-bold text-primary w-100\">§3</span>\n" +
                        "	</div>\n" +
                        "</div>";
        
        var quizTemplate1 = "<div class=\"quizTemplate1 row p-2 m-0 border rounded\">\n" +
                        "		<div class=\"question col border p-2 m-1 font-weight-bold\">§1</div>\n" +
                        "		<div class=\"w-100\"></div>\n" +
                        "§2\n" +
                        "		<div class=\"w-100\"></div>\n" +
                        "		<div class=\"explain d-none row border p-2 m-1 align-items-center w-100\">\n" +
                        "			<span>\n" +
                        "				<u>*Explain:</u><br>\n" +
                        "				<i>\n" +
                        "					§3\n" +
                        "				</i>\n" +
                        "			</span>\n" +
                        "		</div>\n" +
                        "</div>";
        var quizTemplate1Answer = "\t\t<div class=\"answer col-auto border p-2 m-1\" answervalue=\"0\">§1</div>";

	var youtube = '<div class=\"videoYoutube col p-2 mb-2\"><iframe width=\"560\" height=\"315\" src=\"§1?rel=0\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\"></iframe></div>'

        dataInputArray = dataInput.split(/\r?\n/);

        var line;
        for (index = 0; index < dataInputArray.length; index++) {
            if (!autoGeneratedHtmlPreCode(dataInputArray, dataOutputArray)) {
                break;
            }
            
            console.log("line i: " + index);

            line = processingSpecialCharacter(dataInputArray[index]); 
            if (htmlRegex.test(line)) {
                if (line.toLowerCase().startsWith('<div>')) {
                    line = trimSpace(line.replace('<div>', ''));
                    line = div.replace('§1', line);;
                    dataOutputArray.push(line);
                    line = '';                    
                } else {
                    line = line + (line.match(htmlRegex)[0]).replace('<','</');
                    line = trimSpace(line);
                    dataOutputArray.push(line);
                    line = '';                    
                }
            } else if (line.toLowerCase().startsWith == '<br>' || line == '`' || line == '`↨`') {
                line = trimSpace(line.replace('`↨`', ''));
                line = trimSpace(line.replace('`', ''));
                line = line + br;
                dataOutputArray.push(line);
                line = '';
            } else if (line.toLowerCase().startsWith('<div-s>') || line == '') {
                line = trimSpace(line.replace('<div-s>', ''));
                line = div_s;
                dataOutputArray.push(line);
                line = '';
            } else if (line.toLowerCase().startsWith('<hr1>') || line == '=↨=') {
                line = trimSpace(line.replace('=↨=', ''));
                line = trimSpace(line.replace('<hr1>', ''));
                line = hr1;
                dataOutputArray.push(line);
                line = '';                
            } else if (line.toLowerCase().startsWith('<audio-w>')) {
                line = trimSpace(line.replace('<audio-w>', ''));
                line = audio_w.replace('§1', line);
                dataOutputArray.push(line);
                line = '';                
            } else if (line.toLowerCase().startsWith('<hr2>') || line == '==↨==') {
                line = trimSpace(line.replace('==↨==', ''));
                line = trimSpace(line.replace('<hr2>', ''));
                line = hr2;
                dataOutputArray.push(line);
                line = '';                
            } else if (line.toLowerCase().startsWith('<hr3>') || line == '===↨===') {
                line = trimSpace(line.replace('===↨===', ''));
                line = trimSpace(line.replace('<hr3>', ''));
                line = hr3;
                dataOutputArray.push(line);
                line = '';                
            } else if (line.toLowerCase().startsWith('<img>')) {
                line = trimSpace(line.replace('<img>', ''));
                line = img.replace('§1', line.split("↨")[0]);
                dataOutputArray.push(line);
                line = '';                
            } else if (line.toLowerCase().startsWith('https') && (line.toLowerCase().endsWith('.png'))) {
                line = img.replace('§1', line.split("↨")[0]);
                dataOutputArray.push(line);
                line = '';                  
            }
            else if (line.toLowerCase().startsWith('<youtube>')) {
                line = trimSpace(line.replace('<youtube>', ''));
                if (line.toLowerCase().startsWith('https://youtu.be/')) {
                    line = line.replace('https://youtu.be/','https://www.youtube.com/watch?v=');
                }
                line = trimSpace(line.replace('watch?v=','embed/')); 
                line = youtube.replace('§1', line);
                dataOutputArray.push(line);
                line = '';                
            } else if (line.toLowerCase().startsWith('https://youtu.be/')) {
                line = trimSpace(line);
                if (line.includes("↨")) {
                    line = line.split("↨")[0];
                }
                if (line.toLowerCase().startsWith('https://youtu.be/')) {
                    line = line.replace('https://youtu.be/','https://www.youtube.com/watch?v=');
                }
                line = trimSpace(line.replace('watch?v=','embed/')); 
                line = youtube.replace('§1', line);
                dataOutputArray.push(line);
                line = '';       
            }
            else if (line.toLowerCase().startsWith('<question>')) {
                line = trimSpace(line.replace('<question>', ''));
                line = quizTemplate1.replace('§1', line);                

                var answers = [];
                var stop = true;
                
                while (stop) {
                    i++;
                    if (i < dataInputArray.length) {
                        var tmpLine = processingSpecialCharacter(dataInputArray[index]);
                        var tmpQuizTemplate1Answer = quizTemplate1Answer;

                        if (tmpLine.toLowerCase().startsWith('<answer>')) {
                            tmpLine = trimSpace(tmpLine.replace('<answer>', ''));
                            if (tmpLine.toLowerCase().startsWith('<true>')) {
                                tmpLine = trimSpace(tmpLine.replace('<true>', ''));
                                tmpQuizTemplate1Answer = tmpQuizTemplate1Answer.replace('answervalue=\"0\"', 'answervalue=\"1\"');
                            }
                            tmpQuizTemplate1Answer = tmpQuizTemplate1Answer.replace('§1', tmpLine);
                            answers.push(tmpQuizTemplate1Answer);
                        } else if (tmpLine.toLowerCase().startsWith('<explain>')) {
                            tmpLine = trimSpace(tmpLine.replace('<explain>', ''));
                            line = line.replace('explain d-none', 'explain');
                            line = line.replace('§3', tmpLine);
                        } else {
                            stop = false;
                            i--;
                        }                  
                    } else {
                        stop = false;
                        i--;
                    }
                }
                console.log(i);

                var answersStr = answers.join("\n");
                //console.log(answersStr);
                line = line.replace('§2', answersStr);
                
                dataOutputArray.push(line);
                line = '';                
            } else if (line.toLowerCase().includes("↨")) {
                var lineArray = line.split("↨");
                var tmpWordsTemplate2 = wordsTemplate2;
                
                if (lineArray[0].toLowerCase().startsWith('<note>')) {
                    lineArray[0] = lineArray[0].replace('<note>', '');
                    tmpWordsTemplate2 = tmpWordsTemplate2.replace('words-english font-weight-bold', 'words-english font-weight-light font-italic');
                }                
                
                if (lineArray[0].toLowerCase().startsWith('<b>')) {
                    lineArray[0] = lineArray[0].replace('<b>', '');
                } else {
                    tmpWordsTemplate2 = tmpWordsTemplate2.replace('words-english font-weight-bold', 'words-english');
                }

                var indexColon = lineArray[0].indexOf(":");
                var tmpWordCount = wordCount(lineArray[0].substring(0, indexColon));
                if (tmpWordCount < 3 && (!lineArray[0].match(/^\d/))) {
                    var subStr = lineArray[0].substring(0, indexColon+1);
                    lineArray[0] = lineArray[0].replace(subStr, "<b>" + subStr + "</b>");
                }                 
                
                if (lineArray.length == 2) {
                    line = tmpWordsTemplate2.replace('§1', lineArray[0]);
                    line = line.replace('§3', lineArray[1]);
                } else if (lineArray.length == 3) {
                    line = wordsTemplate2.replace('§1', lineArray[0]);
                    line = line.replace('§3', lineArray[1]);
                    line = line.replace('§2', lineArray[2]);
                    line = line.replace('words-pronounce d-none', 'words-pronounce');
                }

                dataOutputArray.push(line);
                line = '';
            } else if (!line.toLowerCase().startsWith('<')) {
                line = trimSpace(line.replace('<p>', ''));
                line = p.replace('§1', line);
                dataOutputArray.push(line);
                line = '';                   
            } else {
                line = trimSpace(line);
                dataOutputArray.push(line);
                line = '';
            }
        }
        //--
        var result = dataOutputArray.join("\n");
        result = result.replace(/([^i]>)\n(<li>)/g, "$1\n<ul>\n$2");
        result = result.replace(/(<\/li>)\n(<[^l])/g, "$1\n</ul>\n$2");
        $("textarea#content").val(result);	
        body.html(result);
        //styleTag.text(result);
        
    }
    
    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }    
    
    function wordCount(str) { 
        return str.split(" ").length;
    }    

    function arrayRemoveEmpty(array) {
        //== Remove empty or space elements.
        array = array.filter(function (str) {
            return /\S/.test(str);
        });
        return array;
    }

    function trimSpace(str) {
        return str.trim().replace(/\s+/g, ' ');
    }

    function processingSpecialCharacter(str) {
        str = trimSpace(str);
        str = str.replace(/'/gi, "’");
        str = trimSpace(str);
        return str;
    }
    
    function processingSpecialCharacterHtml(str, pattern) {
        var rs = trimSpace(str);
        
        var tmp = trimSpace(str).replace(pattern, '');
        rs = rs.replace(tmp, '');
        
        tmp = tmp.replace(/'/gi, '’');
        tmp = tmp.replace(/</gi, '&lt;');
        tmp = tmp.replace(/>/gi, '&gt;');
        tmp = trimSpace(tmp);
        
        rs = rs + tmp;
        return rs;
    }    

    function processingRegexReplace(str, strRegexFind, strRegexReplace) {
        //console.log(str + " - " + strRegexFind + " - " + strRegexReplace);
        if (strRegexFind != "" && isRegexValid(strRegexFind)) {
            var regexFind = new RegExp(strRegexFind, "g");
            strRegexReplace = strRegexReplace.replace(strRegexReplace, "\n");
            str = str.replace(regexFind, strRegexReplace);
        }
        return str;
    }

    function processingRegexRemove(str, strRegex) {
        if (isRegexValid(strRegex)) {
            var regex = new RegExp(strRegex, "g");
            str = str.replace(regex, "");
        }
        return str;
    }

    function isRegexValid(strRegex) {
        try {
            new RegExp(strRegex);
            return true;
        } catch (err) {
            return false;
        }
    }

    function unique(list) {
        var result = [];
        $.each(list, function (i, e) {
            if ($.inArray(e, result) == -1)
                result.push(e);
        });
        return result;
    }

    function autoGeneratedHtmlPreCode(dataInputArray, dataOutputArray) {       
        if (dataInputArray[index].toLowerCase().includes("<pre><code")) {
            var preCodeArr = [];
            
            var tagStart = dataInputArray[index].substring(0, dataInputArray[index].indexOf("\">") + 2);
            var tagStartNext = trimSpace(dataInputArray[index].replace(tagStart, ""));
            if (tagStartNext != "") {
                preCodeArr.push(tagStart + htmlEntities(tagStartNext));
            }
            index++;
            
            for (index; index < dataInputArray.length; index++) {
                if (dataInputArray[index].includes("</code></pre>")) {
                    preCodeArr.push("</code></pre>");
                    var endStr = trimSpace(dataInputArray[index].replace("</code></pre>", ""));
                    if (endStr != "") {
                        preCodeArr.push("<p>" + endStr + "</p>");
                    }

                    dataOutputArray.push(preCodeArr.join("\n"));
                    index++;
                    break;
                } else {
                    if (tagStartNext == "") {
                        tagStartNext = htmlEntities(dataInputArray[index])
                        preCodeArr.push(tagStart + tagStartNext);
                    } else {
                        preCodeArr.push(htmlEntities(dataInputArray[index]));                    
                    }
                }
            }
        } else {
            return true;
        }
        
        if (index < dataInputArray.length) {
            return true;
        }
        
        return false;
    }

</script>