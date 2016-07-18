<?php

require_once 'connection.php';

function getNews(){
    global $dbConnection;

    $sql = "SELECT news.id, news.title as news_title, news.content, news.date, cats.title AS cat_title FROM news INNER JOIN cats ON news.category_id = cats.id";

    $result = mysqli_query($dbConnection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $news [] = $row;
        }
    }

    return $news;
}

function getNewsByCatId($catId){
    global $dbConnection;

    $sql = "SELECT id, title, content, date, category_id FROM news WHERE category_id = '".$catId."'";

    $result = mysqli_query($dbConnection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $news [] = $row;
        }
    }

    return $news;
}

function setNews($title, $content, $categoryId){
    global $dbConnection;

    $sql = "INSERT INTO news (`title`, `content`, `category_id`) VALUES('".$title."', '".$content."', '".$categoryId."')";

    $result = mysqli_query($dbConnection, $sql);

    if (!$result){
        return false;
    }

    return true;
}

function deleteNews($id){
    global $dbConnection;

    $sql = "DELETE FROM news WHERE id = '" . $id . "'";

    $result = mysqli_query($dbConnection, $sql);

    if (!$result){
        return false;
    }

    return true;
}