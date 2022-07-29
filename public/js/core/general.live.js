//--
var utterance = new SpeechSynthesisUtterance();

var synth = window.speechSynthesis;
var systhVoices = [];
var synthLanguagesUnique = [];
var synthTimeOut;
var synthLanguageSelected = "";
var synthVoiceSelected = "";  
        
//--
var interval;
var elWords;

//--
var englishWordTemplateVersion1 = "<div onclick=\"speak(this)\" class=\"englishWord col-auto border rounded text-secondary pt-2 pb-2 pl-3 pr-3 m-1 button-style-1\">§1</div>";

//===========================
words();
wordsTemplate();
wordsTemplate1();

initGuiWhiteQuiz();
initGuiWhiteQuizSentence();

//===========================
function loadSpeechSynthesis() {   
    systhVoices = synth.getVoices();
    
    if (systhVoices) {
        
        //== Sort voices by language, then name ==
        systhVoices.sort(function (obj1, obj2) {
            if (obj1.lang < obj2.lang)
                return -1;
            if (obj1.lang > obj2.lang)
                return 1;
            if (obj1.name < obj2.name)
                return -1;
            if (obj1.name > obj2.name)
                return 1;
            return 0;
        });
        
        //== Get language and set to synthLanguagesUnique ==
        for (var i = 0; i < systhVoices.length; i++) {
            synthLanguagesUnique.push(systhVoices[i].lang);
        }
        synthLanguagesUnique = unique(synthLanguagesUnique);
        
        //== Set the language ==
        synthLanguageSelected = "en-US";
        
        //== Set the voice ==
        var arrPriorityVoices = [
            "Microsoft David - English (United States)",
            "Microsoft Zira - English (United States)",
            "Microsoft Mark - English (United States)",
            "English United States (en_us)",
            "English United Kingdom (en_GB)"
        ];
        
        synthVoiceSelected = systhVoices[0];
        for (var i = 0; i < systhVoices.length; i++) {
            if (systhVoices[i].lang == synthLanguageSelected) {
                if(jQuery.inArray(systhVoices[i].name, arrPriorityVoices) != -1) {
                    synthVoiceSelected = systhVoices[i];
                    break;
                }
            }
        }

        synthTimer();
        
        //----
        utterance.addEventListener("end", () => {
            clearTimeout(synthTimeOut);
        });        
        
    } else {
        console.log("Your browser doesn't support voice.");
    }
}

function synthTimer() {
    synth.pause();
    synth.resume();
    synthTimeOut = setTimeout(synthTimer, 10000);
}

function loadEventEnglishTranslate() {
    //== FOR VIEWS-BOOK ==
    $('.wordsTranslate').click(function () {
        var elWordsTemplate = $(this).parent().get(0);
        var elWords = $(this).next()[0];
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
    var line = null;
    var words = null;
    var wordsAutoGenerate = null;
    var parentElement = $($($(el).parent().get(0)).parent().get(0));
    var divShowWordByWord = parentElement.find(".divShowWordByWord");
    var spanEnglish = parentElement.find(".divEnglishLine > .spanEnglish");
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
    }

}

function eventEnglishTranslate(el) {
    var parentElement = $($(el).parent().get(0));
    var divEnglishLine = parentElement.find(".divEnglishLine");
    var spanVietnamese = divEnglishLine.find(".spanVietnamese");

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
function read(el) {
    synth.cancel();
    if (interval) {
        interval = clearInterval(interval);
    }
    $($(el).children()[4]).addClass("d-none");
    //alert($($(el).children()[0]).text());
    speak($(el).children()[0]);
}

function personRead(el, type) {
    synth.cancel();
    
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
    var voices = synth.getVoices();
    var speech = new SpeechSynthesisUtterance();
    speech.lang = "en-US";
    speech.text = msg;
    //speech.voice = voices[0];
    speech.volume = 1;
    //speech.rate = 0;
    //speech.pitch = 0;

    synth.speak(speech);
}

function speak(el) {
    //-- Old code, will be remove late.
    synth.cancel();
    
    if (synth) {
        var element = $($(el));
        var text = "";

        if (synth.speaking) {
            synth.cancel();
        }

        if (element.children().length == 0) {
            text = element.text();
        } else {
            var spanEnglish = element.find(".spanEnglish");                        
            if (spanEnglish) {
                text = spanEnglish.text();
            }
            
            var spanVietnamese = element.find(".spanVietnamese");
            if (spanVietnamese) {
                spanVietnamese.addClass("d-none");
            }
        }

        if (text) {
            text = processingRegexReplace(text, "[â†’|*|_|-]", "");
            text = processingRegexReplace(text, "^[^:]{0,8}: ", "");
            text = trimSpace(text);

            //console.log("person.voice.name: " + person.voice.name);
            //var utterance = new SpeechSynthesisUtterance();
            utterance.voice = synthVoiceSelected;
            utterance.lang = synthLanguageSelected;
            //utterance.pitch = pitch.value;
            //utterance.rate = rate.value;
            //utterance.volume = volume.value;
            utterance.text = text;


            if (synthVoiceSelected.localService) {
                //synthTimeOut = setTimeout(synthTimer, 10000);
                clearTimeout(synthTimeOut);
                //utterance.onboundary = onBoundary;                
            } else {
                synthTimeOut = setTimeout(synthTimer, 10000);
                console.log("😞 Voice don't support the pause.");
            }

            synth.speak(utterance);

        }

    } else {
        console.log("Can't read!");
    }

}

//===========================
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

//============================
function unique(list) {
    var result = [];
    $.each(list, function (i, e) {
        if ($.inArray(e, result) == -1)
            result.push(e);
    });
    return result;
}


//============================
function ready() {
    //==
    loadSpeechSynthesis();
    if (speechSynthesis.onvoiceschanged !== undefined) {
        speechSynthesis.onvoiceschanged = loadSpeechSynthesis;
    }
    
    //==
    loadEventEnglishTranslate();
    loadEventEnglishRepeat();
    loadEventEnglishShowWordByWord();

}

function beforeUnload() {

}

function unload() {

}

//============================
//== PAGE LOAD EVENT ==
$(document).ready(function () {
    ready();
});

//== PAGE BEFORE UNLOAD EVENT ==
$(window).on('beforeunload', function () {

});

//== PAGE UNLOAD EVENT ==
$(window).on('unload', function () {
    synth.resume();
    synth.cancel();
    clearTimeout(synthTimeOut);
});