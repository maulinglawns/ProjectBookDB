<?php
require_once("bookClass.php");
require_once("htmlVars.php");

$db = new BookDB;

if (isset($_GET['dbQuery'])) {
    $searchString = $db->getSearchQuery($_GET);
}
if (isset($_GET['freeSearchQuery'])) {
    $searchString = $db->getFreeQuery($_GET);
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
        <table id="resultTable">
            <?php
                $db->listSearchQuery($searchString);
            ?>
        </table>
    </body>
</html>
