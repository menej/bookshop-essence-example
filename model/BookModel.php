<?php

namespace model;

require_once base_path("/model/DBInit.php");


class BookModel
{
    public static function getAll(): false|array
    {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, author, title, price, year FROM book");
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function getSearch(mixed $search): false|array
    {
        $db = DBInit::getInstance();

        $statement = $db->prepare("
                SELECT id, author, title, price, year 
                FROM book 
                WHERE LOWER(title) LIKE LOWER(:search)
                   OR LOWER(author) LIKE LOWER(:search) 
        ");

        $statement->bindValue(":search", '%' . $search . '%');
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function get(mixed $id)
    {
        $db = DBInit::getInstance();

        $statement = $db->prepare("
                SELECT id, author, title, price, year 
                FROM book 
                WHERE id = :id;
        ");

        $statement->bindParam(":id", $id);

        $statement->execute();
        return $statement->fetch();

    }

    public static function insert(mixed $author, mixed $book_title, mixed $price, mixed $year)
    {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO book (author, title, price, year)
            VALUES (:author, :title, :price, :year)");
        $statement->bindParam(":author", $author);
        $statement->bindParam(":title", $book_title);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":year", $year);
        $statement->execute();
    }

}