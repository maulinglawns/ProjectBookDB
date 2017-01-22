<?php
require_once("bookClass.php");
require_once("htmlVars.php");

$db = new BookDB;

if (isset($_GET['uniqID'])) {
    // Get database row based on uniqID
    $uniqID = $_GET['uniqID'];
    $bookArr = $db->singleBook($uniqID);
    if ($bookArr === 1) {
        header("Location: err.php");
    }
}

if (isset($_POST['dbUpdate'])) {
    $uQuery = $db->getUpdateQuery($_POST);
    if ($db->doSqlUpdate($uQuery) === 0) {
        header("Location: single.php?uniqID={$_POST['UniqID']}");
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
        <form action="" id="updateBook" method="post">
            <fieldset>
                <legend>Author</legend>
                <input type="text" name="Author" value="<?= $bookArr['auth'] ?>" />
            </fieldset>
            <fieldset id="title">
                <legend>Title</legend>
                <input type="text" name="Title" value="<?= $bookArr['title'] ?>" />
            </fieldset>
            <fieldset>
                <legend>Description</legend>
                <textarea name="Descr" rows="10" cols="60"><?= $bookArr['descr'] ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Comment</legend>
                <textarea name="Comm" rows="3" cols="60"><?= $bookArr['comm'] ?></textarea>
            </fieldset>
            <fieldset id="price">
                <legend>Price</legend>
                <input type="text" name="Price" value="<?= $bookArr['price'] ?>" />
            </fieldset>
            <fieldset id="bookID">
                <legend>BookID</legend>
                <input type="text" name="BookID" value="<?= $bookArr['bookID'] ?>" />
            </fieldset>
            <fieldset id="year">
                <legend>Year</legend>
                <input type="text" name="Year" value="<?= $bookArr['year'] ?>" />
            </fieldset>
            <fieldset id="qty">
                <legend>Quantity:</legend>
                <input type="text" name="Qty" value="<?= $bookArr['qty'] ?>" />
                <button type="button" onclick="incrementQty()">+</button>
                <button type="button" onclick="decrementQty()">-</button>
            </fieldset>
            <fieldset id="image">
                <legend>Image</legend>
                <input type="text" name="Image" value="<?= $bookArr['image'] ?>" />
            </fieldset>
            <input type="hidden" name="UniqID" value="<?= $bookArr['uniqID'] ?>" />
            <input type="submit" value="Save edits" name="dbUpdate" />
        </form>
        <script type="text/javascript" src="bookstore.js"></script>
    </body>
</html>
