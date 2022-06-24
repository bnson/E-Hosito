
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 * Reference 
 * + https://codepen.io/pmk/pen/mKxjzz?editors=1010 
 * + https://codepen.io/iPawan/pen/rNOXbZa
 */

var person = new Object();
var synth = null;
var speechTimeOut;

const languagesSelect = $("#languages");
const voicesSelect = $("#voices");

const playButton = $("#playButton");
const pauseButton = $("#pauseButton");
const stopButton = $("#stopButton");
const taInput = $("#taInput");
const messageDiv = $("#messageDiv");
const utterance = new SpeechSynthesisUtterance();

const wordEnglish = $(".wordEnglish");
const displayEachWords = $(".displayEachWords");

//====
function convertToHtml() {
    var dataInput = taInput.val();
    //var dataInputArray = dataInput.split(/\r?\n/);
    var dataInputArray = dataInput.match(/[^\r\n.?!]+[\r\n.?!]+(\s)+[\])'"`’”]*|.+/g);
    var dataOutput;
    var dataOutputArray = [];


    var englishRowTemplateVersion1 = "" +
        "<div class=\"englishRowTemplateVersion1 col-12\">\n" +
        "	<div class=\"row\">\n" +
        "		<div onclick=\"displayEachWordsAction(this)\" class=\"displayEachWords col-auto border p-2 m-1 d-flex align-items-center justify-content-center\">\n" +
        "			<i class=\"fab fa-buromobelexperte fa-2x text-secondary\"></i>\n" +
        "		</div>\n" +
        "		<div onclick=\"personRead(this)\" class=\"col englishLines border p-2 m-1 d-flex align-items-center button-style-1\">\n" +
        "			<span class=\"english\">§1</span>\n" +
        "			<span class=\"pronounce d-none font-weight-light font-italic w-100\">§2</span>\n" +
        "			<span class=\"vietnamese d-none font-weight-bold text-primary w-100\">§3</span>\n" +
        "		</div>\n" +
        "	</div>\n" +
        "	<div class=\"row englishWords d-none\">\n" +
        "		§4\n" +
        "	</div>\n" +
        "</div>";
    
    var englishWordTemplateVersion1 = "<div onclick=\"personRead(this)\" class=\"englishWord border rounded text-secondary pt-2 pb-2 pl-3 pr-3 m-1 button-style-1\">§1</div>";

    var line;
    var words;
    var wordsAutoGenerate;
    
    if (dataInput) {
        for (index = 0; index < dataInputArray.length; index++) {
            line = "";
            words = null;
            wordsAutoGenerate = null;            
            
            line = processingSpecialCharacter(dataInputArray[index]);
            if (line != "") {
                //==
                var lineArray = line.split("↨");
                
                line = englishRowTemplateVersion1.replace('§1', lineArray[0]);
                
                words = lineArray[0].match(/\b(\w+)\b/g);
                if (words) {
                    wordsAutoGenerate = words.map(function(x){return englishWordTemplateVersion1.replace('§1', x);});
                }
                if (Array.isArray(wordsAutoGenerate)) {
                    line = line.replace('§4', trimSpace(wordsAutoGenerate.join(" ")));
                } else {
                    line = line.replace('§4', englishWordTemplateVersion1.replace('§1', lineArray[0]));
                }               

                if (lineArray.length > 1) {
                    line = line.replace('§2', lineArray[1]);
                }
                if (lineArray.length > 2) {
                    line = line.replace('§3', lineArray[1]);
                    line = line.replace('pronounce d-none', 'pronounce');
                }

                dataOutputArray.push(line);
            }

        }

        dataOutput = dataOutputArray.join("\n");
        $('#screen').html(dataOutput);
    } else {
        $('#screen').html("");
    }

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

function personRead(el) {
    if (synth) {
        var englishLinesElements = $(el);
        var textRead = "";
        
        if (englishLinesElements.hasClass('englishLines')) {
            textRead = $(englishLinesElements.children()[0]).text();            
        }
        
        if (englishLinesElements.hasClass('englishWord')) {
            textRead = englishLinesElements.text();            
        }
        
        if (textRead) {
            textRead = processingRegexReplace(textRead, "[â†’|*|_|-]", "");
            textRead = processingRegexReplace(textRead, "^[^:]{0,8}: ", "");
            textRead = trimSpace(textRead);

            if (synth.speaking) {
                synth.cancel();
            }

            //console.log("person.voice.name: " + person.voice.name);
            //var utterance = new SpeechSynthesisUtterance();
            utterance.voice = person.voice;
            utterance.lang = person.voice.lang;
            //utterance.pitch = pitch.value;
            //utterance.rate = rate.value;
            //utterance.volume = volume.value;
            utterance.text = textRead;

            synth.speak(utterance);                
        }

    } else {
        console.log("Can't read!");
    }
}

//== PAGE LOAD EVENT ==
(function () {

    if (!"speechSynthesis" in window) {
        document.write("Sorry. Your browser does not have speech support");
        return;
    }

    synth = window.speechSynthesis;
    console.log("speechSynthesis", synth);

    // Test to see when the "onvoiceschanged" is triggered
    synth.onvoiceschanged = function (e) {
        console.log("onvoiceschanged triggered", e);
    };

    // Chrome loads voices asynchronously.
    // Chrome and Edge loads the voices asynchronously (But not Firefox), so we have to wait for them to appear
    // Another way would be to use the "synth.onvoiceschanged" callback function.
    // But this have some drawbacks (In Chrome the event is triggered everytime you use a Google voice), so Im using the timer method.
    var waitTimerID = setInterval(function () {
        console.log("zzZZzz..");
        messageDiv.html("Khuyến nghị: Công cụ hoạt động tốt trên trình duyệt Chrome/Firefox.");

        // lang, default, name, voiceURI, localService
        var voices = synth.getVoices();
        //voices.lang = 'en-US';

        //====
        playButton.prop('disabled', false);
        pauseButton.prop('disabled', true);
        stopButton.prop('disabled', true);
        //====

        // We got voices!
        if (voices.length != 0) {
            // Clear the interval timer, as we have the data needed
            clearInterval(waitTimerID);

            
            var languageSelected = languagesSelect.find(":selected").val().toLowerCase();
            var voiceSelected = "";

            // Sort voices by language, then name (For Selectbox)
            voices.sort(function (obj1, obj2) {
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

            // Test if local storage is available
            var lStorage = null;
            if (!"localStorage" in window || typeof window.localStorage !== "undefined") {
                // Accessing "window.localStorage" on file: protocol, throws a "SCRIPT16389: Unspecified error." in MS Edge.
                // So it needs the extra "typeof" check.
                lStorage = window.localStorage;
            } else {
                console.log("No localstorage support available!");
            }

            // Remove existing items from selectbox
            voicesSelect.empty();
            // Populate selectbox
            for (var i = 0; i < voices.length; i++) {
                if (voices[i].lang.toLowerCase().startsWith(languageSelected)) {
                    var option = $('<option/>');
                    var optionTextContent = voices[i].name + " (" + voices[i].lang + ")";
                    var optionValue = voices[i].name;
                    option.attr({'value': optionValue}).text(optionTextContent);
                    voicesSelect.append(option);
                }
            }
            setVoiceDefault();

            //== Functions ==
            var setVoice = function () {
                voiceSelected = voicesSelect.find(":selected").val();
                person.voice = voices.find(x => x.name === voiceSelected);
                //console.log("voiceSelected: " + voiceSelected);
                //console.log("person.voice.name: " + person.voice.name);
                //console.log("person.voice: " + person.voice);

            };

            var speechTimer = function () {
                synth.pause();
                synth.resume();                    
                speechTimeOut = setTimeout(speechTimer, 10000);
            };
            
            // Get word at specific position. Used for extracting the word currently spoken
            // Source: https://stackoverflow.com/questions/5173316/finding-the-word-at-a-position-in-javascript
            var getWordAt = function (str, pos) {
                // Perform type conversions.
                str = String(str);
                pos = Number(pos) >>> 0;

                // Search for the word's beginning and end.
                var left = str.slice(0, pos + 1).search(/\S+$/);
                var right = str.slice(pos).search(/\s/);

                // The last word in the string is a special case.
                // else Return the word, using the located bounds to extract it from the string.
                return right < 0 ? str.slice(left) : str.slice(left, right + pos);
            };            
            
            // OnBoundary callback handler for when words is spoken
            // Note: Event is not triggered when "localService" is false (Like the Google voices in Chrome)
            var onBoundary = function (e) {
                if (e.name == "word") {
                    var word = getWordAt(e.target.text, e.charIndex);
                    messageDiv.html(word);
                }
            };            
            
            var playButtonAction = function () {

                var textRead = taInput.val();
                textRead = processingSpecialCharacter(textRead);

                taInput.prop('disabled', true);
                languagesSelect.prop('disabled', true);
                voicesSelect.prop('disabled', true);                

                if (synth.paused && synth.speaking) {
                    pauseButton.prop('disabled', false);
                    return synth.resume();
                }

                if (synth.speaking) {
                    synth.cancel();
                }

                //console.log("person.voice.name: " + person.voice.name);
                //var utterance = new SpeechSynthesisUtterance();
                utterance.voice = person.voice;
                utterance.lang = person.voice.lang;
                //utterance.pitch = pitch.value;
                //utterance.rate = rate.value;
                //utterance.volume = volume.value;
                utterance.text = textRead;

                if (person.voice.localService) {
                    pauseButton.prop('disabled', false);
                    clearTimeout(speechTimeOut);
                    utterance.onboundary = onBoundary;
                    
                } else {
                    speechTimeOut = setTimeout(speechTimer, 10000);
                    pauseButton.prop('disabled', true);
                    messageDiv.html("😞 Giọng nói này không hỗ trợ tạm dừng (pause).");
                    
                }

                synth.speak(utterance);
                
                playButton.prop('disabled', true);
                stopButton.prop('disabled', false);
            };

            var pauseButtonAction = function () {
                if (synth.speaking) {
                    synth.pause();
                }
                
                playButton.prop('disabled', false);
                pauseButton.prop('disabled', true);
                stopButton.prop('disabled', false);                
            };
            
            var stopButtonAction = function () {
                synth.resume();
                synth.cancel();                
                clearTimeout(speechTimeOut);
                
                playButton.prop('disabled', false);
                pauseButton.prop('disabled', true);
                stopButton.prop('disabled', true);
                
                taInput.prop('disabled', false);
                languagesSelect.prop('disabled', false);
                voicesSelect.prop('disabled', false);                
            };
                    
            var languagesSelectOnChange = function () {
                //console.log("languagesSelectOnChange");
                languageSelected = languagesSelect.find(":selected").val().toLowerCase();
                voicesSelect.empty();
                for (var i = 0; i < voices.length; i++) {
                    if (voices[i].lang.toLowerCase().startsWith(languageSelected)) {
                        var option = $('<option/>');
                        var optionTextContent = voices[i].name + " (" + voices[i].lang + ")";
                        var optionValue = voices[i].name;
                        option.attr({'value': optionValue}).text(optionTextContent);
                        voicesSelect.append(option);
                    }
                }
                setVoiceDefault();
                //----
                setVoice();
            };

            var voicesSelectOnChange = function () {
                //console.log("voicesSelectOnChange");
                setVoice();
            };

            //--
            languagesSelect.on("change", languagesSelectOnChange);
            voicesSelect.on("change", voicesSelectOnChange);
            playButton.on("click", playButtonAction);
            pauseButton.on("click", pauseButtonAction);
            stopButton.on("click", stopButtonAction);
            //--
            taInput.keyup(function () {
                convertToHtml();
            });            
            //--
            utterance.addEventListener("end", () => {
                playButton.prop('disabled', false);
                pauseButton.prop('disabled', true);
                stopButton.prop('disabled', true);
        
                taInput.prop('disabled', false);
                languagesSelect.prop('disabled', false);
                voicesSelect.prop('disabled', false);

                messageDiv.html("");
                clearTimeout(speechTimeOut);
            });            
            //====
            setVoice();
        }

    }, 10);

    //====

})();

//====
function setVoiceDefault() {
    if (voicesSelect.find('option[value="Microsoft David - English (United States)"]').length !== 0){
        voicesSelect.val('Microsoft David - English (United States)');
    } else if (voicesSelect.find('option[value="Microsoft Zira - English (United States)"]').length !== 0){
        voicesSelect.val('Microsoft Zira - English (United States)');
    } else if (voicesSelect.find('option[value="Microsoft Mark - English (United States)"]').length !== 0){
        voicesSelect.val('Microsoft Mark - English (United States)');
    }  
}

function displayEachWordsAction(el) {
    //alert("Hello.");
    var parentElement = $($(el).parent().get(0));
    var englishWordsElement = $(parentElement.next()[0]);
    //console.log(englishWordsElement.attr('class'));    
    
    if (englishWordsElement.hasClass('englishWords d-none')) {
        englishWordsElement.removeClass("d-none");
        $(el).addClass("font-weight-bold");
    } else {
        englishWordsElement.addClass("d-none");
        $(el).removeClass("font-weight-bold");
    }
}

//====
$(window).on('beforeunload', function () {
    synth.resume();
    synth.cancel();
    clearTimeout(speechTimeOut);
});



