<?php
require_once("htmlVars.php");
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
        <form id="searchForm" action="result.php">
            <fieldset>
                <legend>Author</legend>
                <input type="text" name="qAuthor" value="" />
            </fieldset>
            <fieldset id="title">
                <legend>Title</legend>
                <input type="text" name="qTitle" value="" />
            </fieldset>
            <fieldset>
                <legend>Description</legend>
                <textarea name="qDescr" rows="10" cols="60"></textarea>
            </fieldset>
            <fieldset>
                <legend>Comment</legend>
                <textarea name="qComm" rows="3" cols="60"></textarea>
            </fieldset>
            <fieldset id="price">
                <legend>Price</legend>
                <input type="text" name="qPrice" value="" />
            </fieldset>
            <fieldset id="bookID">
                <legend>BookID</legend>
                <input type="text" name="qBookID" value="" />
            </fieldset>
            <fieldset id="image">
                <legend>Image</legend>
                <input type="text" name="qImage" value="" />
            </fieldset>
            <fieldset id="year">
                <legend>Year</legend>
                <input type="text" name="qYear" value="" />
            </fieldset>
            <input type="submit" value="Send" name="dbQuery" >
        </form>
    </body>
</html>
