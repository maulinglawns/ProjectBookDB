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
        header("Location: single.php?uniqID={$_POST['uUniqID']}");
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
                <input type="text" name="uAuthor" value="<?= $bookArr['auth'] ?>" />
            </fieldset>
            <fieldset id="title">
                <legend>Title</legend>
                <input type="text" name="uTitle" value="<?= $bookArr['title'] ?>" />
            </fieldset>
            <fieldset>
                <legend>Description</legend>
                <textarea name="uDescr" rows="10" cols="60"><?= $bookArr['descr'] ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Comment</legend>
                <textarea name="uComm" rows="3" cols="60"><?= $bookArr['comm'] ?></textarea>
            </fieldset>
            <fieldset id="price">
                <legend>Price</legend>
                <input type="text" name="uPrice" value="<?= $bookArr['price'] ?>" />
            </fieldset>
            <fieldset id="bookID">
                <legend>BookID</legend>
                <input type="text" name="uBookID" value="<?= $bookArr['bookID'] ?>" />
            </fieldset>
            <fieldset id="year">
                <legend>Year</legend>
                <input type="text" name="uYear" value="<?= $bookArr['year'] ?>" />
            </fieldset>
            <fieldset id="qty">
                <legend>Quantity:</legend>
                <input type="text" name="uQty" value="<?= $bookArr['qty'] ?>" />
            </fieldset>
            <fieldset id="image">
                <legend>Image</legend>
                <input type="text" name="uImage" value="<?= $bookArr['image'] ?>" />
            </fieldset>
            <input type="hidden" name="uUniqID" value="<?= $bookArr['uniqID'] ?>" />
            <input type="submit" value="Save edits" name="dbUpdate" />
        </form>
    </body>
</html>
