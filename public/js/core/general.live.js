//--
window.speechSynthesis;

//--
let ai = new AI("Sliver");
let divNotification = $("#divNotification");

let interval;
let elWords;

//--
let englishWordTemplateVersion1 = "<div class=\"englishWord col-auto border rounded text-secondary pt-2 pb-2 pl-3 pr-3 m-1 button-style-1\">§1</div>";

//===========================
words();
wordsTemplate();
wordsTemplate1();

initGuiWhiteQuiz();
initGuiWhiteQuizSentence();

//===========================
//== PROCESS EVENT ==
function loadEventEnglishTranslate() {
    //== FOR VIEWS-BOOK ==
    $('.wordsTranslate').click(function () {
        let elWordsTemplate = $(this).parent().get(0);
        let elWords = $(this).next()[0];
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

    });

    $('.btEnglishTranslate').click(function () {
        eventEnglishTranslate($(this));
    });

    //== FOR VIEWS-ADMIN ==
    $('#divScreen').on('click', '.btEnglishTranslate', function () {
        eventEnglishTranslate($(this));
    });

}

function loadEventEnglishRepeat() {
    $(".wordsRepeat").click(function () {
        //$("#msg").text(elWords === $(this).next()[0]);
        if (elWords !== $(this).next()[0]) {
            elWords = $(this).next()[0];
            interval = clearInterval(interval);
        }

        if (interval) {
            //alert("Repeat.");
            synth.cancel();
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
}

function loadEventEnglishShowWordByWord() {
    //== FOR VIEWS-BOOK ==
    $('.btShowWordByWord').click(function () {
        eventShowWordByWord($(this));
    });
    
    //== FOR VIEW-ADMIN ==
    $('#divScreen').on('click', '.btShowWordByWord', function () {
        eventShowWordByWord($(this));
    });
    
}

function eventShowWordByWord(el) {
    //alert("btShowWordByWordAction.");
    let line = null;
    let words = null;
    let wordsAutoGenerate = null;
    let parentElement = $($($(el).parent().get(0)).parent().get(0));
    let divShowWordByWord = parentElement.find(".divShowWordByWord");
    let spanEnglish = parentElement.find(".divEnglishLine > .spanEnglish");
    //console.log(englishWordsElement.attr('class'));    


    if (divShowWordByWord) {
        //--
        divShowWordByWord.text("");
        line = spanEnglish.text();
        words = line.match(/\b(\w+)\b/g);

        if (words) {
            wordsAutoGenerate = words.map(function (x) {
                return englishWordTemplateVersion1.replace('§1', x);
            });
        }

        if (Array.isArray(wordsAutoGenerate)) {
            line = trimSpace(wordsAutoGenerate.join(" "));
        } else {
            line = englishWordTemplateVersion1.replace('§1', spanEnglish.text());
        }
        divShowWordByWord.html(line);
        //--        

        if (divShowWordByWord.hasClass('d-none')) {
            divShowWordByWord.removeClass("d-none");
            $(el).addClass("font-weight-bold");
        } else {
            divShowWordByWord.addClass("d-none");
            $(el).removeClass("font-weight-bold");
        }
        
        divShowWordByWord.on('click', '.englishWord', function () {
            let text = $(this).text();
            ai.speak(text);
        });        
    }

}

function eventEnglishTranslate(el) {
    let parentElement = $($(el).parent().get(0));
    let divEnglishLine = parentElement.find(".divEnglishLine");
    let spanVietnamese = divEnglishLine.find(".spanVietnamese");

    if (spanVietnamese) {
        if (spanVietnamese.hasClass('d-none')) {
            spanVietnamese.removeClass("d-none");
            $(this).addClass("font-weight-bold");
        } else {
            spanVietnamese.addClass("d-none");
            $(this).removeClass("font-weight-bold");
        }
    }
}

//===========================
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

//===========================
function processingRegexReplace(str, strRegexFind, strRegexReplace) {
    //console.log(str + " - " + strRegexFind + " - " + strRegexReplace);
    if (strRegexFind !== "" && isRegexValid(strRegexFind)) {
        let regexFind = new RegExp(strRegexFind, "g");
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
    let text = $(el).text();
    $(el).text("");

    let arrQuiz = text.split("↔");
    let arrQuizWord = arrQuiz[0].split("↨");
    let quizAnswer = trimSpace(arrQuiz[1]);

    $(el).append('<div class="border border-dark rounded bg-dark text-white p-2 m-1 w-100 font-weight-light quizAnswerChoicesShow" style="min-height: 77px;"></div>');
    for (let i = 0; i < arrQuizWord.length; i++) {
        $(el).append('<div class="border p-2 m-1 w-100 quizAnswerChoices" onclick="quizSentenceTemplate1Answer(this)">' + arrQuizWord[i].trim() + '</div>');
    }
    $(el).append('<div class="quizAnswer d-none">' + quizAnswer + '</div>');
}

function quizSentenceTemplate1Answer(el) {
    let strAnswer = trimSpace($($($(el).parent().get(0)).children(".quizAnswer")[0]).text());
    let elAnswerChoicesShow = $($(el).parent().get(0)).children(".quizAnswerChoicesShow")[0];
    let strAnswerChoices = trimSpace($(elAnswerChoicesShow).text() + ' ' + $(el).text());

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
    let elementParent = element.parent();
    let typeAnswer = 'single';
    let totalCorrectAnswers = 0;
    let chooseCorrectAnswers = 0;

    elementParent.children('.answer').each(function () {
        let answerValue = $(this).attr("answerValue");
        totalCorrectAnswers = totalCorrectAnswers + (answerValue * 1);
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
    let answerValue = element.attr("answerValue");
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

//============================
//============================
//===========================
function loadAi() {
    ai = new AI("Sliver");

    if (ai.getStatus() === 1) {
        let patternExcludeSpeakWords = "[â†’|*|_|-|→|/|/]";

        //== LOAD VOICE ==
        let divEnglishLine = $(".divEnglishLine");
        divEnglishLine.removeAttr('onclick');

        let divWords = $(".words");
        divWords.removeAttr('onclick');

        let divWordsContent = $(".wordsContent");
        divWordsContent.removeAttr('onclick');
        


        let divPlayCircle = $(".display-4.w-100");
        if (divPlayCircle) {
            divPlayCircle.each(function (index) {
                //console.log("index: " + index);
                let script = $(this).attr("onclick");
                //console.log(script);

                if (script) {
                    $(this).removeAttr('onclick');
                    let text = script.replace("personSpeak('", "");
                    text = text.replace("');", "");
                    text = text.split("↨")[0];

                    $(this).on('click', function () {
                        text = processingRegexReplace(text, patternExcludeSpeakWords, "");
                        text = trimSpace(text);
                        ai.speak(text);
                    });

                }

            });

        }


        divWordsContent.on('click', function () {
            let element = $(this);
            let text = "";
            let textHtml = "";

            if (element.children().length == 0) {
                text = element.text();
            } else {
                let spanEnglish = element.find(".words-english");
                if (spanEnglish) {
                    text = spanEnglish.text();
                    textHtml = spanEnglish.html();
                    if (textHtml.startsWith("<b>") && (textHtml.lastIndexOf(":</b>") < textHtml.length)) {
                        let spanEnglishBold = $(spanEnglish.children("b")[0]);
                        if (spanEnglishBold.text().split(" ").length < 4) {
                            text = text.replace(spanEnglishBold.text(), "");
                        }
                    }
                }

                let spanVietnamese = element.find(".words-vietnamese");
                if (spanVietnamese) {
                    spanVietnamese.addClass("d-none");
                }
            }

            text = processingRegexReplace(text, patternExcludeSpeakWords, "");
            text = trimSpace(text);
            ai.speak(text);
        });

        divWords.on('click', function () {
            let element = $(this);
            let text = "";
            let textHtml = "";

            if (element.children().length == 0) {
                text = element.text();
            } else {
                let spanEnglish = element.children("span:first");
                if (spanEnglish) {
                    text = spanEnglish.text();
                    textHtml = spanEnglish.html();
                    if (textHtml.startsWith("<b>") && (textHtml.lastIndexOf(":</b>") < textHtml.length)) {
                        let spanEnglishBold = $(spanEnglish.children("b")[0]);
                        if (spanEnglishBold.text().split(" ").length < 4) {
                            text = text.replace(spanEnglishBold.text(), "");
                        }
                    }
                }
            }

            text = processingRegexReplace(text, patternExcludeSpeakWords, "");
            text = trimSpace(text);
            ai.speak(text);

        });

        divEnglishLine.on('click', function () {
            let element = $(this);
            let text = "";
            let textHtml = "";

            if (element.children().length == 0) {
                text = element.text();
            } else {
                let spanEnglish = element.find(".spanEnglish");
                if (spanEnglish) {
                    text = spanEnglish.text();
                    textHtml = spanEnglish.html();
                    if (textHtml.startsWith("<b>") && (textHtml.lastIndexOf(":</b>") < textHtml.length)) {
                        let spanEnglishBold = $(spanEnglish.children("b")[0]);
                        if (spanEnglishBold.text().split(" ").length < 4) {
                            text = text.replace(spanEnglishBold.text(), "");
                        }
                    }
                }

                let spanVietnamese = element.find(".spanVietnamese");
                if (spanVietnamese) {
                    spanVietnamese.addClass("d-none");
                }
            }

            text = processingRegexReplace(text, patternExcludeSpeakWords, "");
            text = trimSpace(text);
            ai.speak(text);
        });
    } else {
        divNotification.text("Can't load AI!");
        console.log("Can't load AI!");
    }

}

function loadGui() {
    let divWordsRepeat = $(".wordsRepeat");
    divWordsRepeat.removeClass("d-flex");
    divWordsRepeat.addClass("d-none");
}

function ready() {
    //--
    loadAi();
    loadGui();
    //--
    loadEventEnglishTranslate();
    loadEventEnglishRepeat();
    loadEventEnglishShowWordByWord();

}

function beforeUnload() {

}

function unload() {

}

//============================
//== PAGE READY EVENT ==
$(function () {
    ready();
});

//== PAGE BEFORE UNLOAD EVENT ==
$(window).on('beforeunload', function () {

});

//== PAGE BEFORE UNLOAD ==
$(window).on('beforeunload', function () {
    ai.getSynth().cancel();
    ai = null;
});