<?php

    define("ITEMS_PER_PAGE", 4);
    $link = "news";

    if (isset($_GET["link"])){
        $link = $_GET["link"];
    }

    if ($link == "news"){
        include 'news.php';
     }

    if($link == "categories"){
        include 'cats.php';
     }

