<?php

class UtilityString {

    public function processQuotes($string) {
        $string = preg_replace('/\s+/', ' ', trim($string));

        $string = preg_replace('~[\']+~', '’', $string);
        $string = preg_replace('~( \')+~', ' “', $string);
        $string = preg_replace('~(\' )+~', '” ', $string);

        $string = preg_replace('~( ")+~', ' “', $string);
        $string = preg_replace('~(" )+~', '” ', $string);
        $string = preg_replace('~("\.)+~', '”.', $string);
        $string = preg_replace('~("\,)+~', '”.', $string);

        $string = preg_replace('/\s+/', ' ', trim($string));

        return $string;
    }

    public function processPageKeywords($string) {
        $string = preg_replace('/\s+/', ' ', trim($string));

        $string = preg_replace('~["\[\]]+~', '', $string);
        $string = preg_replace('~[,]+~', ', ', $string);

        $string = preg_replace('/\s+/', ' ', trim($string));
        $string = $string . "...";

        return $string;
    }

    public function processPageTitle($string) {
        $string = $this->processQuotes($string);
        return $string;
    }

    public function processPageDescription($string) {
        $string = strip_tags($string);
        $string = substr($string, 0, 200);

        $string = preg_replace('~[\r\n\t]+~', ' ', $string);
        $string = $this->processQuotes($string);
        $string = $string . "...";

        return $string;
    }

}
