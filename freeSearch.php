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
        <form id="freeSearch" action="result.php">
            <fieldset id="freeSQ">
                <legend>Free text search:</legend>
                <input type="text" name="freeSearchQuery" value="" />
            </fieldset>
            <input type="submit" value="Send" name="freeQuery" >
        </form>
    </body>
</html>
