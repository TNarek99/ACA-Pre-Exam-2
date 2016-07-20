<?php

require_once 'management_news.php';
require_once 'management_cats.php';

$title = $_POST['title'];
$content = $_POST['content'];
$catTitle = $_POST['category'];
$category = getCatByTitle($catTitle);
$image = "default.png";

if (isset($_FILES['image'])){
    define("UPLOAD_DIR", "../assets/news_images/");

    if (!empty($_FILES["image"])) {
        $myFile = $_FILES["image"];

        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo "<p>An error occurred.</p>";
            exit;
        }

        // ensure a safe filename
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
        $image = $name;

        // don't overwrite an existing file
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
        }

        // preserve file from temporary directory
        $success = move_uploaded_file($myFile["tmp_name"],
            UPLOAD_DIR . $name);
        if (!$success) {
            echo "<p>Unable to save file.</p>";
            exit;
        }

        // set proper permissions on the new file
        chmod(UPLOAD_DIR . $name, 0777);
    }
}

setNews($image, $title, $content, $category['id']);

header("Location: index.php?link=news");