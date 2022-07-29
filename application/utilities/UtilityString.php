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
    
    public function startsWith($string, $startString) {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    public function endsWith($string, $endString) {
        $len = strlen($endString);
        if ($len == 0) {
            return true;
        }
        return (substr($string, -$len) === $endString);
    }

}
