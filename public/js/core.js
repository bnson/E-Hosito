var interval;
var elWords;

//===========================
words();
wordsTemplate();
wordsTemplate1();

initGuiWhiteQuiz();
initGuiWhiteQuizSentence();

//===========================
//$(".wordsTranslate").on('mousedown', function () {
//    elWords = $(this).next()[0];
//
//    //timeoutId = setTimeout(myFunction, 1000);
//    //alert("Hello.");
//    $($($(elWords).next()[0]).children()[4]).removeClass("d-none");
//
//}).on('mouseup mouseleave', function () {
//    //clearTimeout(timeoutId);
//    $($($(elWords).next()[0]).children()[4]).addClass("d-none");
//});

$('.wordsTranslate').click(function () {
    //alert("Hello.");
    elWordsTemplate = $(this).parent().get(0);
    elWords = $(this).next()[0];
    //console.log($(elWordsTemplate).attr('class'));

    if ($(elWordsTemplate).hasClass('wordsTemplate2')) {
        if ($($($(elWords).next()[0]).children()[2]).hasClass("d-none")) {
            $($($(elWords).next()[0]).children()[2]).removeClass("d-none");
        } else {
            $($($(elWords).next()[0]).children()[2]).addClass("d-none");
        }
    } else {
        if ($($($(elWords).next()[0]).children()[4]).hasClass("d-none")) {
            $($($(elWords).next()[0]).children()[4]).removeClass("d-none");
        } else {
            $($($(elWords).next()[0]).children()[4]).addClass("d-none");
        }
    }



//    setTimeout(function () {
//         $($($(elWords).next()[0]).children()[4]).addClass("d-none");
//    }, 5000);

});

//============================

//===========================
$(".wordsRepeat").click(function () {
    //$("#msg").text(elWords === $(this).next()[0]);
    if (elWords !== $(this).next()[0]) {
        elWords = $(this).next()[0];
        interval = clearInterval(interval);
    }

    if (interval) {
        //alert("Repeat.");
        window.speechSynthesis.cancel();
        interval = clearInterval(interval);
    } else {
        //alert("Repeat stop.");
        elWords.click();
        interval = setInterval(function () {
            speak($(elWords).children()[0]);
            //personRead($(elWords).children()[0], 1);
        }, 4000);

    }
}
);

function words() {
    $(".words").addClass('col border p-2 mb-2');
    $(".words").before('<div class="wordsTranslate col-auto border p-2 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fa fa-language fa-2x text-secondary" aria-hidden="true"></i></div>');
    $(".words").before('<div class="wordsRepeat col-auto border pt-2 pb-2 pl-3 pr-3 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fas fa-sync-alt text-secondary"></i></div>');
    $(".words").after('<div class="w-100"></div>');
    $('.words').removeAttr('onclick');
    $('.words').attr('onClick', 'read(this);');
}

function wordsTemplate() {
    $(".wordsTemplate").addClass('col border p-2 mb-2');
    $(".wordsTemplate").before('<div class="wordsTranslate col-auto border p-2 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fa fa-language fa-2x text-secondary" aria-hidden="true"></i></div>');
    $(".wordsTemplate").before('<div class="wordsRepeat col-auto border pt-2 pb-2 pl-3 pr-3 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fas fa-sync-alt text-secondary"></i></div>');
    $(".wordsTemplate").after('<div class="w-100"></div>');
    $('.wordsTemplate').removeAttr('onclick');
    $('.wordsTemplate').attr('onClick', 'personRead(this, 0);');
}

function wordsTemplate1() {
    $(".wordsTemplate1").addClass('col border p-2 mb-2');
    $(".wordsTemplate1").before('<div class="wordsTranslate col-auto border p-2 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fa fa-language fa-2x text-secondary" aria-hidden="true"></i></div>');
    $(".wordsTemplate1").before('<div class="wordsRepeat col-auto border pt-2 pb-2 pl-3 pr-3 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fas fa-sync-alt text-secondary"></i></div>');
    $(".wordsTemplate1").after('<div class="w-100"></div>');
    $('.wordsTemplate1').removeAttr('onclick');
    $('.wordsTemplate1').attr('onClick', 'personRead(this, 1);');
}

