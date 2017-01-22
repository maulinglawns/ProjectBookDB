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
        <section id="singleMain">
            <section id="book">
                <h3>Author:</h3>
                <p><?= $bookArr['auth'] ?></p>
                <h3>Title:</h3>
                <p><?= $bookArr['title'] ?></p>
                <h3>Description:</h3>
                <p><?= $bookArr['descr'] ?></p>
                <h3>Comment:</h3>
                <p><?= $bookArr['comm'] ?></p>
                <h3>Price:</h3>
                <p><?= $bookArr['price'] ?></p>
                <h3>Book ID:</h3>
                <p><?= $bookArr['bookID'] ?></p>
                <h3>Year:</h3>
                <p><?= $bookArr['year'] ?></p>
                <button onclick="location.href='editBook.php?uniqID=<?= $uniqID ?>'" type="button">
                Edit book</button>
            </section>
            <section id="bookImage">
                <?php
                    if (empty($bookArr['image'])) {
                        echo "<p>No image</p>";
                    } else {
                        echo "<img src=\"{$bookArr['image']}\" alt=\"Book image\" />";
                    }
                ?>
            </section>
        </section>
    </body>
</html>
