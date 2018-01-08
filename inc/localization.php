<?php

if(isset($_COOKIE["lang"])) {
    $lang = $_COOKIE["lang"];
}
else {
    $lang = "en";
    setcookie("lang","en");
}

if(isset($_GET["lang"])) {
    if($_GET["lang"] == "En" || $_GET["lang"] == "English") {
        $lang = "en";
        setcookie("lang","en");
    }
    else {
        $lang = "fr";
        setcookie("lang","fr");
    }
}
