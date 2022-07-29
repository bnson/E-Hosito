<?php

function url_file_exists_1($url) {
    //== Open file ==
    return @fopen($url, 'r');
}

function url_file_exists_2($url) {

    $context = stream_context_set_default([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    $headers = get_headers($url, false, $context);
    return stripos($headers[0], "200 OK") ? true : false;
}

function url_file_exists_3($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($httpCode == 200) {
        return true;
    }
    return false;
}

function str_last_replace_1($search, $replace, $subject) {
    $pos = strrpos($subject, $search);

    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}

function processUrl($url) {
    $utilityString = new UtilityString();

    if ($url) {
        $urlFull = $GLOBALS['root_link'] . $url;
        //echo $urlFull;

        if (url_file_exists_1($urlFull)) {

            if ($utilityString->endsWith(strtolower($url), ".js")) {
                echo PHP_EOL . '<script type="text/javascript" src="' . $url . '?v=' . $GLOBALS['version'] . '"></script>';
            }

            if ($utilityString->endsWith(strtolower($url), ".css")) {
                echo PHP_EOL . '<link rel="stylesheet" href="' . $url .  '?v=' . $GLOBALS['version'] . '">';
            }
        }
    }
}
