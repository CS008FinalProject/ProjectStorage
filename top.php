<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="icon" 
              type="image/png" 
              href="myFavicon.ico">
        <title>Riddle Missions</title>
        <meta charset="utf-8">
        <meta name="author" content="Collin Graf, Kevin Delay, Zach Something">
        <meta name="description" content="Challenging Computer Missions">
        <meta name="keywords" content="missions, code, source, coding, hacking, hack, game">
        <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen">
        <?php
// parse the url into htmlentites to remove any suspicous vales that someone
// may try to pass in. htmlentites helps avoid security issues.

        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

// break the url up into an array, then pull out just the filename
        $path_parts = pathinfo($phpSelf);
        include "lib/mail-message.php";
        ?>
    </head>

    <?php
    $domain = "http://";
    if (isset($_SERVER['HTTPS'])) {
        if ($_SERVER['HTTPS']) {
            $domain = "https://";
        }
    }

    $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");

    $domain .= $server;

    $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

    $path_parts = pathinfo($phpSelf);

    if ($debug) {
        print "<p>Domain" . $domain;
        print "<p>php Self" . $phpSelf;
        print "<p>Path Parts<pre>";
        print_r($path_parts);
        print "</pre>";
    }

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// inlcude all libraries
//

    require_once('lib/security.php');

    if ($path_parts['filename'] == "forms") {
        include ("lib/validation_functions.php");
    }
// giving each body tag an id really helps with css later on
    print '<body id="' . $path_parts['filename'] . '">';
    ?>