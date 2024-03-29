<?php
//====
$GLOBALS['author'] = 'bnson';
$GLOBALS['copyright'] = 'Copyright © 2020 by E-Hosito';

$GLOBALS['environment'] = 'dev';
$GLOBALS['version'] = '0001';

$GLOBALS['domain'] = 'ehosito.com';
$GLOBALS['website_name'] = 'E-Hosito';

$GLOBALS['ssl'] = 'off';

$GLOBALS['domain_http'] = 'http://' . $GLOBALS['domain'];
$GLOBALS['domain_https'] = 'https://' . $GLOBALS['domain'];

//====
if ($GLOBALS['environment'] == 'dev') {
    $GLOBALS['domain'] = 'ehosito.local';
    $GLOBALS['version'] = date("YmdHis");
}

if ($GLOBALS['ssl'] == 'off') {
    $GLOBALS['protocol'] = 'http://';
} else {
    $GLOBALS['protocol'] = 'https://';
}

//====
$GLOBALS['root_link'] = $GLOBALS['protocol'] . $GLOBALS['domain'];
$GLOBALS['page_error'] = './application/views/error/404.php';

$GLOBALS['cookie_days'] = 1;
$GLOBALS['cookie_days_remember_me'] = 30;

?>

