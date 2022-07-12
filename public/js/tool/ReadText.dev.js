
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 * Reference 
 * + https://codepen.io/pmk/pen/mKxjzz?editors=1010 
 * + https://codepen.io/iPawan/pen/rNOXbZa
 */

const languageBcp47 = {
    af: 'Afrikaans',
    af_ZA: 'Afrikaans (South Africa)',
    ar: 'Arabic',
    ar_AE: 'Arabic (U.A.E.)',
    ar_BH: 'Arabic (Bahrain)',
    ar_DZ: 'Arabic (Algeria)',
    ar_EG: 'Arabic (Egypt)',
    ar_IQ: 'Arabic (Iraq)',
    ar_JO: 'Arabic (Jordan)',
    ar_KW: 'Arabic (Kuwait)',
    ar_LB: 'Arabic (Lebanon)',
    ar_LY: 'Arabic (Libya)',
    ar_MA: 'Arabic (Morocco)',
    ar_OM: 'Arabic (Oman)',
    ar_QA: 'Arabic (Qatar)',
    ar_SA: 'Arabic (Saudi Arabia)',
    ar_SY: 'Arabic (Syria)',
    ar_TN: 'Arabic (Tunisia)',
    ar_YE: 'Arabic (Yemen)',
    az: 'Azeri (Latin)',
    az_AZ: 'Azeri (Azerbaijan)',
    be: 'Belarusian',
    be_BY: 'Belarusian (Belarus)',
    bg: 'Bulgarian',
    bg_BG: 'Bulgarian (Bulgaria)',
    bs_BA: 'Bosnian (Bosnia and Herzegovina)',
    ca: 'Catalan',
    ca_ES: 'Catalan (Spain)',
    cs: 'Czech',
    cs_CZ: 'Czech (Czech Republic)',
    cy: 'Welsh',
    cy_GB: 'Welsh (United Kingdom)',
    da: 'Danish',
    da_DK: 'Danish (Denmark)',
    de: 'German',
    de_AT: 'German (Austria)',
    de_CH: 'German (Switzerland)',
    de_DE: 'German (Germany)',
    de_LI: 'German (Liechtenstein)',
    de_LU: 'German (Luxembourg)',
    dv: 'Divehi',
    dv_MV: 'Divehi (Maldives)',
    el: 'Greek',
    el_GR: 'Greek (Greece)',
    en: 'English',
    en_AU: 'English (Australia)',
    en_BZ: 'English (Belize)',
    en_CA: 'English (Canada)',
    en_CB: 'English (Caribbean)',
    en_GB: 'English (United Kingdom)',
    en_IE: 'English (Ireland)',
    en_JM: 'English (Jamaica)',
    en_NZ: 'English (New Zealand)',
    en_PH: 'English (Republic of the Philippines)',
    en_TT: 'English (Trinidad and Tobago)',
    en_US: 'English (United States)',
    en_ZA: 'English (South Africa)',
    en_ZW: 'English (Zimbabwe)',
    eo: 'Esperanto',
    es: 'Spanish',
    es_AR: 'Spanish (Argentina)',
    es_BO: 'Spanish (Bolivia)',
    es_CL: 'Spanish (Chile)',
    es_CO: 'Spanish (Colombia)',
    es_CR: 'Spanish (Costa Rica)',
    es_DO: 'Spanish (Dominican Republic)',
    es_EC: 'Spanish (Ecuador)',
    es_ES: 'Spanish',
    es_GT: 'Spanish (Guatemala)',
    es_HN: 'Spanish (Honduras)',
    es_MX: 'Spanish (Mexico)',
    es_NI: 'Spanish (Nicaragua)',
    es_PA: 'Spanish (Panama)',
    es_PE: 'Spanish (Peru)',
    es_PR: 'Spanish (Puerto Rico)',
    es_PY: 'Spanish (Paraguay)',
    es_SV: 'Spanish (El Salvador)',
    es_US: 'Spanish (United States)',
    es_UY: 'Spanish (Uruguay)',
    es_VE: 'Spanish (Venezuela)',
    et: 'Estonian',
    et_EE: 'Estonian (Estonia)',
    eu: 'Basque',
    eu_ES: 'Basque (Spain)',
    fa: 'Farsi',
    fa_IR: 'Farsi (Iran)',
    fi: 'Finnish',
    fi_FI: 'Finnish (Finland)',
    fo: 'Faroese',
    fo_FO: 'Faroese (Faroe Islands)',
    fr: 'French',
    fr_BE: 'French (Belgium)',
    fr_CA: 'French (Canada)',
    fr_CH: 'French (Switzerland)',
    fr_FR: 'French (France)',
    fr_LU: 'French (Luxembourg)',
    fr_MC: 'French (Principality of Monaco)',
    gl: 'Galician',
    gl_ES: 'Galician (Spain)',
    gu: 'Gujarati',
    gu_IN: 'Gujarati (India)',
    he: 'Hebrew',
    he_IL: 'Hebrew (Israel)',
    hi: 'Hindi',
    hi_IN: 'Hindi (India)',
    hr: 'Croatian',
    hr_BA: 'Croatian (Bosnia and Herzegovina)',
    hr_HR: 'Croatian (Croatia)',
    hu: 'Hungarian',
    hu_HU: 'Hungarian (Hungary)',
    hy: 'Armenian',
    hy_AM: 'Armenian (Armenia)',
    id: 'Indonesian',
    id_ID: 'Indonesian (Indonesia)',
    is: 'Icelandic',
    is_IS: 'Icelandic (Iceland)',
    it: 'Italian',
    it_CH: 'Italian (Switzerland)',
    it_IT: 'Italian (Italy)',
    ja: 'Japanese',
    ja_JP: 'Japanese (Japan)',
    ka: 'Georgian',
    ka_GE: 'Georgian (Georgia)',
    kk: 'Kazakh',
    kk_KZ: 'Kazakh (Kazakhstan)',
    kn: 'Kannada',
    kn_IN: 'Kannada (India)',
    ko: 'Korean',
    ko_KR: 'Korean (Korea)',
    kok: 'Konkani',
    kok_IN: 'Konkani (India)',
    ky: 'Kyrgyz',
    ky_KG: 'Kyrgyz (Kyrgyzstan)',
    lt: 'Lithuanian',
    lt_LT: 'Lithuanian (Lithuania)',
    lv: 'Latvian',
    lv_LV: 'Latvian (Latvia)',
    mi: 'Maori',
    mi_NZ: 'Maori (New Zealand)',
    mk: 'FYRO Macedonian',
    mk_MK: 'FYRO Macedonian (Former Yugoslav Republic of Macedonia)',
    mn: 'Mongolian',
    mn_MN: 'Mongolian (Mongolia)',
    mr: 'Marathi',
    mr_IN: 'Marathi (India)',
    ms: 'Malay',
    ms_BN: 'Malay (Brunei Darussalam)',
    ms_MY: 'Malay (Malaysia)',
    mt: 'Maltese',
    mt_MT: 'Maltese (Malta)',
    nb: 'Norwegian (Bokm?l)',
    nb_NO: 'Norwegian (Bokm?l) (Norway)',
    nl: 'Dutch',
    nl_BE: 'Dutch (Belgium)',
    nl_NL: 'Dutch (Netherlands)',
    nn_NO: 'Norwegian (Nynorsk) (Norway)',
    ns: 'Northern Sotho',
    ns_ZA: 'Northern Sotho (South Africa)',
    pa: 'Punjabi',
    pa_IN: 'Punjabi (India)',
    pl: 'Polish',
    pl_PL: 'Polish (Poland)',
    ps: 'Pashto',
    ps_AR: 'Pashto (Afghanistan)',
    pt: 'Portuguese',
    pt_BR: 'Portuguese (Brazil)',
    pt_PT: 'Portuguese (Portugal)',
    qu: 'Quechua',
    qu_BO: 'Quechua (Bolivia)',
    qu_EC: 'Quechua (Ecuador)',
    qu_PE: 'Quechua (Peru)',
    ro: 'Romanian',
    ro_RO: 'Romanian (Romania)',
    ru: 'Russian',
    ru_RU: 'Russian (Russia)',
    sa: 'Sanskrit',
    sa_IN: 'Sanskrit (India)',
    se: 'Sami (Northern)',
    se_FI: 'Sami (Finland)',
    se_NO: 'Sami (Norway)',
    se_SE: 'Sami (Sweden)',
    sk: 'Slovak',
    sk_SK: 'Slovak (Slovakia)',
    sl: 'Slovenian',
    sl_SI: 'Slovenian (Slovenia)',
    sq: 'Albanian',
    sq_AL: 'Albanian (Albania)',
    sr_BA: 'Serbian (Bosnia and Herzegovina)',
    sr_SP: 'Serbian (Serbia and Montenegro)',
    sv: 'Swedish',
    sv_FI: 'Swedish (Finland)',
    sv_SE: 'Swedish (Sweden)',
    sw: 'Swahili',
    sw_KE: 'Swahili (Kenya)',
    syr: 'Syriac',
    syr_SY: 'Syriac (Syria)',
    ta: 'Tamil',
    ta_IN: 'Tamil (India)',
    te: 'Telugu',
    te_IN: 'Telugu (India)',
    th: 'Thai',
    th_TH: 'Thai (Thailand)',
    tl: 'Tagalog',
    tl_PH: 'Tagalog (Philippines)',
    tn: 'Tswana',
    tn_ZA: 'Tswana (South Africa)',
    tr: 'Turkish',
    tr_TR: 'Turkish (Turkey)',
    tt: 'Tatar',
    tt_RU: 'Tatar (Russia)',
    ts: 'Tsonga',
    uk: 'Ukrainian',
    uk_UA: 'Ukrainian (Ukraine)',
    ur: 'Urdu',
    ur_PK: 'Urdu (Islamic Republic of Pakistan)',
    uz: 'Uzbek (Latin)',
    uz_UZ: 'Uzbek (Uzbekistan)',
    vi: 'Vietnamese',
    vi_VN: 'Vietnamese (Viet Nam)',
    xh: 'Xhosa',
    xh_ZA: 'Xhosa (South Africa)',
    zh: 'Chinese',
    zh_CN: 'Chinese (PRC)',
    zh_HK: 'Chinese (Hong Kong)',
    zh_MO: 'Chinese (Macau)',
    zh_SG: 'Chinese (Singapore)',
    zh_TW: 'Chinese (Taiwan)',
    zu: 'Zulu',
    zu_ZA: 'Zulu (South Africa)'
};

