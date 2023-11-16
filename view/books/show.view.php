<?php
/**
 * @var string $title
 * @var array $book
 */

?>

<?php require view("partials/head.php") ?>

<main>
    <h1>Details about <?= $book['title'] ?></h1>
    <ul>
        <li>Author: <b><?= $book["author"] ?></b></li>
        <li>Title: <b><?= $book["title"] ?></b></li>
        <li>Price: <b><?= $book["price"] ?> EUR</b></li>
        <li>Year: <b><?= $book["year"] ?></b></li>
    </ul>

    <a href="/books">Back</a>
    <a href="/book/edit?id=<?= $book['id'] ?>">Edit</a>
</main>


<?php require view("partials/footer.php") ?>
