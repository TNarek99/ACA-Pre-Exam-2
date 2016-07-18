<?php

require_once 'management_news.php';
require_once 'management_cats.php';

$title = $_POST['title'];
$content = $_POST['content'];
$catTitle = $_POST['category'];
$category = getCatByTitle($catTitle);
setNews($title, $content, $category['id']);

header("Location: index.php?link=news");