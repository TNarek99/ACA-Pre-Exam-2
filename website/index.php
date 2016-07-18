<?php

require_once '../admin/management_cats.php';
require_once '../admin/management_news.php';

$allCats = getCats();
$category = getCatByTitle($_GET['category']);

$news = getNewsByCatId($category['id']);

include 'header.php';
?>

<body>

    <div class = "container">
        <div class = "row">
            <br>
            <div class = "col-md-12 text-center">
                <h1><b>WEBSITE</b></h1>
            </div>
        </div>
        
        <div class = "row">
            <div class = "col-md-12 text-left">
                <?php
                
                foreach($allCats as $cat){
                    if ($cat['title'] == $category['title']){
                        echo '<a href = "index.php?category='.$cat['title'].'">';
                        echo '<div class = "category-container category-container-selected text-center">';
                        echo $cat['title'];
                        echo '</div>';
                        echo '</a>';
                    } else{
                        echo '<a href = "index.php?category='.$cat['title'].'">';
                        echo '<div class = "category-container text-center">';
                        echo $cat['title'];
                        echo '</div>';
                        echo '</a>';
                    }
                }
                
                ?>
            </div>
        </div>
        <br>
        <div class = "row">
            <div class = "col-md-6 text-left">
                <?php

                foreach ($news as $new){
                    echo '<div class = "news-container">';
                    echo '<div class = "news-title-container">';
                    echo '<h2 class = "news-title">';
                    echo $new['title'];
                    echo '</h2>';
                    echo '</div>';
                    echo '<div class = "news-date-container">';
                    echo $new['date'];
                    echo '</div>';
                    echo '<div class = "news-content-container">';
                    echo $new['content'];
                    echo '</div>';
                    echo '<hr>';
                    echo '</div>';
                }

                ?>
            </div>
        </div>
    </div>

</body>

</html>