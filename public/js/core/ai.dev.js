class AI {

    constructor(name) {
        this.synth = window.speechSynthesis;
        this.punctuationPattern = /[\.,;:"[\]{\}!?<>]+/g;
        this.name = name;
        this.timer = new Timer();
        //--
        this.synthStatus = 0;
        this.utter = new SpeechSynthesisUtterance();
        this.utterCurrentTarget = null;
        this.utterOnBoundaryEvent = [];
        this.utterOnStartEvent = [];
        this.utterOnEndEvent = [];
        this.voices = [];
        this.voice = null;
        this.volume = 1;
        this.pitch = 1;
        this.rate = 1;
        this.status = 1; //* 0 = Stop * 1 = Play * 2 = Pause

        this.statusMessage = {
            1: "Hi, I'm " + this.name,
            2: this.name + " can't load voice!"
        };

        //====
        var utterOnBoundary = (event) => {
            this.utterOnBoundary(event);
        };
        this.utterOnBoundaryEvent[0] = utterOnBoundary;

        var utterOnStart = (event) => {
            this.utterOnStart(event);
        };
        this.utterOnStartEvent[0] = utterOnStart;

        var utterOnEnd = (event) => {
            this.utterOnEnd(event);
        };
        this.utterOnEndEvent[0] = utterOnEnd;

        //====
        this.loadVoice();
        if (speechSynthesis.onvoiceschanged !== undefined) {
            speechSynthesis.onvoiceschanged = this.loadVoice;
        }

    }

    loadVoice() {
        if (this.synth) {
            this.voices = this.synth.getVoices();
            this.voice = this.voices[0];

        } else {
            this.status = 2;
            //console.log(this.getStatusMessage());
        }
    }

    setVoice(voiceName) {
        if (voiceName) {
            this.voice = this.voices.find(x => x.name === voiceName);
        }
    }

    addUtterOnBoundaryEvent(event) {
        var length = this.utterOnBoundaryEvent.length;
        this.utterOnBoundaryEvent[length] = event;
        //console.log("this.utterBoundaryEvent length: " + this.utterBoundaryEvent.length);
    }

    addUtterOnEndEvent(event) {
        var length = this.utterOnEndEvent.length;
        this.utterOnEndEvent[length] = event;
        //console.log("this.utterOnEndEvent length: " + this.utterOnEndEvent.length);
    }

    /*
     * 
     * @param {type} text
     * @param {type} volume [min="0", max="1", step="0.1", default="1"]
     * @param {type} pitch [min="0", max="2", step="0.1", default="1"]
     * @param {type} rate [min="0.1", max="10", step="0.1", default="1"]
     * @returns {Generator}
     */
    speak(text, volume = 1, pitch = 1, rate = 1) {

        if (!this.volume) {
            this.volume = volume;
        }

        if (!this.pitch) {
            this.pitch = pitch;
        }

        if (!this.rate) {
            this.rate = rate;
        }

        if (this.synth) {
            this.synthStatus = 1;

            if (this.synth.paused && this.synth.speaking) {
                return this.synth.resume();
            }

            if (this.synth.speaking) {
                this.synth.cancel();
            }

            if (this.synth.paused && !this.synth.speaking) {
                this.synth.cancel();
            }

            var textArr = text.replace(/(\.+|,|\:|\!|\?)(\"*|\'*|\)*|}*|]*)(\s|\n|\r|\r\n)/gm, "$1$2|").split("|");
            if (this.voice.localService || !Array.isArray(textArr) || textArr.length == 0) {
                textArr = [];
                textArr[0] = text;
            } else {
                textArr.push("");
            }

            //===
            var utterCurrentTargetIndex = 0;
            if (this.utterCurrentTarget) {
                var index = this.utterCurrentTarget.index;
                if (index < textArr.length - 1) {
                    utterCurrentTargetIndex = index;
                    console.log(this.utterCurrentTarget.index);
                } else {
                    utterCurrentTargetIndex = 0;
                    this.utterCurrentTarget = null;
                }

            }
            //====

            for (var i = 0; i < textArr.length; i++) {
                this.utter = new SpeechSynthesisUtterance();
                this.utter.index = i;
                this.utter.length = textArr.length;
                this.utter.voice = this.voice;
                this.utter.volume = this.volume;
                this.utter.pitch = this.pitch;
                this.utter.rate = this.rate;
                this.utter.text = textArr[i];

                if (i == textArr.length - 1) {
                    for (var index = 0; index < this.utterOnStartEvent.length; index++) {
                        this.utter.addEventListener('start', this.utterOnStartEvent[index]);
                    }

                    for (var index = 0; index < this.utterOnBoundaryEvent.length; index++) {
                        this.utter.addEventListener('boundary', this.utterOnBoundaryEvent[index]);
                    }

                    for (var index = 0; index < this.utterOnEndEvent.length; index++) {
                        this.utter.addEventListener('end', this.utterOnEndEvent[index]);
                    }

                } else {
                    this.utter.addEventListener('start', this.utterOnStartEvent[0]);
                    this.utter.addEventListener('boundary', this.utterOnBoundaryEvent[0]);
                    this.utter.addEventListener('end', this.utterOnEndEvent[0]);
                }

                if (i >= utterCurrentTargetIndex) {
                    this.synth.speak(this.utter);
                }

                //console.log(this.utter);
                //console.log(this.synth);

            }
            //console.log(this.synth);

        } else {
            this.status = 2;
            console.log(this.getStatusMessage());
    }

    //console.log("");

    }

    stopSpeaking() {
        this.synth.cancel();

        this.synthStatus = 0;
        this.utterCurrentTarget = null;
    }

    pauseSpeaking() {
        if (this.synth.speaking) {
            this.synth.pause();

            this.synthStatus = 2;

            //console.log(this.synth);
            //console.log(this.utter);
        }
    }

    timeout(seconds) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                console.log('bla bla');
                resolve();
            }, seconds * 1000);
        });
    }

    async synthResumeTimeOut() {
        await this.timeout(1);
        this.synth.resume();
    }

    utterOnBoundary(event) {
        if (event) {
            if (event.name && event.name == "word") {
                var word = this.getWordAt(event.target.text, event.charIndex);
                if (this.punctuationPattern.test(word)) {
                    if (this.synth.speaking && !this.synth.pause() && this.synthStatus != 2) {
                        this.synth.pause();
                        //this.synthResumeTimeOut();
                        this.synth.resume();
                    }
                }
            }
        }
    }

    utterOnStart(event) {
        this.synthStatus = 0;
        //this.synthPause();
        //this.synthResume();

        this.utterCurrentTarget = event.utterance;
        //console.log("TEST: " + event.utterance.index);

        //console.log(event);
        //console.log(event.utterance.text);
    }

    utterOnEnd(event) {
        this.synthStatus = 0;
        //this.synthPause();
        //this.synthResume();

        //console.log(event.utterance.index + " - " + event.utterance.length);
        if (event.utterance.index == (event.utterance.length - 1)) {
            this.utterCurrentTarget = null;
        }
        //console.log(event);
        //console.log(event.utterance.text);

    }

    synthResume() {
        this.synthStatus = 1;
        this.synth.resume();
    }

    synthPause() {
        this.synthStatus = 2;
        this.synth.pause();
    }

    sortVoiceByLanguageName() {
        //-- Sort voices by language, then name --
        this.voices.sort(function (obj1, obj2) {
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

    }

    // Get word at specific position. Used for extracting the word currently spoken
    // Source: https://stackoverflow.com/questions/5173316/finding-the-word-at-a-position-in-javascript
    getWordAt(str, pos) {
        // Perform type conversions.
        str = String(str);
        pos = Number(pos) >>> 0;

        // Search for the word's beginning and end.
        var left = str.slice(0, pos + 1).search(/\S+$/);
        var right = str.slice(pos).search(/\s/);

        // The last word in the string is a special case.
        // else Return the word, using the located bounds to extract it from the string.
        return right < 0 ? str.slice(left) : str.slice(left, right + pos);
    }

    //====
    getStatus() {
        return this.status;
    }

    getUtter() {
        return this.utter;
    }

    getStatusMessage() {
        return this.statusMessage[this.status];
    }

    getName() {
        return this.name;
    }

    getSynth() {
        return this.synth;
    }

    getVoices() {
        return this.voices;
    }

    getVoice() {
        return this.voice;
    }

    getVolume() {
        return this.volume;
    }

    getPitch() {
        return this.pitch;
    }

    getRate() {
        return this.rate;
    }

}