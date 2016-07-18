<?php

require_once 'management_cats.php';

$name = $_POST['category_name'];

setCat($name);

header("Location: index.php?link=categories");