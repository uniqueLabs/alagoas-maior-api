<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\BookException;

final class BookRepository
{
    private \PDO $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getDb(): \PDO
    {
        return $this->database;
    }

    public function checkAndGet(int $bookId): object
    {
        $query = 'SELECT * FROM `book` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $bookId);
        $statement->execute();
        $book = $statement->fetchObject();
        if (! $book) {
            throw new BookException('Book not found.', 404);
        }

        return $book;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `book` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $book): object
    {
        $query = 'INSERT INTO `book` (`id`, `name`, `borrowed`, `contact_id`) VALUES (:id, :name, :borrowed, :contact_id)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $book->id);
        $statement->bindParam('name', $book->name);
        $statement->bindParam('borrowed', $book->borrowed);
        $statement->bindParam('contact_id', $book->contact_id);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $book, object $data): object
    {
        if (isset($data->name)) {
            $book->name = $data->name;
        }
        if (isset($data->borrowed)) {
            $book->borrowed = $data->borrowed;
        }
        if (isset($data->contact_id)) {
            $book->contact_id = $data->contact_id;
        }

        $query = 'UPDATE `book` SET `name` = :name, `borrowed` = :borrowed, `contact_id` = :contact_id WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $book->id);
        $statement->bindParam('name', $book->name);
        $statement->bindParam('borrowed', $book->borrowed);
        $statement->bindParam('contact_id', $book->contact_id);

        $statement->execute();

        return $this->checkAndGet((int) $book->id);
    }

    public function delete(int $bookId): void
    {
        $query = 'DELETE FROM `book` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $bookId);
        $statement->execute();
    }
}
