<?php

namespace controller;

require_once base_path('core/ViewHelper.php');
require_once base_path('model/BookModel.php');

use model\BookModel;
use core\ViewHelper;

class BookController
{
    public static function index(): void
    {
        if (!empty($_GET['search'])) {
            $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
            $books = BookModel::getSearch($search);
        } else {
            $search = "";
            $books = BookModel::getAll();
        }

        $variables = [
            "title" => 'All books',
            "books" => $books,
            "search" => $search
        ];


        ViewHelper::render('books/index.view.php', $variables);
    }

    public static function show(): void
    {
        if (empty($_GET['id'])) {
            ViewHelper::redirect("books");
            return;
        }

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $book = BookModel::get($id);

        // Check if there was no result for the book id
        if (!$book) {
            ViewHelper::abort("404");
            return;
        }

        $variables = [
            "title" => $book['title'],
            "book" => $book
        ];

        ViewHelper::render("books/show.view.php", $variables);
    }

    public static function create($author = "", $book_title = "", $price = "", $year = "",): void
    {
        $variables = [
            'title' => "Create book",
            'author' => $author,
            'book_title' => $book_title,
            'price' => $price,
            'year' => $year
        ];

        ViewHelper::render("books/create.view.php", $variables);
    }

    public static function store(): void
    {
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS) ?? null;
        $book_title = filter_input(INPUT_POST, 'book_title', FILTER_SANITIZE_SPECIAL_CHARS) ?? null;
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS) ?? null;
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS) ?? null;

        $valid_data = !empty($author) && !empty($book_title) && !empty($price) && !empty($year);

        if (!$valid_data) {
            self::create($author, $book_title, $price, $year);
            return;
        }

        BookModel::insert($author, $book_title, $price, $year);
        ViewHelper::redirect("books");
    }
}