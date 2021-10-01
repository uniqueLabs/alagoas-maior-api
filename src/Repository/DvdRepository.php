<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\DvdException;

final class DvdRepository
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

    public function checkAndGet(int $dvdId): object
    {
        $query = 'SELECT * FROM `dvd` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $dvdId);
        $statement->execute();
        $dvd = $statement->fetchObject();
        if (! $dvd) {
            throw new DvdException('Dvd not found.', 404);
        }

        return $dvd;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `dvd` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $dvd): object
    {
        $query = 'INSERT INTO `dvd` (`id`, `name`, `borrowed`, `contact_id`) VALUES (:id, :name, :borrowed, :contact_id)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $dvd->id);
        $statement->bindParam('name', $dvd->name);
        $statement->bindParam('borrowed', $dvd->borrowed);
        $statement->bindParam('contact_id', $dvd->contact_id);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $dvd, object $data): object
    {
        if (isset($data->name)) {
            $dvd->name = $data->name;
        }
        if (isset($data->borrowed)) {
            $dvd->borrowed = $data->borrowed;
        }
        if (isset($data->contact_id)) {
            $dvd->contact_id = $data->contact_id;
        }

        $query = 'UPDATE `dvd` SET `name` = :name, `borrowed` = :borrowed, `contact_id` = :contact_id WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $dvd->id);
        $statement->bindParam('name', $dvd->name);
        $statement->bindParam('borrowed', $dvd->borrowed);
        $statement->bindParam('contact_id', $dvd->contact_id);

        $statement->execute();

        return $this->checkAndGet((int) $dvd->id);
    }

    public function delete(int $dvdId): void
    {
        $query = 'DELETE FROM `dvd` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $dvdId);
        $statement->execute();
    }
}
