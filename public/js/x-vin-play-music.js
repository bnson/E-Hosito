/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
  $("html,body").animate({scrollTop: 0}, 300); //100ms for example
});


var i;
var active = null;
var newHash = null;

const player = new Plyr('#player');

//const player = new Plyr('#player', {
//    autoplay: 'true',
//    storage: { enabled: true, key: 'plyr' }
//});

var mediaHeader = document.querySelector('#mediaHeader');
var listAudio = document.querySelector('.listAudio');
var playTrack = listAudio.querySelectorAll('.playTrack');

var btNext = document.querySelector('#btNext');
var btPrev = document.querySelector('#btPrev');
btNext.onclick = nextSong;
btPrev.onclick = prevSong;

for (i = 0; i < playTrack.length; i++) {
    playTrack[i].onclick = changeChannel;
}

setSource(getId(playTrack[0]), playTrack[0], true);
document.querySelector('.plyr').addEventListener('ended', nextSong);

//== FUNCTION ==
function changeChannel(e) {
    setSource(getId(e.target), e.target, true);
}
//==
function getId(el) {
    return Number(el.getAttribute('data-id'));
}
//==
function buildSource(el) {
    var linkAudio = decrypt(el.getAttribute('data-audio'));
    var srcAutio = linkAudio;
    //var srcAutio = el.getAttribute('data-audio');
    //console.log(srcAutio);
    var obj = [{
            src: srcAutio,
            type: 'audio/mp3'
        }];
    return obj;
}
//==
function setSource(selected, media, play) {
    var sourceMedia = buildSource(media);
    var titleMedia = media.textContent;
    mediaHeader.textContent = titleMedia;

    //console.log("-" + selected);
    if (active !== selected) {
        active = selected;
        player.source = {
            type: 'audio',
            title: titleMedia,
            sources: sourceMedia
        };


        for (var i = 0; i < playTrack.length; i++) {
            if (Number(playTrack[i].getAttribute('data-id')) === selected) {
                playTrack[i].className = 'list-group-item list-group-item-action rounded-0 playTrack active';
                
                if (!isScrolledIntoView(playTrack[i])) {
                    console.log("AAA " + playTrack[i].offsetTop);
                    window.scrollTo(0, playTrack[i].offsetTop);
                }
                
            } else {
                playTrack[i].className = 'list-group-item list-group-item-action rounded-0 playTrack';
            }
        }

        if (play) {
            //player.play();
            var promise = player.play();
            if (promise !== undefined) {
                promise.then(_ => {
                    // Autoplay started!
                    player.play();
                    console.log("Play Again!");
                }).catch(error => {
                    console.log("Error!");
                    player.play();
                    // Autoplay was prevented.
                    // Show a "Play" button so that user can start playback.
                });
            }            
            
        }
    } else {
        player.togglePlay();
    }
    
    updateWebLink();
}
//==
function nextSong(e) {
    var next = active + 1;

    if (next < playTrack.length) {
        setSource(getId(playTrack[next]), playTrack[next], true);
    }
}

function prevSong(e) {
  var prev = active - 1;

  if(prev >= 0) {
    setSource( getId(playTrack[prev]), playTrack[prev], true );
  }
}

function refeshSong(e) {
    setSource( getId(playTrack[active]), playTrack[active], true );
}
//==
function decrypt(str) {
    var alphas = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","/"];
    var encode = ["☺","☻","♥","♦","♣","♠","•","◘","○","◙","♂","♀","♪","♫","☼","►","◄","↕","‼","¶","§","▬","↨","↑","↓","→","←"];    
    
    var length = alphas.length;
    for (var i = 0; i < length; i++) {
        var regEx = new RegExp(encode[i], "g");
        str = str.replace(regEx, alphas[i]);
    }    
    str = encodeURI(str);
    //console.log("++++++ " + str);
    return str;
}


function updateWebLink() {
    window.location.hash = getId(playTrack[active]);
    //console.log(window.location.href);
}

$(function() {
    
    $(window).bind('hashchange', function(){
        newHash = window.location.hash.substring(1);
        
        if (newHash) {
            //console.log("active" + active);
            //console.log("newHash" + newHash);
            
            if (active != null && newHash != null && active != newHash) {
                //active = newHash;
                //console.log("2");
                setSource(getId(playTrack[newHash]), playTrack[newHash], true);
                //window.scrollTo(0, playTrack[newHash].offsetTop);
                //playTrack[newHash].scrollIntoView(false);
                
                //$meidaSelected = playTrack[newHash];
                //$(window).scrollTop($meidaSelected.);
                //$meidaSelected.animate({ scrollTop: $meidaSelected.prop("scrollHeight")}, 1000);
                //$(window).animate({scrollTop: $meidaSelected.offset().top}, 2000);
            }
        };
        
    });
    
    $(window).trigger('hashchange');

});


function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}