<?php
require_once("bookClass.php");
require_once("htmlVars.php");

$db = new BookDB;

if (isset($_POST['dbInsert'])) {
    $sqlInsert = $db->getInsertQuery($_POST);
    
    $sqlResult = $db->doSqlInsert($sqlInsert);
    
    // Did we succeed?
    if ($sqlResult > 1) {
        header("Location: single.php?uniqID={$sqlResult}");
    } else {
        echo "<h2>Could not insert into database</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bookstore.css">
        <title>Bookstore</title>
        <style>
        </style>
    </head>
    <body>
        <?= $header ?>
        <?= $menu ?>
        <form action="" id="insertBook" method="post">
            <fieldset>
                <legend>Author</legend>
                <input type="text" name="Author" value="" />
            </fieldset>
            <fieldset id="title">
                <legend>Title</legend>
                <input type="text" name="Title" value="" />
            </fieldset>
            <fieldset>
                <legend>Description</legend>
                <textarea name="Descr" rows="10" cols="60"></textarea>
            </fieldset>
            <fieldset>
                <legend>Comment</legend>
                <textarea name="Comm" rows="3" cols="60"></textarea>
            </fieldset>
            <fieldset id="price">
                <legend>Price</legend>
                <input type="text" name="Price" value="" />
            </fieldset>
            <fieldset id="bookID">
                <legend>BookID</legend>
                <input type="text" name="BookID" value="" />
            </fieldset>
            <fieldset id="year">
                <legend>Year</legend>
                <input type="text" name="Year" value="" />
            </fieldset>
            <fieldset id="qty">
                <legend>Quantity:</legend>
                <input type="text" name="Qty" value="" />
            </fieldset>
            <fieldset id="image">
                <legend>Image</legend>
                <input type="text" name="Image" value="" />
            </fieldset>
            <input type="submit" value="Insert" name="dbInsert" />
        </form>
    </body>
</html>
