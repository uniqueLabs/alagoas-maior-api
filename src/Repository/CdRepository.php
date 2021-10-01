<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\CdException;

final class CdRepository
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

    public function checkAndGet(int $cdId): object
    {
        $query = 'SELECT * FROM `cd` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cdId);
        $statement->execute();
        $cd = $statement->fetchObject();
        if (! $cd) {
            throw new CdException('Cd not found.', 404);
        }

        return $cd;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `cd` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $cd): object
    {
        $query = 'INSERT INTO `cd` (`id`, `name`, `borrowed`, `contact_id`) VALUES (:id, :name, :borrowed, :contact_id)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cd->id);
        $statement->bindParam('name', $cd->name);
        $statement->bindParam('borrowed', $cd->borrowed);
        $statement->bindParam('contact_id', $cd->contact_id);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $cd, object $data): object
    {
        if (isset($data->name)) {
            $cd->name = $data->name;
        }
        if (isset($data->borrowed)) {
            $cd->borrowed = $data->borrowed;
        }
        if (isset($data->contact_id)) {
            $cd->contact_id = $data->contact_id;
        }

        $query = 'UPDATE `cd` SET `name` = :name, `borrowed` = :borrowed, `contact_id` = :contact_id WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cd->id);
        $statement->bindParam('name', $cd->name);
        $statement->bindParam('borrowed', $cd->borrowed);
        $statement->bindParam('contact_id', $cd->contact_id);

        $statement->execute();

        return $this->checkAndGet((int) $cd->id);
    }

    public function delete(int $cdId): void
    {
        $query = 'DELETE FROM `cd` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $cdId);
        $statement->execute();
    }
}
