<?php

function remote_file_exists($url) {
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

function url_exists($url) {

    $context = stream_context_set_default([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    $headers = get_headers($url, false, $context);
    return stripos($headers[0], "200 OK") ? true : false;
}

function url_file_exists($urlFile) {
    //== Open file ==
    return @fopen($urlFile, 'r');
}
