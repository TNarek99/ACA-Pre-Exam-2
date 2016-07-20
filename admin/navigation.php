<?php

$link = $_GET["link"];

?>

<ul class = "list-group link-list">
    <a class = "list-group-item" id = "news" href = "index.php?link=news">News</a>
    <a class = "list-group-item" id = "categories" href = "index.php?link=categories">Categories</a>
</ul>

<script>
    var activeNavId = "<?php echo $link; ?>";
    document.getElementById(activeNavId).className += " active";
</script>