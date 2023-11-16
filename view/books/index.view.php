<?php
/**
 * @var string $title
 * @var array $books
 * @var string $search
 */
?>

<?php require view("partials/head.php") ?>

<main class="all-books">
    <h1>A book library written in PHP</h1>

    <form action="/books" method="GET" class="all-books__search">
        <label for="search"></label>
        <input type="text" name="search" id="search" value="<?= $search ?>">
        <button>Search</button>
    </form>

    <a href="/books/create">Add new</a>
    <?php if (!empty($books)): ?>
        <ul>
            <?php foreach ($books as $book): ?>
                <li>
                    <a href="/book?id=<?= $book['id'] ?>">
                        <?= $book["author"] ?>:<?= $book["title"] ?> (<?= $book["year"] ?>)
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No results for <?= $search ?>!</p>
    <?php endif; ?>
</main>

<?php require view("partials/footer.php") ?>
