<?php
$GLOBALS['environment'] = 'live';
$GLOBALS['website_name'] = 'E-Hosito';

if ($GLOBALS['environment'] == 'live') {
    $GLOBALS['domain'] = 'ehosito.com';
} else {
    $GLOBALS['domain'] = 'ehosito.local';
}

$GLOBALS['domain_http'] = 'http://' . $GLOBALS['domain'] . '/';
$GLOBALS['domain_https'] = 'http://' . $GLOBALS['domain'] . '/';

$GLOBALS['page_error'] = 'https://' . $GLOBALS['domain'] . '/public/page/Error.php';
?>

