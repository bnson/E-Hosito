<?php

class objWords {

    public $en;
    public $vn;
    public $classes;
    public $pronounceUs;
    public $pronounceUk;

    function getEn() {
        return $this->en;
    }

    function getVn() {
        return $this->vn;
    }

    function getClasses() {
        return $this->classes;
    }

    function getPronounceUs() {
        return $this->pronounceUs;
    }

    function getPronounceUk() {
        return $this->pronounceUk;
    }

    function setEn($en) {
        $this->en = $en;
    }

    function setVn($vn) {
        $this->vn = $vn;
    }

    function setClasses($classes) {
        $this->classes = $classes;
    }

    function setPronounceUs($pronounceUs) {
        $this->pronounceUs = $pronounceUs;
    }

    function setPronounceUk($pronounceUk) {
        $this->pronounceUk = $pronounceUk;
    }

}
