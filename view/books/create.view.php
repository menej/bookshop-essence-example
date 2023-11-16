<?php
/**
 * @var string $title
 * @var string $author
 * @var string $book_title
 * @var float $price
 * @var int $year
 */
?>

<?php require view("partials/head.php") ?>

<main>
    <h1>A new book</h1>

    <form action="/book" method="post">
        <p><label>Author: <input type="text" name="author" value="<?= $author ?>" autofocus></label></p>
        <p><label>Title: <input type="text" name="book_title" value="<?= $book_title ?>"></label></p>
        <p><label>Price: <input type="number" name="price" value="<?= $price ?>" min="0" step="any"></label></p>
        <p><label>Year: <input type="number" name="year" value="<?= $year ?>" min="0" step="1"></label></p>
        <p>
            <button>Insert</button>
        </p>
    </form>

</main>

<?php require view("partials/footer.php") ?>
