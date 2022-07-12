//====
const markdownTabRegExp = new RegExp("^◄.*►.*");

const pInput = $("#pInput");
const pOutput = $("#pOutput");
const taInput = $("#taInput");
const taHtml = $("#taHtml");
const divScreen = $("#divScreen");

//====
function load() {
    loadEventListener();
}

function loadEventListener() {
    //====
    Split(['#pInput', '#pOutput'], {
        elementStyle: (dimension, size, gutterSize) => ({
                'flex-basis': `calc(${size}% - ${gutterSize}px)`
            }),
        gutterStyle: (dimension, gutterSize) => ({
                'flex-basis': `${gutterSize}px`
            })
    });

    //====
    //taInput.on('keyup', convertToHtml);
    //taInput.on('propertychange keyup input paste', convertToHtml);
    taInput.on('input', convertToHtml);
}

function convertToHtml() {
    var dataInput = taInput.val();
    //var dataInputArray = dataInput.match(/[^\r\n.?!]+[\r\n.?!]+(\s)+[\])'"`’”]*|.+/g); //-- Don't allow empty line.
    //var dataInputArray = dataInput.match(/(^$)|[^\r\n.?!]+[.?!]+(\s)+[\])'"`’”]*|.+/gm); //-- Allow empty line
    var dataInputArray = dataInput.split(/\r?\n/);
    var dataOutput;
    var dataOutputArray = [];
    var line;

    if (dataInput) {
        for (index = 0; index < dataInputArray.length; index++) {
            line = processingSpecialCharacter(dataInputArray[index]);
            //console.log("Line: " + line);

            if (line) {
                line = autoAddHtmlTab(line);
                line = convertMarkdownToHtml(line);
                dataOutputArray.push(line);
            } else {
                dataOutputArray.push("<br>");
            }

        }

        dataOutput = dataOutputArray.join("\n");
        
        divScreen.html(dataOutput);
        taHtml.text(dataOutput);
    } else {
        divScreen.html("");
    }

}

function autoAddHtmlTab(line) {
    var lineNew = line;
    var nameInConverationPattern = /(^([^\s]+\s[^\s]+|[^\s]+):|↨([^\s]+\s[^\s]+|[^\s]+):)/g;
    var nameInConverationReplace = "<b>$1</b>";
    var nameInConverationExclude = ["Getting started:"];
    var status = true;
    
    for (var i = 0; i < nameInConverationExclude.length; i++) {
        //console.log("nameInConverationExclude[i]:" + nameInConverationExclude[i]);
        if (line.includes(nameInConverationExclude[i])) {
            status = false;
            break;
        }
    }
    
    //console.log("status:" + status);
    if (status) {
        //lineNew = line.replace(/(^([^\s]+\s[^\s]+|[^\s]+)|↨([^\s]+\s[^\s]+|[^\s]+):)/g, "<b>$1</b>");
        lineNew = line.replace(nameInConverationPattern, nameInConverationReplace);
        lineNew = lineNew.replace("<b>↨", "↨<b>");        
    }

    return lineNew;
}

function convertMarkdownToHtml(line) {
    var firstWord = line.split(" ")[0];

    if (firstWord.match(markdownTabRegExp)) {
        firstWord = firstWord.split("►")[0];
        firstWord = firstWord + "►";
    } else if (line.includes("↨")) {
        firstWord = "◄t-en►";
        line = firstWord + line;
        //console.log("firstWord: " + firstWord);
    }

    switch (firstWord) {
        case "◄h1►":
            line = addHtmlTab(line);
            break;
        case "◄t-en►":
            line = addEnglishRowTemplate(line);
            break;
        case "◄t-en-b►":
            line = addEnglishRowTemplate(line);
            break;
        default:
            line = addHtmlTab(line);
    }

    return line;
}

function addHtmlTab(line) {
    var firstWord = line.split(" ")[0];

    if (firstWord.match(markdownTabRegExp)) {
        line = trimSpace(line.replace(firstWord, ''));

        firstWord = firstWord.replace("◄", "<");
        firstWord = firstWord.replace("►", ">");

        line = trimSpace(firstWord + line + firstWord);

    } else {
        line = "<p>" + line + "</p>" + "\n";
    }
    return line;
}


function addEnglishRowTemplate(line) {
    var englishRowTemplateVersion1 = "" +
            "<div class=\"englishRowTemplateVersion1 col-12\">\n" +
            "	<div class=\"row\">\n" +
            "		<div class=\"btEnglishTranslate d-none col-auto border p-2 m-1 align-items-center justify-content-center\">\n" +
            "                   <i class=\"fa fa-language fa-2x text-secondary\"></i>\n" +
            "		</div>\n" +
            "		<div onclick=\"btReadRepeatAction(this)\" class=\"btReadRepeat d-none col-auto border p-2 m-1 align-items-center justify-content-center\">\n" +
            "                   <i class=\"fas fa-sync-alt text-secondary\"></i>\n" +
            "		</div>\n" +
            "		<div class=\"btShowWordByWord d-flex col-auto border p-2 m-1  align-items-center justify-content-center\">\n" +
            "			<i class=\"fab fa-buromobelexperte fa-2x text-secondary\"></i>\n" +
            "		</div>\n" +
            "		<div onclick=\"speak(this)\" class=\"divEnglishLine d-flex flex-wrap col border p-2 m-1 align-items-center button-style-1\">\n" +
            "			<span class=\"spanEnglish\">§1</span>\n" +
            "			<span class=\"spanPronounce d-none font-italic font-weight-light text-muted w-100\">§2</span>\n" +
            "			<span class=\"spanVietnamese d-none text-primary w-100\">§3</span>\n" +
            "		</div>\n" +
            "	</div>\n" +
            "	<div class=\"row divShowWordByWord d-none\">\n" +
            "	</div>\n" +
            "</div>";

    if (line.includes("◄t-en►")) {
        line = trimSpace(line.replace('◄t-en►', ''));

        var lineArray = line.split("↨");
        line = englishRowTemplateVersion1.replace('§1', lineArray[0]);

        if (lineArray.length > 1 && lineArray.length == 3) {
            line = line.replace('§2', lineArray[1]);
            line = line.replace('spanPronounce d-none', 'spanPronounce');
        }

        if ((lineArray.length > 1 && lineArray.length == 2) || lineArray.length > 2) {
            line = line.replace('§3', lineArray[lineArray.length - 1]);
            line = line.replace('btEnglishTranslate d-none', 'btEnglishTranslate d-flex');
        }
    }

    return line;
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

//== PAGE LOAD EVENT ==
$(function () {
    load();
});

//== BEFORE UNLOAD EVENT ==
$(window).on('beforeunload', function () {

});