//====
const languagesSelect = $("#languages");
const voicesSelect = $("#voices");
const panelInformation = $("#panelInformation");
const playButton = $("#playButton");
const pauseButton = $("#pauseButton");
const stopButton = $("#stopButton");
const taInput = $("#taInput");
const messageDiv = $("#messageDiv");
const ulVoicesSupport = $("#ulVoicesSupport");

const wordEnglish = $(".wordEnglish");
const displayEachWords = $(".displayEachWords");

const utterance = new SpeechSynthesisUtterance();
var synth = window.speechSynthesis;
var systhVoices = [];
var synthLanguagesUnique = [];

var speechTimeOut;
var person = new Object();

//====
function convertToHtml() {
    //console.log("convertToHtml");
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

    var englishWordTemplateVersion1 = "<div onclick=\"personRead(this)\" class=\"englishWord col-auto border rounded text-secondary pt-2 pb-2 pl-3 pr-3 m-1 button-style-1\">§1</div>";

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
                    wordsAutoGenerate = words.map(function (x) {
                        return englishWordTemplateVersion1.replace('§1', x);
                    });
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

function setLanguageDefault() {
    var arrPriorityLanguages = [
        "en-US",
        "en_US",
        "en-GB",
        "en_GB"
    ];
    
    languagesSelect.val(languagesSelect.find("option:first-child").val());
    for (var i = 0; i < arrPriorityLanguages.length; i++) {
        var optionFind = 'option[value="' + arrPriorityLanguages[i] + '"]';
        if (languagesSelect.find(optionFind).length !== 0) {
            languagesSelect.val(arrPriorityLanguages[i]);
            break;
        }
    }
    
//    if (languagesSelect.find('option[value="en-US"]').length !== 0) {
//        languagesSelect.val('en-US');
//    } else if (languagesSelect.find('option[value="en-GB"]').length !== 0) {
//        languagesSelect.val('en-GB');
//    } if (languagesSelect.find('option[value="en_US"]').length !== 0) {
//        languagesSelect.val('en_US');
//    } else if (languagesSelect.find('option[value="en_GB"]').length !== 0) {
//        languagesSelect.val('en_GB');
//    } else {
//        languagesSelect.val(languagesSelect.find("option:first-child").val());
//    }
}

function setVoiceDefault() {
    var arrPriorityVoices = [
        "Microsoft Zira - English (United States)",
        "Microsoft David - English (United States)",
        "Microsoft Mark - English (United States)",
        "English United States (en_us)",
        "English United Kingdom (en_GB)"
    ];
    
    voicesSelect.val(voicesSelect.find("option:first-child").val());
    for (var i = 0; i < arrPriorityVoices.length; i++) {
        var optionFind = 'option[value="' + arrPriorityVoices[i] + '"]';
        if (voicesSelect.find(optionFind).length !== 0) {
            voicesSelect.val(arrPriorityVoices[i]);
            break;
        }
    }
    
}

function load() {
    systhVoices = synth.getVoices();

    //====================================
    playButton.prop('disabled', false);
    pauseButton.prop('disabled', true);
    stopButton.prop('disabled', true);

    if (systhVoices) {
        var languageSelected = "";
        var voiceSelected = "";

        messageDiv.html("");
        languagesSelect.empty();
        voicesSelect.empty();

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

        //====
        for (var i = 0; i < systhVoices.length; i++) {
            synthLanguagesUnique.push(systhVoices[i].lang);

            var li = $('<li/>');
            if (systhVoices[i].localService) {
                li.text(systhVoices[i].lang + " - " + systhVoices[i].name + " (offline)");
            } else {
                li.text(systhVoices[i].lang + " - " + systhVoices[i].name + " (online)");
            }
            li.appendTo(ulVoicesSupport);

            var languageCode = systhVoices[i].lang.replace("-", "_");
            var languageName = languageBcp47[languageCode];

            if (!languageName) {
                languageBcp47[languageCode] = systhVoices[i].name + ' (' + systhVoices[i].lang + ')';
            }
        }
        synthLanguagesUnique = unique(synthLanguagesUnique);

        //== Set languages ==
        synthLanguagesUnique.forEach(language => {
            var option = $('<option/>');
            var languageName = languageBcp47[language.replace("-", "_")];

            if (languageName) {
                option.attr({'value': language}).text(languageName);
            } else {
                option.attr({'value': language}).text(language);
            }

            languagesSelect.append(option);

        });
        setLanguageDefault();

        //== Set voices ==
        languageSelected = languagesSelect.find(":selected").val();
        //languageSelected = languagesSelect.find(":selected").text();
        for (var i = 0; i < systhVoices.length; i++) {
            //panelInformation.append(systhVoices[i].name + "<br>");
            //----
            if (systhVoices[i].lang == languageSelected) {
                var option = $('<option/>');
                var optionTextContent = systhVoices[i].name + " (" + systhVoices[i].lang + ")";
                var optionValue = systhVoices[i].name;
                option.attr({'value': optionValue}).text(optionTextContent);
                voicesSelect.append(option);
            }
        }
        setVoiceDefault();

        //== Functions ==
        var setVoice = function () {
            voiceSelected = voicesSelect.find(":selected").val();
            person.voice = systhVoices.find(x => x.name === voiceSelected);
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

        var languagesSelectOnChange = function () {
            //console.log("languagesSelectOnChange");
            languageSelected = languagesSelect.find(":selected").val().toLowerCase();
            voicesSelect.empty();
            for (var i = 0; i < systhVoices.length; i++) {
                if (systhVoices[i].lang.toLowerCase().startsWith(languageSelected)) {
                    var option = $('<option/>');
                    var optionTextContent = systhVoices[i].name + " (" + systhVoices[i].lang + ")";
                    var optionValue = systhVoices[i].name;
                    option.attr({'value': optionValue}).text(optionTextContent);
                    voicesSelect.append(option);
                }
            }

            setVoiceDefault();
            setVoice();
        };

        var voicesSelectOnChange = function () {
            //console.log("voicesSelectOnChange");
            setVoice();
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

        //--
        languagesSelect.on("change", languagesSelectOnChange);
        voicesSelect.on("change", voicesSelectOnChange);
        playButton.on("click", playButtonAction);
        pauseButton.on("click", pauseButtonAction);
        stopButton.on("click", stopButtonAction);
        //--
        //taInput.on('keyup', convertToHtml);
        //taInput.on('propertychange keyup input paste', convertToHtml);
        taInput.on('input', convertToHtml);
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

    } else {
        messageDiv.html("Trình duyệt internet của bạn khônf hỗ trợ giọng nói đọc văn bảng.");
    }
    //====================================

}

//== PAGE LOAD EVENT ==
$(function () {
    load();
    if (speechSynthesis.onvoiceschanged !== undefined) {
        speechSynthesis.onvoiceschanged = load;
    }

});

//== BEFORE UNLOAD EVENT ==
$(window).on('beforeunload', function () {
    synth.resume();
    synth.cancel();
    clearTimeout(speechTimeOut);
});
