<?php

require_once 'management_news.php';
if (isset($_GET["del"])){
$delID = $_GET["del"];
$delNews = getNewsById($delID);
$deleteImgPath = "../assets/news_images/" . $delNews['image'];
unlink($deleteImgPath);    
deleteNews($delID);
}
$news = getNews();

if (isset($_GET["page"])){
$currentPage = $_GET["page"];
} else {
$currentPage = 1;
}

$totalPageCount = ceil(count($news) / ITEMS_PER_PAGE);
$start = ($currentPage - 1) * ITEMS_PER_PAGE;
$limit = ITEMS_PER_PAGE;

if ($start + $limit > count($news)){
$limit = count($news);
}

include 'header.php';

?>

<body>
<br>
<div class = "container">
    <div class = "row">
        <div class = "col-md-9 col-md-offset-3">
            <h2>News <button class = "btn btn-success btn-add" id = "add-news-button">Add News <span class = "glyphicon glyphicon-plus"></span></button></h2>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-3">
            <?php

            include 'navigation.php';

            ?>
        </div>
        <div class = "col-md-9">
            <table class = "table table-striped">
                <thead>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Category Title</th>
                <th width="1">Actions</th>
                </thead>
                <tbody>
                <?php
                for ($index = $start; $index < $start + $limit; $index++){
                    if (isset($news[$index])){
                        foreach ($news[$index] as $key => $detail){
                            echo "<td>";
                            if ($key == "image"){
                                echo '<img class = "news_image" src = "../assets/news_images/'.$detail.'">';
                            }else{
                                echo $detail;
                            }
                            echo "</td>";
                        }
                        echo "<td class = 'right-col'>";
                        echo '<a class = "btn btn-danger" href = "index.php?link=news&page='.$currentPage.'&del='.$news[$index]["id"].'">Delete News <span class = "glyphicon glyphicon-trash"></span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-12 text-center">
            <?php

            echo '<ul class = "pagination">';
            if ($currentPage == 1){
                echo '<li>                 
                            <a href = "index.php?link=news&page='.$totalPageCount.'" aria-label="Next">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>';
            }else{
                echo '<li>
                        <a href = "index.php?link=news&page='.($currentPage - 1).'" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';}

            for ($i = 1; $i <= $totalPageCount; $i++){
                $style = '';
                if ($i == $currentPage){
                    $style = "font-weight: bold;";
                }
                echo "<li>";
                echo '<a href = "index.php?link=news&page='.$i.'" style = "' . $style . '">' . $i . '</a>';
                echo "</li>";
            }

            if ($currentPage == $totalPageCount){
                echo '<li>
                        <a href = "index.php?link=news&page='. 1 .'" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span> 
                        </a> 
                        </li>';
            }else{
                echo '<li>
                        <a href = "index.php?link=news&page='.($currentPage + 1).'" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>';}
            echo "</ul>";

            ?>
        </div>
    </div>
</div>

<div id="add-news-modal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close close-add-news-modal">x</span>
        <form action = "add_news.php" method = "post" enctype="multipart/form-data">
            <h1 align = "center">Add News</h1>
            <input class = "form-control add-news-input" type = "file" name = "image">
            <input class = "form-control add-news-input" type = "text" name = "title" placeholder = "Title">
            <textarea class = "form-control add-news-input" name = "content" placeholder = "Content"></textarea>
            <select name = "category" class = "form-control add-news-input">
                <?php

                require_once 'management_cats.php';
                $cats = getCats();
                foreach ($cats as $cat){
                    echo '<option value = "'.$cat['title'].'">';
                    echo $cat['title'];
                    echo '</option>';
                }

                ?>
            </select>
            <br>
            <button class = "btn btn-success add-news-submit" type = "submit">Submit</button>
        </form>
    </div>

</div>
</body>
<script src = "../assets/script/admin_add_news.js"></script>
</html>