function wordsTemplate2() {
    $(".wordsTemplate2").addClass('col border p-2 mb-2');
    $(".wordsTemplate2").prepend('<div class="wordsRepeat col-auto border pt-2 pb-2 pl-3 pr-3 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fas fa-sync-alt text-secondary"></i></div>');
    $(".wordsTemplate2").prepend('<div class="wordsTranslate col-auto border p-2 mr-2 mb-2 d-flex align-items-center justify-content-center"><i class="fa fa-language fa-2x text-secondary" aria-hidden="true"></i></div>');
    $(".wordsTemplate2").after('<div class="w-100"></div>');
    $('.wordsTemplate2').removeAttr('onclick');
    $('.wordsTemplate2').attr('onClick', 'personRead(this, 1);');
}

function read(el) {
    window.speechSynthesis.cancel();
    if (interval) {
        interval = clearInterval(interval);
    }
    $($(el).children()[4]).addClass("d-none");
    //alert($($(el).children()[0]).text());
    speak($(el).children()[0]);
}

function personRead(el, type) {
    window.speechSynthesis.cancel();
    if (interval) {
        interval = clearInterval(interval);
    }

    elWordsTemplate = $(el).parent().get(0);
    if ($(elWordsTemplate).hasClass('wordsTemplate2')) {
        $($(el).children()[2]).addClass("d-none");
    } else {
        $($(el).children()[4]).addClass("d-none");
        //alert($($(el).children()[0]).text());
    }

    var textRead = $($(el).children()[0]).text();
    textRead = processingRegexReplace(textRead, "[→|*|_|-]", "");
    if (type > 0) {
        textRead = processingRegexReplace(textRead, "^[^:]+: ", "");
        personSpeak(textRead);
    } else {
        personSpeak(textRead);
    }
}

function personSpeak(text) {
    var msg = trimSpace(text);
    var voices = window.speechSynthesis.getVoices();
    var speech = new SpeechSynthesisUtterance();
    speech.lang = "en-US";
    speech.text = msg;
    //speech.voice = voices[0];
    speech.volume = 1;
    //speech.rate = 0;
    //speech.pitch = 0;

    window.speechSynthesis.speak(speech);
}


function speak(el) {
    var msg = $(el).text();
    msg = processingRegexReplace(msg, "[→|*|_|-]", "");
    msg = processingRegexReplace(msg, "^[^:]+: ", "");

    var voices = window.speechSynthesis.getVoices();
    var speech = new SpeechSynthesisUtterance();
    speech.lang = "en-US";
    speech.text = msg;
    //speech.voice = voices[0];
    speech.volume = 1;
    //speech.rate = 0;
    //speech.pitch = 0;

    window.speechSynthesis.speak(speech);
}

