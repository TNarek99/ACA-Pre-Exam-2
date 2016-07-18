<?php

require_once 'connection.php';

function getCats(){
    global $dbConnection;

    $sql = "SELECT id, title FROM cats";

    $result = mysqli_query($dbConnection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $cats [] = $row;
        }
    }

    return $cats;
}

function getCatByTitle($title){
    global $dbConnection;

    $sql = "SELECT id, title FROM cats WHERE title = '".$title."'";

    $result = mysqli_query($dbConnection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $cats = $row;
        }
    }

    return $cats;
}

function setCat($title){
    global $dbConnection;

    $sql = "INSERT INTO cats (`title`) VALUES('".$title."')";

    $result = mysqli_query($dbConnection, $sql);

    if (!$result){
        return false;
    }

    return true;
}

function deleteCat($id){
    global $dbConnection;

    $sql = "DELETE FROM cats WHERE id = '" . $id . "'";

    $result = mysqli_query($dbConnection, $sql);

    if (!$result){
        return false;
    }

    return true;
}