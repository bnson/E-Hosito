<!-- LOAD META DATA -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<meta name="title" content="E-Hosito ★ <?php echo $data["pageTitle"] ?>" />
<meta name="description" content="<?php echo $data["pageDescription"] ?>" />
<meta name="keywords" content="<?php echo $data["pageKeywords"] ?>" />
<meta name="author" content="<?php echo $GLOBALS['domain'] ?>" />
<meta content="Copyright © 2020 by E-Hosito" name="copyright">

<!-- LOAD TITLE & ICON -->
<title>E-Hosito ★ <?php echo $data["pageTitle"] ?></title>
<link rel="icon" href="/public/img/logo-favicon.png" />

<!-- LOAD CSS -->
<?php require_once("css.php"); ?>

<!-- LOAD JAVASCRIPT -->
<script type="text/javascript" src="/public/js/jquery-2.2.4.min.js"></script>     
<script type="text/javascript" src="/public/framework/split-js-1.5.9/split.min.js"></script>
<script type="text/javascript" src="/public/framework/highlight/highlight.pack.js"></script>    

<script type="text/javascript" src="/public/js/utilities/timer.js"></script>
<script type="text/javascript" src="/public/js/core/ai.<?php echo $GLOBALS['environment'] ?>.js?v=<?php echo $GLOBALS['version'] ?>"></script>

<script>
    hljs.highlightAll();
</script>

<!-- GLOBAL SITE TAG (GTAG.JS) - GOOGLE ANALYTICS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L43ZBNWFW7"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-L43ZBNWFW7');
</script>