function processingRegexReplace(str, strRegexFind, strRegexReplace) {
    //console.log(str + " - " + strRegexFind + " - " + strRegexReplace);
    if (strRegexFind !== "" && isRegexValid(strRegexFind)) {
        var regexFind = new RegExp(strRegexFind, "g");
        str = str.replace(regexFind, strRegexReplace);
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

function trimSpace(str) {
    return str.trim().replace(/\s+/g, ' ');
}

//============================
//== QUIZ ====================

//Example: https://ehosito.com/Book/loadBookContent/12/3/412
function initGuiWhiteQuizSentence() {
    $(".quizMakeSentence").each(function () {
        initGuiWhiteQuizSentenceAnswer(this);
    });
}

function initGuiWhiteQuizSentenceAnswer(el) {
    var text = $(el).text();
    $(el).text("");

    var arrQuiz = text.split("↔");
    var arrQuizWord = arrQuiz[0].split("↨");
    var quizAnswer = trimSpace(arrQuiz[1]);

    $(el).append('<div class="border border-dark rounded bg-dark text-white p-2 m-1 w-100 font-weight-light quizAnswerChoicesShow" style="min-height: 77px;"></div>');
    for (var i = 0; i < arrQuizWord.length; i++) {
        $(el).append('<div class="border p-2 m-1 w-100 quizAnswerChoices" onclick="quizSentenceTemplate1Answer(this)">' + arrQuizWord[i].trim() + '</div>');
    }
    $(el).append('<div class="quizAnswer d-none">' + quizAnswer + '</div>');
}

function quizSentenceTemplate1Answer(el) {
    var strAnswer = trimSpace($($($(el).parent().get(0)).children(".quizAnswer")[0]).text());
    var elAnswerChoicesShow = $($(el).parent().get(0)).children(".quizAnswerChoicesShow")[0];
    var strAnswerChoices = trimSpace($(elAnswerChoicesShow).text() + ' ' + $(el).text());

    $(el).parent().children('div').each(function () {
        if ($(this).hasClass('bg-danger text-white')) {
          $(this).removeClass('bg-danger text-white');
        }        
    });

    //console.log(strAnswer);
    //console.log(strAnswerChoices);
    strAnswer = strAnswer.toLowerCase();
    strAnswerChoices = strAnswerChoices.toLowerCase();
    
    if (strAnswer == trimSpace($(elAnswerChoicesShow).text())) {
        alertify.alert("<b>★ Thầy Giáo :)...</b><br>Bạn trả lời đúng rồi, không cần chọn lại đâu.");
    } else if (strAnswer.startsWith(strAnswerChoices)) {
        $(el).removeClass('bg-danger text-white');
        $(el).addClass('bg-primary text-white');
        $(elAnswerChoicesShow).text(strAnswerChoices);
    } else {
        $(el).addClass('bg-danger text-white');
        alertify.alert("<b>★ Thầy Giáo :)...</b><br>Bạn trả lời sai rồi, trả lời lại đê!");
    }
    
}

//============================
//== QUIZ ====================
function initGuiWhiteQuiz() {
    //console.log("[Command] MAKE QUIZ TEMPLATE 1.");
    //https://ehosito.com/Book/loadBookContent/12/8/299
    $('.quizGroup').children('.answer').each(function () {
        $(this).click(function (e) {
            initGuiWhiteQuizAnswer($(this));
        });
    });
    //===
    $('.quizTemplate1').children('.answer').each(function () {
        $(this).click(function (e) {
            initGuiWhiteQuizAnswer($(this));
        });
    });
}

function initGuiWhiteQuizAnswer(element) {
    var elementParent = element.parent();
    var typeAnswer = 'single';
    var totalCorrectAnswers = 0;
    var chooseCorrectAnswers = 0;
    
    elementParent.children('.answer').each(function () {
        var answerValue = $(this).attr("answerValue");
        totalCorrectAnswers = totalCorrectAnswers + (answerValue*1);
    });
    //console.log(totalAnswersTrue);
    
    if (totalCorrectAnswers > 1) {
        typeAnswer = 'multiple';
    }
    //=== CLEAR ANSWER ===
    elementParent.children('div').each(function () {
        if (typeAnswer == 'single') {
            $(this).removeClass('bg-primary');
            $(this).removeClass('bg-danger');            
        } else {
            $(this).removeClass('bg-danger');   
        }
    });    
    //===
    var answerValue = element.attr("answerValue");
    if (answerValue == '1') {
        element.addClass('bg-primary');
    } else {
        if (typeAnswer == 'single') {
            $(element).addClass('bg-danger');
            alertify.alert("<b>★ Thầy Giáo <|>_<|></b><br>Bạn trả lời sai rồi, trả lời lại đê!");
        } else {
            chooseCorrectAnswers = elementParent.find('.bg-primary').length;
            
            //console.log(totalCorrectAnswers + " / " + chooseCorrectAnswers);
            if (totalCorrectAnswers != chooseCorrectAnswers) {
                $(element).addClass('bg-danger');
                alertify.alert("<b>★ Thầy Giáo <|>_<|></b><br>Bạn trả lời sai rồi, trả lời lại đê!");
            } else {
                alertify.alert("<b>★ Cô Giáo \\^0^/</b><br>Bạn trả lời đúng rồi, không cần chọn lại nhé!");
            }
        }
    }    
    
}