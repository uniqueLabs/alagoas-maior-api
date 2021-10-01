<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ContactException;

final class ContactRepository
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

    public function checkAndGet(int $contactId): object
    {
        $query = 'SELECT * FROM `contact` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $contactId);
        $statement->execute();
        $contact = $statement->fetchObject();
        if (! $contact) {
            throw new ContactException('Contact not found.', 404);
        }

        return $contact;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `contact` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $contact): object
    {
        $query = 'INSERT INTO `contact` (`id`, `name`, `phone`) VALUES (:id, :name, :phone)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $contact->id);
        $statement->bindParam('name', $contact->name);
        $statement->bindParam('phone', $contact->phone);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $contact, object $data): object
    {
        if (isset($data->name)) {
            $contact->name = $data->name;
        }
        if (isset($data->phone)) {
            $contact->phone = $data->phone;
        }

        $query = 'UPDATE `contact` SET `name` = :name, `phone` = :phone WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $contact->id);
        $statement->bindParam('name', $contact->name);
        $statement->bindParam('phone', $contact->phone);

        $statement->execute();

        return $this->checkAndGet((int) $contact->id);
    }

    public function delete(int $contactId): void
    {
        $query = 'DELETE FROM `contact` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $contactId);
        $statement->execute();
    }
}
